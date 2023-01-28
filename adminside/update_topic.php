<?php
////
session_start();
ob_start();
//echo $_SESSION["level"];
if (isset($_SESSION["level"]) == 0) {
    if ($_SESSION["level"] !== "ADMIN" or $_SESSION["level"] !== "USER") {
        Header("Location: index.php?login=notlogin");
        exit(0);
    }
}

//////////////////////////////////////////////
if (time() - $_SESSION["timeout"] > 3600) {
    unset($_SESSION["username"], $_SESSION["level"], $_SESSION["timeout"]);
    session_destroy();
    Header("Location: index.php?login=afk");
} else {
    //echo time() - $_SESSION["timeout"];
    $_SESSION["timeout"] = time();
}
//////////////////////////////////////////////

//echo $_SESSION["username"];
//echo $_SESSION["level"];

////
include '../conn.php';
$conn = mysqli_connect($serverName, $userName, $userPassword, $dbName);

/////
/*
$sql_find_id = "SELECT id FROM mctarchive ORDER BY id DESC LIMIT 1";
$query = mysqli_query($conn,$sql_find_id);
$result_find_id = mysqli_fetch_array($query,MYSQLI_ASSOC);
////
//echo $result_find_id["id"];

$cut_old = substr($result_find_id["id"],2);
//echo $cut_old;
$new_id = 'DM'.strval(intval($cut_old) + 1);
echo $new_id;
 */

/// check looking for NULL
if (empty($_POST["std2"]) == 1) {
    $std2 = null;
} else {
    $std2 = mysqli_real_escape_string($conn, $_POST["std2"]);
}

if (empty($_POST["std3"]) == 1) {
    $std3 = null;
} else {
    $std3 = mysqli_real_escape_string($conn, $_POST["std3"]);
}

if (empty($_POST["std4"]) == 1) {
    $std4 = null;
} else {
    $std4 = mysqli_real_escape_string($conn, $_POST["std4"]);
}

if (empty($_POST["std5"]) == 1) {
    $std5 = null;
} else {
    $std5 = mysqli_real_escape_string($conn, $_POST["std5"]);
}

if (empty($_POST["std6"]) == 1) {
    $std6 = null;
} else {
    $std6 = mysqli_real_escape_string($conn, $_POST["std6"]);
}

if (empty($_POST["file_video"]) == 1) {
    $file_video = null;
} else {
    $file_video = $_POST["file_video"];
}

if (empty($_POST["audio"]) == 1) {
    $file_audio = null;
} else {
    $file_audio = $_POST["audio"];
}

if (empty($_POST["file_zip"]) == 1) {
    $file_zip = null;
} else {
    $file_zip = $_POST["file_zip"];
}

if ($_POST["type_doc"] == "1") {
    $type_doc = 1;
} else {
    $type_doc = 2;
}
///debug
/*
echo $_POST["thainame"];
echo $_POST["engname"];
echo $_POST["std1"];
echo $_POST["std2"];
echo $_POST["std3"];
echo $_POST["teacher"];
echo $_POST["year"];
echo $file_video;
echo $website; */

/// make it easy
$system_id = mysqli_real_escape_string($conn, $_POST["system_id"]);
$id = mysqli_real_escape_string($conn, $_POST["id"]);

$numrand = (mt_rand());

$thainame = mysqli_real_escape_string($conn, $_POST["thainame"]);
$engname = mysqli_real_escape_string($conn, $_POST["engname"]);
$std1 = mysqli_real_escape_string($conn, $_POST["std1"]);
$teacher = mysqli_real_escape_string($conn, $_POST["teacher"]);
$co_teacher = mysqli_real_escape_string($conn, $_POST["co_teacher"]);
$year = mysqli_real_escape_string($conn, $_POST["year"]);
$branch = mysqli_real_escape_string($conn, $_POST["branch"]);
$yt_link = mysqli_real_escape_string($conn, $_POST["yt_link"]);
$site_url = mysqli_real_escape_string($conn, $_POST["site_url"]);
//$video = $_FILES["file_video"]["name"];
//$pdf = $_FILES["file_pdf"]["name"];
echo $thainame;

///

if ($_GET["preview"] == 1) {
    $taget_table = "mctarchive_pre";} else {
    $taget_table = "mctarchive";
}

$sql_todelfile = "SELECT video,pdf,audio,fileZip FROM $taget_table WHERE system_id = '$system_id'";
$query__todelfile = mysqli_query($conn, $sql_todelfile);
$result_todelfile = mysqli_fetch_array($query__todelfile, MYSQLI_ASSOC);
///
$mypath = "../storage/" . $system_id . '/';

echo $result_todelfile["pdf"] . "\r\n" . $result_todelfile["video"] . PHP_EOL . $result_todelfile["audio"] . PHP_EOL . $result_todelfile["fileZip"];

//exit(0);
//if ($_POST["website"] == "0") {
//  $website = 0;
//}else {
//  $website = 1;
//  if (!file_exists($mypath.'website')) {
//      mkdir($mypath.'website', 0777, true);
//  }else {
//    echo "file_exists";
//  }
//}

//PDF WATERMARK
use setasign\Fpdi\Fpdi;
require_once '../custom/fpdf/fpdf.php';
require_once '../custom/fpdi/autoload.php';
//PDF WATERMARK

echo $mypath . $result_todelfile["pdf"];

if (!file_exists($mypath)) {
    mkdir($mypath, 0777, true);
} else {
    echo "file_exists";
}

if (!empty($_FILES['file_pdf']["name"])) {
    $pdf_type = strrchr($_FILES['file_pdf']['name'], ".");
    $pdf_newname = $system_id . '_' . $numrand . $pdf_type;
    $file_pdf = $pdf_newname;
    echo "$file_pdf";
    move_uploaded_file($_FILES["file_pdf"]["tmp_name"], $mypath ."old_".$file_pdf);
    echo $file_pdf;
    $pdf = mysqli_real_escape_string($conn, $file_pdf);

   

    $sql_pdf = "UPDATE $taget_table SET pdf = '$pdf' WHERE system_id = '$system_id'";
    mysqli_query($conn, $sql_pdf);
    echo "have";

    $old_file = '../storage/' . $system_id . '/' . "old_".$pdf;
    $file = '../storage/' . $system_id . '/' . $pdf;

    //The PDF version that you want to convert
//the file into.
    $pdfVersion = "1.4";

//The path that you want to save the new
//file to
    $newFile = $file;

//The path of the file that you want
//to convert
    $currentFile = $old_file;

//Create the GhostScript command
    $gsCmd = "GSWIN64 -sDEVICE=pdfwrite -dCompatibilityLevel=$pdfVersion -dNOPAUSE -dBATCH -sOutputFile=$newFile $currentFile";

//Run it using PHP's exec function.
    exec($gsCmd);

// Source file and watermark config

    echo $file;
    $text_image = '../img/watermarkMCT.png';

// Set source PDF file
    $pdf = new Fpdi();
    if (file_exists("./" . $file)) {
        $pagecount = $pdf->setSourceFile($file);
    } else {
        die('Source PDF not found!');
    }

// Add watermark image to PDF pages
    for ($i = 1; $i <= $pagecount; $i++) {
        $tpl = $pdf->importPage($i);
        $size = $pdf->getTemplateSize($tpl);
        $pdf->addPage();
        $pdf->useTemplate($tpl, 1, 1, $size['width'], $size['height'], true);

        //Put the watermark
        $xxx_final = ($size['width'] - 165);
        $yyy_final = ($size['height'] - 220);
        $pdf->Image($text_image, $xxx_final, $yyy_final, 0, 0, 'png');
    }

    $pdfWarmarkOutput = strval('../storage/' . $system_id . '/' . $file_pdf);

    echo $pdfWarmarkOutput;

    $pdf->Output('F', $pdfWarmarkOutput);

//End watermark on PDF
if ($result_todelfile["pdf"] != $file_pdf and !empty($result_todelfile["pdf"])) {
    if (file_exists($mypath . $result_todelfile["pdf"])) {
        unlink($old_file);
        unlink($mypath . $result_todelfile["pdf"]);
    }
}

}

if (!empty($_FILES['file_video']["name"])) {
    $v_type = strrchr($_FILES['file_video']['name'], ".");
    $v_newname = $system_id . '_' . $numrand . $v_type;
    $file_video = $v_newname;
    echo "$file_video";
    move_uploaded_file($_FILES["file_video"]["tmp_name"], $mypath . $file_video);
    echo $_FILES['file_video']['name'];
    $video = mysqli_real_escape_string($conn, $file_video);

    if ($result_todelfile["video"] != $file_video and !empty($result_todelfile["video"])) {
        if (file_exists($mypath . $result_todelfile["video"])) {
            unlink($mypath . $result_todelfile["video"]);
        }
    }

    $sql_video = "UPDATE $taget_table SET video = '$video' WHERE system_id = '$system_id'";
    mysqli_query($conn, $sql_video);
    echo "have";

}

if (!empty($_FILES['audio']["name"])) {
    $a_type = strrchr($_FILES['audio']['name'], ".");
    $a_newname = $system_id . '_' . $numrand . $a_type;
    $file_audio = $a_newname;
    echo "$file_audio";
    move_uploaded_file($_FILES["audio"]["tmp_name"], $mypath . $file_audio);
    echo $_FILES['audio']['name'];
    $audio = mysqli_real_escape_string($conn, $file_audio);

    if ($result_todelfile["audio"] != $file_audio and !empty($result_todelfile["audio"])) {
        if (file_exists($mypath . $result_todelfile["audio"])) {
            unlink($mypath . $result_todelfile["audio"]);
        }
    }

    $sql_audio = "UPDATE $taget_table SET audio = '$audio' WHERE system_id = '$system_id'";
    mysqli_query($conn, $sql_audio);
    echo "have";

}

if (!empty($_FILES['file_zip']["name"])) {
    $a_type = strrchr($_FILES['file_zip']['name'], ".");
    $a_newname = $system_id . '_' . $numrand . $a_type;
    $file_zip = $a_newname;
    echo "$file_zip";
    move_uploaded_file($_FILES["file_zip"]["tmp_name"], $mypath . $file_zip);
    echo $_FILES['file_zip']['name'];
    $zip = mysqli_real_escape_string($conn, $file_zip);

    if ($result_todelfile["fileZip"] != $file_zip and !empty($result_todelfile["fileZip"])) {
        if (file_exists($mypath . $result_todelfile["fileZip"])) {
            unlink($mypath . $result_todelfile["fileZip"]);
        }
    }

    $sql_fileZip = "UPDATE $taget_table SET fileZip = '$zip' WHERE system_id = '$system_id'";

    echo $sql_fileZip;

    mysqli_query($conn, $sql_fileZip);
    echo "have";

}

$sql_update = "UPDATE $taget_table SET
                 id = '$id',
                 std1 = '$std1',
                 std2 = '$std2',
                 std3 = '$std3',
                 std4 = '$std4',
                 std5 = '$std5',
                 std6 = '$std6',
                 thainame = '$thainame',
                 engname = '$engname',
                 teacher = '$teacher',
                 co_teacher = '$co_teacher',
                 sec = '$year',
                 branch = '$branch',
                 type_doc = '$type_doc',
                 yt_link = '$yt_link',
                 site_url = '$site_url'
                 WHERE system_id = '$system_id'";

echo $sql_update;
//exit(0);
$query_updatetopic = mysqli_query($conn, $sql_update);

echo $query_updatetopic;

if ($query_updatetopic == 1) {
    echo "!OK!";
    Header("Location: dashboard.php?update_topic=1");
} else {
    echo "!FAIL!";
    Header("Location: dashboard.php?update_topic=0");
}

?>
<!-- Developed By SiWDOL M. -->
