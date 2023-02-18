<?php
date_default_timezone_set('Asia/Bangkok');
//check time out logout if afk more than 1 hr(3600sec).
function checkTimeout()
{
    if (time() - $_SESSION["timeout"] > 3600) {
        unset($_SESSION["username"], $_SESSION["level"], $_SESSION["timeout"]);
        session_destroy();
        Header("Location: index.php?login=afk");
    } else {
        //echo time() - $_SESSION["timeout"];
        $_SESSION["timeout"] = time();
    }
}

//check user level is admin or user
function checkAdminUser()
{
    if (isset($_SESSION["level"]) == 0) {
        if ($_SESSION["level"] !== "ADMIN" or $_SESSION["level"] !== "USER") {
            Header("Location: index.php?login=notlogin");
            exit(0);
        }
    }
}

//check user level is admin if not kick to db.
function checkAdminOnly()
{
    if (isset($_SESSION["level"]) == 0) {
        if ($_SESSION["level"] !== "ADMIN") {
            Header("Location: dashboard.php");
            exit(0);
        }
    }
}

//chekc is login
function isLogin()
{
    if (isset($_SESSION["level"])) {
        if ($_SESSION["level"] == "ADMIN" or $_SESSION["level"] == "USER") {
            Header("Location: dashboard.php");}
    }
}

//get c_page

function getThisPage()
{
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $url = "https://";
    } else {
        $url = "http://";
    }

// Append the host(domain name, ip) to the URL.
    $url .= $_SERVER['HTTP_HOST'];

// Append the requested resource location to the URL
    $url .= $_SERVER['REQUEST_URI'];
    unset($_SESSION["lastPageToReturn"]);

    if (strpos($url, 'edit_topic.php')) {
        $_SESSION["lastPageToReturn"] = $url;
    } else {
        $_SESSION["lastPageToReturn"] = substr($url, 0, strpos($url, "?"));
    }

    if (empty($_SESSION["lastPageToReturn"])) {
        $_SESSION["lastPageToReturn"] = $url;
    }
    //echo $url;
    //echo "/";
    //echo $_SESSION["lastPageToReturn"];
    // echo "----";
    // echo substr($url, 0, strpos($url, "?"));

}

//onlySadmin
function onlySadmin()
{
    if ($_SESSION["level"] != "ADMIN") {echo "list-group-item-secondary active text-muted pe-none disabled";} else {echo "list-group-item-dark active";}
}

//check2delFile

function delVideo($system_id, $fileName)
{
    if (!empty($fileName)) {
        echo '<button type="button" class="btn btn-danger" onclick="delVideoFile(' . "'" . $system_id . "'," . "'" . $fileName . "'" . ');"><i class="bi bi-trash"></i></button>';
    } else {
        echo '<button type="button" class="btn btn-danger disabled"><i class="bi bi-trash"></i></button>';
    }
}

function delAudio($system_id, $fileName)
{
    if (!empty($fileName)) {
        echo '<button type="button" class="btn btn-danger" onclick="delAudio(' . "'" . $system_id . "'," . "'" . $fileName . "'" . ');"><i class="bi bi-trash"></i></button>';
    } else {
        echo '<button type="button" class="btn btn-danger disabled"><i class="bi bi-trash"></i></button>';
    }
}

function delZipFile($system_id, $fileName)
{
    if (!empty($fileName)) {
        echo '<button type="button" class="btn btn-danger" onclick="delZipFile(' . "'" . $system_id . "'," . "'" . $fileName . "'" . ');"><i class="bi bi-trash"></i></button>';
    } else {
        echo '<button type="button" class="btn btn-danger disabled"><i class="bi bi-trash"></i></button>';
    }
}

//onetime upload
// Submit button clicked
include '../conn.php';
$conn = mysqli_connect($serverName, $userName, $userPassword, $dbName);

function checkRecordExists($skiper, $id)
{
    global $conn;
    if ($skiper == "1") {
        $querySenCheck = "SELECT * FROM mctarchive WHERE id = '$id'";
        $query2Check = mysqli_query($conn, $querySenCheck);
    } else {
        $querySenCheck = "SELECT * FROM mctarchive_pre WHERE id = '$id'";
        $query2Check = mysqli_query($conn, $querySenCheck);
    }

    $checkResultExists = $conn->query($querySenCheck);

    if ($checkResultExists) {
        if (mysqli_num_rows($checkResultExists) > 0) {
            echo 'found!';
            $IDisExitst = true;
        } else {
            echo 'not found';
            $IDisExitst = false;
        }
    } else {
        echo 'Error: ' . mysqli_error();
    }
    return $IDisExitst;
}
//read settingFromJSON

function readSettingJSON()
{

    // Read the JSON file
    $json = file_get_contents('WebSetting.json');

    // Decode the JSON file
    $json_data = json_decode($json, true);

    // Display data
    //print_r($json_data);

    extract($json_data);

    // echo $v_websiteName;
    // echo $v_subName;
    // echo $v_email;
    // echo $v_telNumber;
    // echo $v_change_setting;

}

function readSettingJSON2MainPage()
{

    // Read the JSON file
    $json = file_get_contents('WebSetting.json');

    // Decode the JSON file
    $json_data = json_decode($json, true);

    // Display data
    //print_r($json_data);

    extract($json_data);

    // echo $v_websiteName;
    // echo $v_subName;
    // echo $v_email;
    // echo $v_telNumber;
    // echo $v_change_setting;
    // v_websiteName v_subName
    return $json_data;

}

function echoUserLevel($lvs){
    if($lvs == 'ADMIN'){
        echo 'ผู้ดูแลระบบ';
    }else{
        echo 'ผู้เพิ่มข้อมูล';
    }
}
