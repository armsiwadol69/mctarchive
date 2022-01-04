<?php
session_start();
if (isset($_SESSION["timeout"]) == 0) {
  Header("Location: index.php?login=notlogin");
}
echo time() - $_SESSION["timeout"];
 ?>
