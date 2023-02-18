<?php
session_start();
if (isset($_SESSION["level"]) == 0 AND $_SESSION["level"] !== "ADMIN") {
  Header("Location: index.php?login=notlogin");
  exit(0);
}


include '../conn.php';
include 'commonf.php';

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
$targetID = mysqli_real_escape_string($conn,$_POST["user_id"]);

if(isset($_GET["setS"])){
  $targetID = mysqli_real_escape_string($conn,$_GET["user_id"]);
  if($_GET["setS"] == 'inactive'){
    $sql = "UPDATE login SET status = '0' WHERE user_id = '$targetID'";
    }else{
    $sql = "UPDATE login SET status = '1' WHERE user_id = '$targetID'";
    }
  
    $query = mysqli_query($conn,$sql);
  
    if ($query == 1) {
      Header("Location: userManage.php?add_admin=4");
      exit(0);
    }elseif ($query == 0) {
      Header("Location: userManage.php?add_admin=0");
      exit(0);
    }
}

if (isset($_POST["username"]) == 0 OR empty($_POST["username"]) == 1) {
  Header("Location: dashboard.php?add_admin=2");
  exit(0);
}

$username = mysqli_real_escape_string($conn,$_POST["username"]);
$password = mysqli_real_escape_string($conn,base64_encode($_POST["password"]));
$name = mysqli_real_escape_string($conn,$_POST["name"]);
if ($_POST["level"] == "ADMIN") {
  $level = "ADMIN";
}else {
  $level = "USER";
}
//echo $_POST["username"];
//echo $_POST["password"];


if(isset($_GET["edit"]) AND $_GET["edit"] == '1'){

  if(empty($password)){
  $sql = "UPDATE login SET username =  '$username',level = '$level' , name = '$name' WHERE user_id = '$targetID'";
  }else{
  $sql = "UPDATE login SET username =  '$username',password = '$password',level =  '$level' , name = '$name' WHERE user_id = '$targetID'";
  }

  $query = mysqli_query($conn,$sql);

  if ($query == 1) {
    Header("Location: userManage.php?add_admin=3");
  }elseif ($query == 0) {
    Header("Location: userManage.php?add_admin=0");
  }
}else{
  $sql = "INSERT INTO login(username,password,level,name)
  VALUES('$username','$password','$level','$name')";
  $query = mysqli_query($conn,$sql);

  if ($query == 1) {
    Header("Location: userManage.php?add_admin=1");
  }elseif ($query == 0) {
    Header("Location: userManage.php?add_admin=0");
  }
}



 ?>
<!-- Developed By SiWDOL M. -->
