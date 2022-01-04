<?php
session_start();
if (isset($_SESSION["level"]) == 0 AND $_SESSION["level"] !== "ADMIN") {
  Header("Location: index.php?login=notlogin");
  exit(0);
}

if (isset($_POST["username"]) == 0 OR empty($_POST["username"]) == 1 OR empty($_POST["password"]) == 1) {
  Header("Location: dashboard.php?add_admin=2");
  exit(0);
}
include '../conn.php';
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
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
$username = mysqli_real_escape_string($conn,$_POST["username"]);
$password = mysqli_real_escape_string($conn,$_POST["password"]);
$name = mysqli_real_escape_string($conn,$_POST["name"]);
if ($_POST["level"] == "ADMIN") {
  $level = "ADMIN";
}else {
  $level = "USER";
}
//echo $_POST["username"];
//echo $_POST["password"];




$sql = "INSERT INTO login(username,password,level,name)
VALUES('$username','$password','$level','$name')";
$query = mysqli_query($conn,$sql);


if ($query == 1) {
  Header("Location: dashboard.php?add_admin=1");
}elseif ($query == 0) {
  Header("Location: dashboard.php?add_admin=0");
}
 ?>
<!-- Developed By SiWDOL M. -->
