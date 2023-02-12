<?php
session_start();
include 'commonf.php';
include 'lineNotify.php';
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
if($change_setting == "1"){
    $pubCanLine = "เปิดการเพิ่มข้อมูลจากผู้ใช้ภายนอก";
}else{
    $pubCanLine = "ปิดการเพิ่มข้อมูลจากผู้ใช้ภายนอก";
}

$setting2JSON = array(
    "shortNameEng" => $shortNameEng,
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
    $message = 
    "มีการตั้งค่าเว็บไซต์ดังต่อไปนี้ \n".
    'ชื่อย่อภาษาอังกฤษ : '.$shortNameEng."\n".
    'ชื่อเว็บไซต์ : '.$websiteName."\n".
    'คำอธิบายเพิ่มเติม : '.$subName."\n".
    'อีเมล : '.$email."\n".
    'เบอร์โทร : '.$telNumber."\n".
    'อื่นๆ : '.$pubCanLine."\n".
    'เมื่อ '.date('Y-m-d H:i:s').' โดย '.$_SESSION["name"];
    sendLineNotify($message);
    Header("Location: setting.php?savesetting=1");
} else {
    echo "Oops! Error creating json file...";
    Header("Location: setting.php?savesetting=0");
}



