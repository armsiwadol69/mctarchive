<?php
////
session_start();
//echo $_SESSION["level"];
if (isset($_SESSION["level"]) == 0) {
  if ($_SESSION["level"] !== "ADMIN") {
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
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

$id = strval($_GET["id"]);

if (isset($_GET["preview"])) {
  $taget_table = "mctarchive";
  $taget_table_del = "mctarchive_pre";

}else {
    $taget_table = "mctarchive_pre";
    $taget_table_del = "mctarchive";
  }

$sql = "INSERT INTO $taget_table SELECT * FROM $taget_table_del WHERE system_id = '$id'";
$sql_del = "DELETE FROM $taget_table_del WHERE system_id = '$id'";

$query_cs = mysqli_query($conn,$sql);
$query_del = mysqli_query($conn,$sql_del);

if ($query_cs == 1 AND $query_del == 1) {
  echo "!OK!";
  Header("Location: dashboard.php?cs=1");
}else {
  echo "!FAIL!";
  Header("Location: dashboard.php?cs=0");
}


 ?>
