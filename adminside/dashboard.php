<?php
session_start();
//echo $_SESSION["level"];
if (isset($_SESSION["level"]) == 0) {
  if ($_SESSION["level"] !== "ADMIN" OR $_SESSION["level"] !== "USER") {
    Header("Location: index.php?login=notlogin");
    exit(0);
  }
}
//////////////////////////////////////////////
if (time() - $_SESSION["timeout"] > 3600) {
  unset($_SESSION["username"],$_SESSION["level"],$_SESSION["timeout"]);
  session_destroy();
  Header("Location: index.php?login=afk");
}else {
  //echo time() - $_SESSION["timeout"];
  $_SESSION["timeout"] = time();
}
//////////////////////////////////////////////
include '../conn.php';
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
//echo $_SESSION["username"];
//echo $_SESSION["level"];
$sql_allyear = "SELECT * FROM year ORDER BY year ";
$sql_allyearshow = mysqli_query($conn, $sql_allyear);
$sql_teacher = "SELECT * FROM teacher ORDER BY name ASC";
$result_teacher = mysqli_query($conn, $sql_teacher);

if (isset($_GET["page"])) {
  $page_default = intval($_GET["page"]);
}else {
  $page_default = 1;
}

$result = $conn->query("SELECT id FROM mctarchive ORDER BY id");
$row_cnt = $result->num_rows;
$no_of_records_per_page = 20;
$offset = ($page_default-1) * $no_of_records_per_page;
$total_pages = ceil($row_cnt / $no_of_records_per_page);

//////////////////////////////////////////////////////////////////////////

if (isset($_GET["page_pre"])) {
  $page_pre_default = intval($_GET["page_pre"]);
}else {
  $page_pre_default = 1;
}

$result_page_pre = $conn->query("SELECT id FROM mctarchive_pre ORDER BY id");
$row_cnt_page_pre = $result_page_pre->num_rows;
$no_of_records_per_page_pre = 20;
$offse_pre = ($page_pre_default-1) * $no_of_records_per_page_pre;
$total_pages_pre = ceil($row_cnt_page_pre / $no_of_records_per_page_pre);

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="shortcut icon" href="../favicon.png" type="image/x-icon">
     <link rel="icon" href="../favicon.png" type="image/x-icon">
     <link rel="stylesheet" href="..\bootstrap5\css\bootstrap.min.css">
     <link rel="stylesheet" href="..\custom\sicustom.css">
     <link rel="stylesheet" href="..\custom\aos.css">
     <script type="text/javascript" src="..\custom\aos.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
     <meta charset="utf-8">
     <title>ADMIN : MCT Library</title>
   </head>
   <body>
   <h1 class="visually-hidden">Sidebars examples</h1>

<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
    <span class="fs-4">Sidebar</span>
  </a>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="#" class="nav-link active" aria-current="page">
        <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
        Home
      </a>
    </li>
    <li>
      <a href="#" class="nav-link text-white">
        <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
        Dashboard
      </a>
    </li>
    <li>
      <a href="#" class="nav-link text-white">
        <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
        Orders
      </a>
    </li>
    <li>
      <a href="#" class="nav-link text-white">
        <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
        Products
      </a>
    </li>
    <li>
      <a href="#" class="nav-link text-white">
        <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
        Customers
      </a>
    </li>
  </ul>
  <hr>
  <div class="dropdown">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
      <strong>mdo</strong>
    </a>
    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
      <li><a class="dropdown-item" href="#">New project...</a></li>
      <li><a class="dropdown-item" href="#">Settings</a></li>
      <li><a class="dropdown-item" href="#">Profile</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="#">Sign out</a></li>
    </ul>
  </div>
</div>
   
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
     <script type="text/javascript" src="..\bootstrap5\js\bootstrap.min.js"></script>
     <script type="text/javascript" src="..\custom\tooltips.js"></script>
   </body>
 </html>
<!-- Developed By SiWDOL M. -->
