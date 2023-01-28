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


if (isset($_POST["branch"]) == 0 OR empty($_POST["branch"]) == 1) {
  Header("Location: dashboard.php?add_branch=2");
  exit(0);
}



$branch = mysqli_real_escape_string($conn,$_POST["branch"]);
echo $_POST["branch"];





$sql = "INSERT INTO branch(branchName)
VALUES('$branch')";
$query = mysqli_query($conn,$sql);


if ($query == 1) {
  Header("Location: dashboard.php?add_branch=1");
}elseif ($query == 0) {
  Header("Location: dashboard.php?add_branch=0");
}
 ?>
<!-- Developed By SiWDOL M. -->
