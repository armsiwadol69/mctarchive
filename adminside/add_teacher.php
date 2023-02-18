<?php
session_start();

include '../conn.php';
include 'commonf.php';

checkTimeout();
checkAdminUser();

$conn = mysqli_connect($serverName, $userName, $userPassword, $dbName);



//////////////////////////////////////////////
if (isset($_GET["edit"]) and $_GET["edit"] == '1') {
    $targetID = mysqli_real_escape_string($conn, $_POST["teacher_ID"]);
    $nameTitle = mysqli_real_escape_string($conn, $_POST["nameTitle"]);
    $Tname = mysqli_real_escape_string($conn, $_POST["teacher"]);
    $t_branch = mysqli_real_escape_string($conn, $_POST["branch"]);
    echo $_POST["teacher"];

    $sql = "UPDATE teacher SET nameTitle =  '$nameTitle',teacherName =  '$Tname',branch =  '$t_branch' WHERE teacher_id = '$targetID'";
    $query = mysqli_query($conn, $sql);

    if ($query == 1) {
        Header("Location: " . $_SESSION["lastPageToReturn"] . "?add_teacher=4");
    } elseif ($query == 0) {
        Header("Location: " . $_SESSION["lastPageToReturn"] . "?add_teacher=0");
    }
    exit(0);
}

if (isset($_POST["teacher"]) == 0 or empty($_POST["teacher"]) == 1) {
    Header("Location: dashboard.php?add_teacher=2");
    exit(0);
}

$nameTitle = mysqli_real_escape_string($conn, $_POST["nameTitle"]);
$Tname = mysqli_real_escape_string($conn, $_POST["teacher"]);
$t_branch = mysqli_real_escape_string($conn, $_POST["branch"]);
echo $_POST["teacher"];

$sql = "INSERT INTO teacher(nameTitle,teacherName,branch)
VALUES('$nameTitle','$Tname','$t_branch')";
$query = mysqli_query($conn, $sql);

if ($query == 1) {
    Header("Location: " . $_SESSION["lastPageToReturn"] . "?add_teacher=1");
} elseif ($query == 0) {
    Header("Location: " . $_SESSION["lastPageToReturn"] . "?add_teacher=0");
}
?>
<!-- Developed By SiWDOL M. -->
