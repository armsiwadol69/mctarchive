<?php
date_default_timezone_set("Asia/Bangkok");
if (isset($_POST['username']) == 0 AND isset($_POST['password']) == 0) {
  //Header("Location: index.php?login=notlogin");
  exit(0);
}
include '../conn.php';
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

$username = mysqli_real_escape_string($conn,$_POST['username']);
$password = mysqli_real_escape_string($conn,base64_encode($_POST['password']));

session_start();

        if(isset($_POST['username'])){

                  echo $username;
                  echo $password;
                  //exit(0);
                  $sql="SELECT * FROM login WHERE username='$username' AND password ='$password'";
                  $result = mysqli_query($conn,$sql);

                  if(mysqli_num_rows($result)==1){
                      $row = mysqli_fetch_array($result);
                      
                      $_SESSION["user_id"] = $row["user_id"];
                      $_SESSION["username"] = $row["username"];
                      $_SESSION["level"] = $row["level"];
                      $_SESSION["name"] = $row["name"];
                      
                      $isActive = strval($row["status"]);
                      echo $isActive;
                      //exit(0);
                      if($isActive != '1'){
                        session_destroy();
                        Header("Location: index.php?login=NotActive");
                        exit(0);
                      }

                      $_SESSION["time"] = date("Y-m-d H:i:s");
                      $_SESSION["timeout"] = time();

                      if($_SESSION["level"]=="ADMIN" OR $_SESSION["level"]=="USER"){
                      echo "OK!";
                      echo $_SESSION["user_id"];
                      echo $_SESSION["username"];
                      echo $_SESSION["level"];
                      echo $_SESSION["timeout"];
                      Header("Location: dashboard.php");
                      }

                }
                else{
             echo "ERROR";
             Header("Location: index.php?login=fail");
        }
        }
?>
