<?php
session_start();
if (isset($_SESSION["level"]) == 0 AND $_SESSION["level"] !== "ADMIN") {
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
include '../conn.php';
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

$sql_setting = "SELECT * FROM setting WHERE var = 'free2uplaod'";
$query_setting = mysqli_query($conn,$sql_setting);
$result_setting = mysqli_fetch_array($query_setting,MYSQLI_ASSOC);
if ($result_setting['setting'] == "0") {
 $change_setting = 1;
}else {
  $change_setting = 0;
}

$sql_setting_c = "UPDATE setting SET setting = '$change_setting' WHERE var = 'free2uplaod'";
$query_setting_c = mysqli_query($conn,$sql_setting_c);

echo "$change_setting";
Header("Location: index.php");

 ?>
