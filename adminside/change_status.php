<?php
////
include 'commonf.php';
include 'lineNotify.php';
session_start();
//echo $_SESSION["level"];
if (isset($_SESSION["level"]) == 0) {
  if ($_SESSION["level"] !== "ADMIN") {
    Header("Location: index.php?login=notlogin");
    exit(0);
  }
}
//////////////////////////////////////////////
checkTimeout();


//////////////////////////////////////////////

//echo $_SESSION["username"];
//echo $_SESSION["level"];

////
include '../conn.php';
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

$id = strval($_GET["id"]);
$topicLineName = $_GET["topicName"];

if (isset($_GET["preview"])) {
  $taget_table = "mctarchive";
  $taget_table_del = "mctarchive_pre";
  $message = 'มีการเปลี่ยนเเปลงสถานะปริญญานิพนธ์หรืองานวิจัย (ถูกอนุมัติ/แสดงผล) | หัวข้อ : '.$topicLineName.' | โดย '.$_SESSION["name"];
  

}else {
    $taget_table = "mctarchive_pre";
    $taget_table_del = "mctarchive";
    
    $message = 'มีการเปลี่ยนเเปลงสถานะปริญญานิพนธ์หรืองานวิจัย (นำไปอยู่ในส่วน "รอตรวจสอบและยังไม่ถูกไปนำไปแสดงผล") | หัวข้อ : '.$topicLineName.' | โดย '.$_SESSION["name"];
  }
echo $message;

$sql = "INSERT INTO $taget_table SELECT * FROM $taget_table_del WHERE system_id = '$id'";
$sql_del = "DELETE FROM $taget_table_del WHERE system_id = '$id'";

$query_cs = mysqli_query($conn,$sql);
$query_del = mysqli_query($conn,$sql_del);

if ($query_cs == 1 AND $query_del == 1) {
  echo "!OK!";
  if($taget_table == "mctarchive_pre"){
    sendLineNotify($message);
    Header("Location: dashboard.php?cs=1&viewPreview=1");
    
  }else{
    sendLineNotify($message);
    Header("Location: dashboard.php?cs=1");
  }
}else {
  echo "!FAIL!";
  Header("Location: dashboard.php?cs=0");
}


 ?>
