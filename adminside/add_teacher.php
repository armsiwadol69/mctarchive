<?php
session_start();
if (isset($_SESSION["level"]) == 0 AND $_SESSION["level"] !== "ADMIN") {
  Header("Location: index.php?login=notlogin");
  exit(0);
}
include '../conn.php';
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

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


if (isset($_POST["teacher"]) == 0 OR empty($_POST["teacher"]) == 1) {
  Header("Location: dashboard.php?add_teacher=2");
  exit(0);
}



$username = mysqli_real_escape_string($conn,$_POST["teacher"]);
$t_branch = mysqli_real_escape_string($conn,$_POST["branch"]);
echo $_POST["teacher"];





$sql = "INSERT INTO teacher(teacherName,branch)
VALUES('$username','$t_branch')";
$query = mysqli_query($conn,$sql);


if ($query == 1) {
  Header("Location: ".$_SESSION["lastPageToReturn"]."?add_teacher=1");
}elseif ($query == 0) {
  Header("Location: ".$_SESSION["lastPageToReturn"]."?add_teacher=0");
}
 ?>
<!-- Developed By SiWDOL M. -->
