<?php
////
session_start();
//echo $_SESSION["level"];
if (isset($_SESSION["level"]) == 0) {
  if ($_SESSION["level"] !== "ADMIN" OR $_SESSION["level"] !== "USER") {
    Header("Location: index.php?login=notlogin");
    exit(0);
  }
}

//////////////////////////////////////////////
if (time() - $_SESSION["timeout"] > 900) {
  unset($_SESSION["username"],$_SESSION["level"],$_SESSION["timeout"]);
  session_destroy();
  Header("Location: index.php?login=afk");
}else {
  //echo time() - $_SESSION["timeout"];
  $_SESSION["timeout"] = time();
}
//////////////////////////////////////////////

//echo $_SESSION["username"];
//echo $_SESSION["level"];

////
include '../conn.php';
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

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
  $std2 = NULL;
}else {
  $std2 = mysqli_real_escape_string($conn,$_POST["std2"]);
}

if (empty($_POST["std3"]) == 1) {
  $std3 = NULL;
}else {
  $std3 = mysqli_real_escape_string($conn,$_POST["std3"]);
}

if (empty($_POST["std4"]) == 1) {
  $std4 = NULL;
}else {
  $std4 = mysqli_real_escape_string($conn,$_POST["std4"]);
}

if (empty($_POST["std5"]) == 1) {
  $std5 = NULL;
}else {
  $std5 = mysqli_real_escape_string($conn,$_POST["std5"]);
}

if (empty($_POST["std6"]) == 1) {
  $std6 = NULL;
}else {
  $std6 = mysqli_real_escape_string($conn,$_POST["std6"]);
}

if (empty($_POST["file_video"]) == 1) {
  $file_video = NULL;
}else {
  $file_video = $_POST["file_video"];
}


if (empty($_POST["audio"]) == 1) {
  $file_audio = NULL;
}else {
  $file_audio = $_POST["audio"];
}

if ($_POST["type_doc"] == "1") {
  $type_doc = 1;
}else {
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
$id = mysqli_real_escape_string($conn,$_POST["id"]);
$numrand = (mt_rand());

$thainame = mysqli_real_escape_string($conn,$_POST["thainame"]);
$engname = mysqli_real_escape_string($conn,$_POST["engname"]);
$std1 = mysqli_real_escape_string($conn,$_POST["std1"]);
$teacher = mysqli_real_escape_string($conn,$_POST["teacher"]);
$year = mysqli_real_escape_string($conn,$_POST["year"]);
$branch = mysqli_real_escape_string($conn,$_POST["branch"]);
$yt_link = mysqli_real_escape_string($conn,$_POST["yt_link"]);
$site_url = mysqli_real_escape_string($conn,$_POST["site_url"]);
//$video = $_FILES["file_video"]["name"];
//$pdf = $_FILES["file_pdf"]["name"];
echo $thainame;

///

if ($_GET["preview"] == 1) {
  $taget_table = "mctarchive_pre"; }else {
    $taget_table = "mctarchive";
  }

$sql_todelfile = "SELECT video,pdf,audio FROM $taget_table WHERE id = '$id'";
$query__todelfile = mysqli_query($conn,$sql_todelfile);
$result_todelfile = mysqli_fetch_array($query__todelfile,MYSQLI_ASSOC);
///
$mypath= "../storage/".$id.'/';

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

echo $mypath.$result_todelfile["pdf"];


if (!file_exists($mypath)) {
  mkdir($mypath, 0777, true);
}else {
  echo "file_exists";
}


if (empty($_FILES['file_pdf']["name"]) == 0) {
  $pdf_type = strrchr($_FILES['file_pdf']['name'],".");
  $pdf_newname = $id.'_'.$numrand.$pdf_type;
  $file_pdf = $pdf_newname;
  echo "$file_pdf";
  move_uploaded_file($_FILES["file_pdf"]["tmp_name"],$mypath.$file_pdf);
  echo $file_pdf;
  $pdf = mysqli_real_escape_string($conn,$file_pdf);

if ($result_todelfile["pdf"] !== $file_pdf) {
  if (file_exists($mypath.$result_todelfile["pdf"])) {
    unlink($mypath.$result_todelfile["pdf"]);
}
  }

  $sql_pdf = "UPDATE $taget_table SET pdf = '$pdf' WHERE id = '$id'";
  mysqli_query($conn,$sql_pdf);
  echo "have";

}

if (empty($_FILES['file_video']["name"]) == 0) {
  $v_type = strrchr($_FILES['file_video']['name'],".");
  $v_newname = $id.'_'.$numrand.$v_type;
  $file_video = $v_newname;
  echo "$file_video";
  move_uploaded_file($_FILES["file_video"]["tmp_name"],$mypath.$file_video);
  echo $_FILES['file_video']['name'];
  $video = mysqli_real_escape_string($conn,$file_video);

  if ($result_todelfile["video"] !== $file_video) {
    if (file_exists($mypath.$result_todelfile["video"])) {
      unlink($mypath.$result_todelfile["video"]);
  }
    }

  $sql_video = "UPDATE $taget_table SET video = '$video' WHERE id = '$id'";
  mysqli_query($conn,$sql_video);
  echo "have";

}

if (empty($_FILES['audio']["name"]) == 0) {
  $a_type = strrchr($_FILES['audio']['name'],".");
  $a_newname = $id.'_'.$numrand.$a_type;
  $file_audio = $a_newname;
  echo "$file_audio";
  move_uploaded_file($_FILES["audio"]["tmp_name"],$mypath.$file_audio);
  echo $_FILES['audio']['name'];
  $audio = mysqli_real_escape_string($conn,$file_audio);

  if ($result_todelfile["audio"] !== $file_audio) {
    if (file_exists($mypath.$result_todelfile["audio"])) {
      unlink($mypath.$result_todelfile["audio"]);
  }
    }

  $sql_audio = "UPDATE $taget_table SET audio = '$audio' WHERE id = '$id'";
  mysqli_query($conn,$sql_audio);
  echo "have";

}


$sql_update = "UPDATE $taget_table SET
                 std1 = '$std1',
                 std2 = '$std2',
                 std3 = '$std3',
                 std4 = '$std4',
                 std5 = '$std5',
                 std6 = '$std6',
                 thainame = '$thainame',
                 engname = '$engname',
                 teacher = '$teacher',
                 sec = '$year',
                 branch = '$branch',
                 type_doc = '$type_doc',
                 yt_link = '$yt_link',
                 site_url = '$site_url'
                 WHERE id = '$id'";
$query_updatetopic = mysqli_query($conn,$sql_update);

echo $query_updatetopic;

if ($query_updatetopic == 1) {
  echo "!OK!";
  Header("Location: dashboard.php?update_topic=1");
}else {
  echo "!FAIL!";
  Header("Location: dashboard.php?update_topic=0");
}

 ?>
<!-- Developed By SiWDOL M. -->
