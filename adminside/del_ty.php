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

include '../conn.php';
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

if (isset($_GET["year"]) OR empty($_GET["year"]) == 0) {
  $year = mysqli_real_escape_string($conn,$_GET["year"]);
  $sql = "DELETE FROM year WHERE year = '$year'";
  $query = mysqli_query($conn,$sql);
  if ($query == 1 AND empty($_GET["year"]) == 0) {
    Header("Location: ".$_SESSION["lastPageToReturn"]."?del_year=1");
  }elseif ($query == 0 OR empty($_GET["year"]) == 1) {
    Header("Location: ".$_SESSION["lastPageToReturn"]."?del_year=0");
  }
}elseif (isset($_GET["teacher"]) OR empty($_GET["teacher"]) == 0) {
  $teacher = mysqli_real_escape_string($conn,$_GET["teacher"]);
  $sql = "DELETE FROM teacher WHERE teacher_id = '$teacher'";
  $query = mysqli_query($conn,$sql);
  if ($query == 1 AND empty($_GET["teacher"]) == 0) {
    Header("Location: ".$_SESSION["lastPageToReturn"]."?del_teacher=1");
  }elseif ($query == 0 OR empty($_GET["teacher"]) == 1) {
    Header("Location: ".$_SESSION["lastPageToReturn"]."?del_teacher=0");
  }
}elseif (isset($_GET["username"]) OR empty($_GET["username"]) == 0) {
  $username = mysqli_real_escape_string($conn,$_GET["username"]);
  $sql = "DELETE FROM login WHERE user_id = '$username'";
  $query = mysqli_query($conn,$sql);
  if ($query == 1 AND empty($_GET["username"]) == 0) {
    Header("Location: ".$_SESSION["lastPageToReturn"]."?del_admin=1");
  }elseif ($query == 0 OR empty($_GET["username"]) == 1) {
    Header("Location: ".$_SESSION["lastPageToReturn"]."?del_admin=0");
  }
}elseif (isset($_GET["branch"]) OR empty($_GET["branch"]) == 0) {
  $branch = mysqli_real_escape_string($conn,$_GET["branch"]);
  $sql = "DELETE FROM branch WHERE branch_id = '$branch'";
  $query = mysqli_query($conn,$sql);
  if ($query == 1 AND empty($_GET["branch"]) == 0) {
    Header("Location: ".$_SESSION["lastPageToReturn"]."?del_branch=1");
  }elseif ($query == 0 OR empty($_GET["branch"]) == 1) {
    Header("Location: ".$_SESSION["lastPageToReturn"]."?del_branch=0");
  }
}

if(isset($_GET["videoFileSys"])){
  $target = $_GET["videoFileSys"];
  $sql = "UPDATE mctarchive SET video = NULL WHERE system_id = '$target'";
  $query = mysqli_query($conn,$sql);

  if ($query){
    $mypath= "../storage/".$target.'/';
    echo $mypath.$_GET["fileName"];
    unlink($mypath.$_GET["fileName"]);
    Header("Location: ".$_SESSION["lastPageToReturn"]."?del_files=1");
  }elseif (!$query) {
    Header("Location: ".$_SESSION["lastPageToReturn"]."?del_files=0");
  }
}

if(isset($_GET["AudioFileSys"])){
  $target = $_GET["AudioFileSys"];
  $sql = "UPDATE mctarchive SET audio = NULL WHERE system_id = '$target'";
  $query = mysqli_query($conn,$sql);

  if ($query){
    $mypath= "../storage/".$target.'/';

    $mypath= "../storage/".$target.'/';
    echo $mypath.$_GET["fileName"];
    unlink($mypath.$_GET["fileName"]);
    exit(0);
    Header("Location: ".$_SESSION["lastPageToReturn"]."?del_files=1");
  }elseif (!$query) {
    Header("Location: ".$_SESSION["lastPageToReturn"]."?del_files=0");
  }
}

if(isset($_GET["ZipFileSys"])){
  $target = $_GET["ZipFileSys"];
  $sql = "UPDATE mctarchive SET fileZip = NULL WHERE system_id = '$target'";
  $query = mysqli_query($conn,$sql);

  if ($query){
    $mypath= "../storage/".$target.'/';
    echo $mypath.$_GET["fileName"];
    unlink($mypath.$_GET["fileName"]);
    Header("Location: ".$_SESSION["lastPageToReturn"]."&del_files=1");
  }elseif (!$query) {
    Header("Location: ".$_SESSION["lastPageToReturn"]."&del_files=0");
  }
}

$url = $_SESSION["lastPageToReturn"];

echo $_SESSION["lastPageToReturn"];
//echo "Location: ".$_SESSION["lastPageToReturn"]."?del_branch=0";
echo "NUTZ";
 ?>
<!-- Developed By SiWDOL M. -->
