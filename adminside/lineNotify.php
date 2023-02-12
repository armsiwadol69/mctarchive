<?php
function sendLineNotify($message){
    $url        = 'https://notify-api.line.me/api/notify';
    $token      = 'EeOSm4GaEaXiiyzscfbeNeX0PZNKYI5sV8mdZ7tzim5';
    $headers    = [
                    'Content-Type: application/x-www-form-urlencoded',
                    'Authorization: Bearer '.$token
                ];
    $fields  =  'message='.$message;
    echo $fields;
    
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, $url);
    curl_setopt( $ch, CURLOPT_POST, 1);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec( $ch );
    curl_close( $ch );
    
    var_dump($result);
    $result = json_decode($result,TRUE);
}

//sendLineNotify($message);

?>