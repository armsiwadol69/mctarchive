<?php
//check time out logout if afk more than 1 hr(3600sec).
function checkTimeout(){
    if (time() - $_SESSION["timeout"] > 3600) {
        unset($_SESSION["username"],$_SESSION["level"],$_SESSION["timeout"]);
        session_destroy();
        Header("Location: index.php?login=afk");
      }else {
        //echo time() - $_SESSION["timeout"];
        $_SESSION["timeout"] = time();
      }
}

//check user level is admin or user
function checkAdminUser(){
  if (isset($_SESSION["level"]) == 0) {
    if ($_SESSION["level"] !== "ADMIN" or $_SESSION["level"] !== "USER") {
        Header("Location: index.php?login=notlogin");
        exit(0);
    }
}
}

//check user level is admin if not kick to db.
function checkAdminOnly(){
  if (isset($_SESSION["level"]) == 0) {
    if ($_SESSION["level"] !== "ADMIN") {
        Header("Location: dashboard.php");
        exit(0);
    }
}
}

//chekc is login
function isLogin(){
  if (isset($_SESSION["level"])) {
    if ($_SESSION["level"] == "ADMIN" OR $_SESSION["level"] == "USER") {
      Header("Location: dashboard.php");}
  }
}


?>