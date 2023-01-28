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
?>