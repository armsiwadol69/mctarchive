<?php
session_start();
if (isset($_SESSION["level"]) == 0 AND ($_SESSION["level"] !== "ADMIN" OR $_SESSION["level"] !== "USER")) {
  Header("Location: index.php?login=notlogin");
  exit(0);
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

if (isset($_GET["idtodel"]) == 0 OR empty($_GET["idtodel"]) == 1) {
  Header("Location: index.php");
  exit();
}

//window.location = "del_topic.php?preview=1&idtodel="+system_id+"&nid="+id+"&topicName="+topicName;

$id = $_GET["idtodel"];
$nid = $_GET["nid"];
$topicName = $_GET["topicName"];
echo $id;


include '../conn.php';
include 'lineNotify.php';
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

if (isset($_GET["preview"]) AND $_GET["preview"] == "1") {

  if ($_SESSION["level"] !== "ADMIN" OR $_SESSION["level"] == "USER") {
    header('location: admin/index.php');
  }
  $textResultLINE = 'อยู่ในรายการรอการตรวจสอบ';
  $sql = "DELETE FROM mctarchive_pre WHERE system_id = '$id'";
}else {
  $textResultLINE = 'แสดงผลอยู่';
  $sql = "DELETE FROM mctarchive WHERE system_id = '$id'";
}

//$sql = "DELETE FROM mctarchive WHERE id = '$id'";
$query = mysqli_query($conn,$sql);
$mypath= "../storage/".$id;
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

rrmdir($mypath);
echo rrmdir($mypath);

if ($query == 1) {
  $message = 'มีการ "ลบ" ข้อมูลปริญญานิพนธ์หรืองานวิจัย ('.$textResultLINE.')| ID : '.$nid.' | '.'หัวข้อ : '.$topicName.' เมื่อ '.date('Y-m-d H:i:s').' โดย '.$_SESSION["name"];
  sendLineNotify($message);
  Header("Location: dashboard.php?del_topic=1");
}elseif ($query == 0) {
  Header("Location: dashboard.php?del_topic=0");
}
 ?>
