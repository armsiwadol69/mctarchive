<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION["level"]) == 1) {
  if ($_SESSION["level"] == "ADMIN" OR $_SESSION["level"] == "USER") {
    Header("Location: dashboard.php");}
}
include '../conn.php';
?>
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
  <body data-aos="fade-up" data-aos-duration="500">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" hidden>
   <div class="container-fluid">
     <a class="navbar-brand" href="../">MCT Library</a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         <li class="nav-item">
           <a class="nav-link active" aria-current="page" href="../">หน้าหลัก</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="#">Link</a>
         </li>
         <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Dropdown
           </a>
           <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
             <li><a class="dropdown-item" href="#">Action</a></li>
             <li><a class="dropdown-item" href="#">Another action</a></li>
             <li><hr class="dropdown-divider"></li>
             <li><a class="dropdown-item" href="#">Something else here</a></li>
           </ul>
         </li>
         <li class="nav-item">
           <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
         </li>
       </ul>
       <form class="d-flex">
         <input class="form-control me-2" type="search" placeholder="Work in progess" aria-label="Search">
         <button class="btn btn-outline-success" type="submit">Search</button>
       </form>
     </div>
   </div>
 </nav>
   <div class="container">
     <div class="row">
      <div class="col-12">
        <div class="jumbotron jumbotron_admin jmainjum mainvector j-login mt-5">
  <h2 class="display-5">ส่วนผู้ดูแล : ระบบสืบค้นปริญญานิพนธ์และงานวิจัย</h2>
  <hr class="my-4" style="max-width:70%" >
  <p class="lead">คณะเทคโนโลยีสื่อสารมวลชน มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี</p>
</div>
      </div>
     </div>
    <div class="row mt-5">
    <div class="col-lg-6 mb-2">
      <div class="card shadow-sm">
    <div class="card-body">
      <form name="login" method="POST" action="login.php">
  <div class="form-group mt-2">
    <label for="username">Username</label>
    <input type="username" class="form-control" name="username" aria-describedby="username" placeholder="Username" required>
  </div>
  <div class="form-group mt-2">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password" required>
  </div>
  <div class="form-group mt-3">
      <button type="submit" class="btn btn-block btn-success"><i class="bi bi-key"></i> Login</button>
      <a type="button" href="..\index.php" class="btn btn-secondary my-2"><i class="bi bi-arrow-bar-left"></i> กลับหน้าแรก</a>
  </div>
  </form>
    </div>
  </div>
    </div>
    <div class="col-lg-6">
      <?php
      if (isset($_GET["login"]) == 1) {
      $status = $_GET["login"];
    }else {
      $status = NULL;
    }
      if ($status == "fail") {
        echo '
        <div class="alert alert-warning w-100 shadow-sm" role="alert">
        ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง
        </div>
        ';
      }elseif ($status == "notlogin") {
        echo '
        <div class="alert alert-warning w-100 shadow-sm" role="alert">
        กรุณาเข้าสู่ระบบก่อน
        </div>
        ';
      }
      elseif ($status == "afk") {
        echo '
        <div class="alert alert-warning w-100 shadow-sm" role="alert">
        ออกจากระบบอัตโนมัติเนื่องจากไม่มีการเคลื่อนไหวนานกว่า 15 นาที
        </div>
        ';
      }
      ?>
    </div>


    <?php include'../footer.php'; ?>


    <script type="text/javascript" src="..\bootstrap5\js\bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script type="text/javascript" src="..\custom\tooltips.js"></script>
  </body>
</html>
<!-- Developed By SiWDOL M. -->
