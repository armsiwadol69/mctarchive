<?php
ob_start();
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
if (time() - $_SESSION["timeout"] > 3600) {
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
$userID = $_SESSION["user_id"];

$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

/////
//$sql_find_id = "SELECT id FROM mctarchive ORDER BY id DESC LIMIT 1";
//$query = mysqli_query($conn,$sql_find_id);
//$result_find_id = mysqli_fetch_array($query,MYSQLI_ASSOC);
////
//echo $result_find_id["id"];

//$cut_old = $result_find_id["id"];
//echo $cut_old;
//$new_id = (intval($cut_old) + 1);
//echo $new_id;

$id = mysqli_real_escape_string($conn,$_POST["id"]);

$system_id = mysqli_real_escape_string($conn,$_POST["system_id"]);
$numrand = (mt_rand());

$id_path = mysqli_real_escape_string($conn,$_POST["system_id"]);

$mypath= "../storage/".$id_path.'/';
$mypathtodel= "../storage/".$id_path;

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

if (empty($_FILES["file_video"]['name'])) {
  $file_video = NULL;
}else {
  $v_type = strrchr($_FILES['file_video']['name'],".");
  $v_newname = $system_id.'_'.$numrand.$v_type;
  $file_video = $v_newname;
  echo "$file_video";
}

if (empty($_FILES["audio"]['name']) == 1) {
  $file_audio = NULL;
}else {
  $a_type = strrchr($_FILES['audio']['name'],".");
  $a_newname = $system_id.'_'.$numrand.$a_type;
  $file_audio = $a_newname;
  echo "$file_audio";
}

if (empty($_FILES["file_pdf"]['name']) == 1) {
  $file_pdf = NULL;
}else {
  $pdf_type = strrchr($_FILES['file_pdf']['name'],".");
  $pdf_newname = $system_id.'_'.$numrand.$pdf_type;
  $file_pdf = $pdf_newname;
  echo "$file_pdf";
}

if (empty($_FILES["file_zip"]['name']) == 1) {
  $file_zip = NULL;
}else {
  $file_zip = strrchr($_FILES['file_zip']['name'],".");
  $zip_newname = $system_id.'_'.$numrand.$file_zip;
  $file_zip = $zip_newname;
  echo "$file_zip";
}
////


////

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

if ($_POST["type_doc"] == "1") {
  $type_doc = 1;
}else {
  $type_doc = 2;
}

///debug
echo $_POST["system_id"];
echo $_POST["thainame"];
echo $_POST["engname"];
echo $_POST["std1"];
echo $_POST["std2"];
echo $_POST["std3"];
echo $_POST["std4"];
echo $_POST["std5"];
echo $_POST["std6"];
echo "@@@@@@";
echo $_POST["teacher"];
echo $_POST["co_teacher"];
echo "@@@@@@";
echo $_POST["year"];
echo "@@@@@@";
echo $_POST["branch"];
echo "@@@@@@";
echo $file_video;
echo $file_audio;
//echo $website;
//exit(0);
// make it easy

$system_id = mysqli_real_escape_string($conn,$_POST["system_id"]);
$thainame = mysqli_real_escape_string($conn,$_POST["thainame"]);
$engname = mysqli_real_escape_string($conn,$_POST["engname"]);
$std1 = mysqli_real_escape_string($conn,$_POST["std1"]);
$teacher = mysqli_real_escape_string($conn,$_POST["teacher"]);
$co_teacher = mysqli_real_escape_string($conn,$_POST["co_teacher"]);
$year = mysqli_real_escape_string($conn,$_POST["year"]);
$branch = mysqli_real_escape_string($conn,$_POST["branch"]);
$video = mysqli_real_escape_string($conn,$file_video);
$fileZip = mysqli_real_escape_string($conn,$file_zip);
$pdf = mysqli_real_escape_string($conn,$file_pdf);
$audio = mysqli_real_escape_string($conn,$file_audio);
$add_by = mysqli_real_escape_string($conn,$_SESSION["user_id"]);
$yt_link = mysqli_real_escape_string($conn,$_POST["yt_link"]);
$site_url = mysqli_real_escape_string($conn,$_POST["site_url"]);
///




if (!file_exists($mypath)) {
    mkdir($mypath, 0777, true);
}else {
  echo "file_exists";
}


if (isset($_FILES['file_pdf']["name"]) == 1) {
  move_uploaded_file($_FILES["file_pdf"]["tmp_name"],$mypath.$file_pdf);
  echo $_FILES['file_pdf']['name'];
  $pdf_upload = 1;
}
if (isset($_FILES['file_video']["name"]) == 1) {
  move_uploaded_file($_FILES["file_video"]["tmp_name"],$mypath.$v_newname);
  echo $_FILES['file_video']['name'];
  $vid_upload = 1;
}
if (isset($_FILES['audio']["name"]) == 1) {
  move_uploaded_file($_FILES["audio"]["tmp_name"],$mypath.$file_audio);
  echo $_FILES['audio']['name'];
  $audio_upload = 1;
}

if (isset($_FILES['file_zip']["name"]) == 1) {
  move_uploaded_file($_FILES["file_zip"]["tmp_name"],$mypath.$file_zip);
  echo $_FILES['file_zip']['name'];
  $zip_upload = 1;
}

if ($_POST["skip_pass"] == "1") {
  $sql_addtopic = "INSERT INTO mctarchive(system_id,id,std1,std2,std3,std4,std5,std6,thainame,engname,teacher,co_teacher,sec,branch,video,pdf,fileZip,audio,type_doc,add_by,yt_link,site_url)
  VALUES('$system_id','$id','$std1','$std2','$std3','$std4','$std5','$std6','$thainame','$engname','$teacher','$co_teacher','$year','$branch','$video','$pdf','$fileZip','$audio','$type_doc','$add_by','$yt_link','$site_url')";
}else {
  $sql_addtopic = "INSERT INTO mctarchive_pre(system_id,id,std1,std2,std3,std4,std5,std6,thainame,engname,teacher,co_teacher,sec,branch,video,pdf,fileZip,audio,type_doc,add_by,yt_link,site_url)
  VALUES('$system_id','$id','$std1','$std2','$std3','$std4','$std5','$std6','$thainame','$engname','$teacher','$co_teacher','$year','$branch','$video','$pdf','$fileZip','$audio','$type_doc','$add_by','$yt_link','$site_url')";
}

echo  $sql_addtopic;

//wartermark on PDF AUTO
ob_start();


use setasign\Fpdi\Fpdi;
require_once('../custom/fpdf/fpdf.php');
require_once('../custom/fpdi/autoload.php');


// Source file and watermark config 
$file = '../storage/'.$system_id.'/'.$file_pdf; 
echo $file;
$text_image = '../img/watermarkMCT.png'; 
 
// Set source PDF file 
$pdf = new Fpdi(); 
if(file_exists("./".$file)){ 
    $pagecount = $pdf->setSourceFile($file); 
}else{ 
    die('Source PDF not found!'); 
} 
 
// Add watermark image to PDF pages 
for($i=1;$i<=$pagecount;$i++){ 
    $tpl = $pdf->importPage($i); 
    $size = $pdf->getTemplateSize($tpl); 
    $pdf->addPage(); 
    $pdf->useTemplate($tpl, 1, 1, $size['width'], $size['height'], TRUE); 
     
    //Put the watermark 
    $xxx_final = ($size['width']-165); 
    $yyy_final = ($size['height']-220); 
    $pdf->Image($text_image, $xxx_final, $yyy_final, 0, 0, 'png'); 
} 
 


$pdfWarmarkOutput = strval('../storage/'.$system_id.'/'.$file_pdf); 

echo $pdfWarmarkOutput;

$pdf->Output('F', $pdfWarmarkOutput);



//End watermark on PDF



 $query_addtopic = mysqli_query($conn,$sql_addtopic);
 echo $query_addtopic;
 


if ($query_addtopic == 1 AND $pdf_upload == 1) {
  echo "!OK!";
  Header("Location: dashboard.php?upload_topic=1");
}else {
  function rrmdir($mypath)
  {
   if (is_dir($mypath))
   {
    $objects = scandir($mypath);

    foreach ($objects as $object)
    {
     if ($object != '.' && $object != '..')
     {
      if (filetype($mypath.'/'.$object) == 'dir') {rrmdir($mypath.'/'.$object);}
      else {unlink($mypath.'/'.$object);}
     }
    }

    reset($objects);
    rmdir($mypath);
   }
  }

  if (file_exists($mypathtodel)) {
    rrmdir($mypathtodel);
  }
  Header("Location: dashboard.php?upload_topic=0");
}
ob_end_flush();
 ?>
<!-- Developed By SiWDOL M. -->
