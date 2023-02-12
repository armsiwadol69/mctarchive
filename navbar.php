<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
<div class="container-fluid">
 <a class="navbar-brand" href="index.php"><img src="favicon.png" class="d-inline-block align-top" width="30" height="30" alt=""> <?php echo $shortNameEng;?></a>
 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
 </button>
 <div class="collapse navbar-collapse" id="navbarSupportedContent">
   <ul class="navbar-nav me-auto mb-2 mb-lg-0">
     <li class="nav-item">
       <a class="nav-link active" aria-current="page" href="index.php">หน้าหลัก</a>
     </li>
     <li class="nav-item dropdown" hidden>
       <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        ปีการศึกษา
       </a>
       <ul class="dropdown-menu scrollable-menu" aria-labelledby="navbarDropdown1">
         <?php
         include 'conn.php';
         $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
         $sql_allyear = "SELECT * FROM year ORDER BY year DESC";
         $sql_allyearshow = mysqli_query($conn, $sql_allyear);
         while($yaer_sec = mysqli_fetch_array($sql_allyearshow)) {
         echo '<li><a class="dropdown-item" href="filter.php?year='.$yaer_sec["year"].'">'.$yaer_sec["year"].'</a></li>';
         };
                ?>
       </ul>
     </li>
     <li class="nav-item dropdown" hidden>
       <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        อาจารย์ที่ปรึกษา
       </a>
       <ul class="dropdown-menu scrollable-menu" aria-labelledby="navbarDropdown2">
        <?php
        $sql_teacher = "SELECT * FROM teacher WHERE teacher_id != '0' ORDER BY teacherName ASC";
        $result_teacher = mysqli_query($conn, $sql_teacher);
        while($name_teacher = mysqli_fetch_array($result_teacher)) {
        echo '<li><a class="dropdown-item" href="filter.php?teacher='.$name_teacher["teacher_id"].'&tn='.$name_teacher["teacherName"].'">'.$name_teacher["teacherName"].'</a></li>';
        };
         ?>
       </ul>
     </li>
     <li class="nav-item dropdown" hidden>
       <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        ประเภท
       </a>
       <ul class="dropdown-menu scrollable-menu" aria-labelledby="navbarDropdown3">
        <li><a class="dropdown-item" href="filter.php?type_doc=1">ปริญญานิพนธ์นักศึกษา</a></li>
        <li><a class="dropdown-item" href="filter.php?type_doc=2">งานวิจัยอาจารย์</a></li>
       </ul>
     </li>
     <li class="nav-item dropdown" hidden>
       <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown4" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        สาขา
       </a>
       <ul class="dropdown-menu scrollable-menu" aria-labelledby="navbarDropdown4">
        <?php
        $sql_branch = "SELECT * FROM branch WHERE branch_id != '0' ORDER BY branch_id  ASC";
        $result_branch = mysqli_query($conn, $sql_branch);
        while($name_branch = mysqli_fetch_array($result_branch)) {
        echo '<li><a class="dropdown-item" href="filter.php?branch='.$name_branch["branch_id"].'&bn='.$name_branch["branchName"].'">'.$name_branch["branchName"].'</a></li>';
        };
         ?>
       </ul>
     </li>
     <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown5" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        วิธีใช้งานและอื่นๆ
       </a>
       <ul class="dropdown-menu scrollable-menu" aria-labelledby="navbarDropdown5">
        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#how2use">วิธีการใช้งาน</a></li>
        <!-- <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#show1Visit">โปรดทราบ</a></li>
        <li><hr class="dropdown-divider"></li> -->
        <li><a class="dropdown-item" href="adminside\index.php">หน้าผู้ดูแลระบบ</a></li>
       </ul>
     </li>
   </ul>
   <form class="d-flex" method="GET" action="search.php">
     <input class="form-control me-2" type="search" name="search" placeholder="รหัสประจำเล่ม,ชื่อหรือนามสกุล ผู้ศึกษา" aria-label="Search">
     <button class="btn btn-outline-dark" type="submit"><i class="bi bi-search"></i></button>
   </form>
 </div>
</div>
</nav>

<div class="modal fade" id="how2use" tabindex="-1" aria-labelledby="how2use" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="how2use">วีธีการใช้งาน : ผู้ใช้ทั่วไป</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6>หากไม่ขึ้น ให้สลับ Tab</h6>
        <div style="width: 100%; height: 100%">
  <object class="rounded" style="height:69vh;" data="storage\etc\how2user.pdf" type="application/pdf" width="100%">
  <p>อุปกรณ์ของคุณไม่รองรับการดูไฟล์ .pdf <a href="">คลิกที่นี้เพื่อดูหรือดาวน์โหลด!</a></p>
 </object>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="show1Visit" tabindex="-1" aria-labelledby="show1Visit" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-danger" id="show1Visit">Alert!</h5>
          </div>
          <div class="modal-body">
            <p class="text-danger">This web application is still under development.<br>
                There may be some errors or problems in use.<br>
                Please pretend you've never seen it.
            <p>
            <hr>
            <h5>Changelog</h5>
            <span class="fw-bold">2.5.2R</span>: LINE Notify Supported. Fixed some bugs. Fixed .PDF Viewer not work in iOS Devices. Fixed Login page button Error.</p>
            <p>2.5.1R : fixed some bugs.</p>
            <p>2.5.0R : Lots of new things. fixed some bugs.</p>
            <p>2.4.0β : fixed some bugs.</p>
            <p>2.3.0β : ReDesign Dashboard.</p>
            <p>2.2.0β : Auto Watermark (MCT Logo) On Uplaod PDF Doc. One time submit data. Fixed Teacher Name Conflict Display when have coop Teacher. works.zip now can be Upload.</p>
            <p>2.1.0β : Fixed filter can not use. Fixed search can not use. More Shadow. New Data Table in Dashboard. Fixed DataTable Display only 20. Fixed sql error in information display.</p>
            <p>2.0.2β : Support Associate advisor select add new thesis. Fixed some bugs.</p>
            <p>2.0.1β : New Table Structure. Fixed some bugs.</p>
            <p>2.0.0β : Support for faculty level use. New Login Page.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn w-100 btn-primary" data-bs-dismiss="modal">I understand.</button>
          </div>
        </div>
      </div>
    </div>
