<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm" >
<div class="container-fluid">
 <a class="navbar-brand" href="dashboard.php"><img src="../favicon.png" class="d-inline-block align-top" width="30" height="30" alt=""> MCT Library : Admin SidE</a>
 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
 </button>
 <div class="collapse navbar-collapse" id="navbarSupportedContent">
   <ul class="navbar-nav me-auto mb-2 mb-lg-0">
     <li class="nav-item">
       <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
     </li>
     <li class="nav-item">
       <a class="nav-link active" aria-current="page" target="_blank" href="../index.php">เปิดหน้าหลัก</a>
     </li>
     <li class="nav-item">
       <a class="nav-link active" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#how2use_admin">วีธีการใช้งาน</a>
     </li>
     <li class="nav-item disabled">
       <a class="nav-link disabled" aria-current="page" href="">Version : <?php echo $c_version ?></a>
     </li>
   </ul>
   <form class="d-flex">
     <a class="btn btn-danger" href="logout.php">ออกจากระบบ</a>
   </form>
 </div>
</div>
</nav>
