<?php
session_start();
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


if (isset($_POST["year"]) == 0 OR empty($_POST["year"]) == 1) {
  Header("Location: dashboard.php?add_year=2");
  exit(0);
}



$year = $_POST["year"];
echo $_POST["year"];


include '../conn.php';
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);


$sql = "INSERT INTO year(year)
VALUES('$year')";
$query = mysqli_query($conn,$sql);


if ($query == 1) {
  Header("Location: dashboard.php?add_year=1");
}elseif ($query == 0) {
  Header("Location: dashboard.php?add_year=0");
}
 ?>
