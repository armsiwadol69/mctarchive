<?php
//read settingFromJSON

function readSettingJSON2MainPage()
{

    // Read the JSON file
    $json = file_get_contents('adminside/WebSetting.json');

    // Decode the JSON file
    $json_data = json_decode($json, true);

    // Display data
    //print_r($json_data);
    
    //print_r($json_data);
    //extract($json_data);
    return $json_data;
}


function getThisPage()
{
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $url = "https://";
    } else {
        $url = "http://";
    }

// Append the host(domain name, ip) to the URL.
    $url .= $_SERVER['HTTP_HOST'];
    //echo $url;

// Append the requested resource location to the URL
    $url .= $_SERVER['REQUEST_URI'];
    //echo $url;
    return $url;
    // unset($_SESSION["lastPageToReturn"]);

    // if (strpos($url, 'edit_topic.php')) {
    //     $_SESSION["lastPageToReturn"] = $url;
    // } else {
    //     $_SESSION["lastPageToReturn"] = substr($url, 0, strpos($url, "?"));
    // }

    // if (empty($_SESSION["lastPageToReturn"])) {
    //     $_SESSION["lastPageToReturn"] = $url;
    //}
    //echo $url;
    //echo "/";
    //echo $_SESSION["lastPageToReturn"];
    // echo "----";
    // echo substr($url, 0, strpos($url, "?"));

}
?>