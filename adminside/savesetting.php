<?php
session_start();
include 'commonf.php';
checkTimeout();
checkAdminUser();

include '../conn.php';
$conn = mysqli_connect($serverName, $userName, $userPassword, $dbName);
$shortNameEng = $_POST["shortNameEng"];
$websiteName = $_POST["websiteName"];
$subName = $_POST["subName"];
$email = $_POST["email"];
$telNumber = $_POST["telNumber"];
$pubUpload = $_POST["pubUpload"];

echo $websiteName;
echo $subName;
echo $email;
echo $telNumber;

if ($pubUpload == "1") {
    $change_setting = 1;
} else {
    $change_setting = 0;
}

$sql_setting_c = "UPDATE setting SET setting = '$change_setting' WHERE var = 'free2uplaod'";
$query_setting_c = mysqli_query($conn, $sql_setting_c);

echo "$change_setting";

$setting2JSON = array(
    "shortNameEng" => $shortNameEng,
    "v_websiteName" => $websiteName,
    "v_websiteName" => $websiteName,
    "v_subName" => $subName,
    "v_email" => $email,
    "v_telNumber" => $telNumber,
    "v_change_setting" => $change_setting,
);

// encode array to json
$json = json_encode($setting2JSON, JSON_UNESCAPED_UNICODE);

//write json to file
if (file_put_contents("WebSetting.json", $json)) {
    echo "JSON file created successfully...";
} else {
    echo "Oops! Error creating json file...";
    Header("Location: setting.php?savesetting=0");
}


Header("Location: setting.php?savesetting=1");
