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
if (time() - $_SESSION["timeout"] > 900) {
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
     <?php include 'navbar_admin.php'; ?>
    <div class="container">
      <div class="row">
       <div class="col-12">
         <div class="jumbotron jumbotron_admin mainjum mainvector mt-4">
   <h2 class="display-5">ส่วนผู้ดูแล : ระบบสืบค้นปริญญานิพนธ์และงานวิจัย</h2>
   <hr class="my-4" style="max-width:70%" >
   <p class="lead">คณะเทคโนโลยีสื่อสารมวลชน มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี</p>
   <h5>ยินดีตอนรับคุณ <?php echo $_SESSION["name"]; ?> เข้าสู่ระบบเมื่อ <?php echo $_SESSION["time"]; ?></h5>

 </div>
       </div>
      </div>

       <?php include 'nofbox.php';

        include 'searchbox.php';

        include 'modal.php'; ?>

     <div class="row my-3">
     <div class="col-12">
       <div class="card" id="displayed" name="displayed">
         <h3 class="card-header">รายการทั้งหมดที่ถูกแสดงผล</h3>
     <div class="card-body">
          <div class="table-responsive">
          <table class="table text-dark table-hover table-striped mx-auto my-auto w-100 text-center align-middle" data-aos="fade-up" data-aos-duration="500">
                       <tr>
                       <td>ID</td>
                       <td style="width:50%;">หัวข้อ</td>
                       <!-- <td>อาจารย์ที่ปรึกษา</td> -->
                       <td>ประเภท</td>
                       <td>สาขา</td>
                       <td>ปีการศึกษา</td>
                       <td>ดู</td>
                       <td>แสดงผล</td>
                       <td>แก้ไข</td>
                       <td>ลบ</td>
                     </tr>
          <?php
          if($_SESSION["level"] !== "ADMIN"){ $permission = " disabled";}else {
            $permission = "";
          };
          $sql_all = "SELECT * FROM mctarchive ORDER BY add_date DESC LIMIT $offset, $no_of_records_per_page";
          $query = mysqli_query($conn,$sql_all);
          $result_all = mysqli_query($conn, $sql_all);
                while($all = mysqli_fetch_array($result_all)) {
                echo "<tr>" . "<td>" .$all["id"] .   "</td> ";
                echo "<td>" .$all["thainame"] .   "</td> ";
                //echo "<td>" .$all["teacher"] .   "</td> ";
                if ($all["type_doc"] == "1") {
                    echo "<td>ปริญญานิพนธ์นักศึกษา</td>";
                }else {
                  echo "<td>วิจัยอาจารย์</td>";}
                echo "<td>" .$all["branch"] .   "</td> ";
                echo "<td>" .$all["sec"] .   "</td> ";
                echo "<td>" . '<a type="button" class="btn btn-info" target="_blank" href="../view.php?id='.$all["system_id"].'"><i class="bi bi-eye"></i></a>' .   "</td> ";
                echo "<td>" . '<a type="button" class="btn btn-success'.$permission.'" href="change_status.php?id='.$all["system_id"].'#preview"><i class="bi bi-arrow-left-right"></i></a>' .   "</td> ";
                echo "<td>" . '<a type="button" class="btn btn-warning'.$permission.'" href="edit_topic.php?id='.$all["system_id"].'"><i class="bi bi-pencil-square"></i></a>' .   "</td> ";
                echo "<td>" . '<a type="button" class="btn btn-danger'.$permission.'" href="del_topic.php?idtodel='.$all["system_id"].'"><i class="bi bi-trash"></i></a>' .   "</td> " ."</tr>" ;
                };
                ?>
     </table>
     </div>
     <div class="mt-3 w-100">
     <hr class="my-2">
     <div class="btn-toolbar w-100" style="justify-content: center; display: flex;" role="toolbar" aria-label="Toolbar with button groups">
     <div class="btn-group my-2 shadow-sm" role="group" aria-label="First group">
      <a class="btn btn-dark" href="?page=1<?php echo "&page_pre=".$page_pre_default;  ?>#displayed">หน้าแรก</a>


      <a class="btn btn-dark <?php if($page_default <= 1){ echo 'disabled'; } ?>"
          href="<?php if($page_default <= 1){ echo ''; } else { echo "?page=".($page_default - 1); } ?>#displayed">หน้าที่แล้ว</a>
      </a>

      <?php if ($page_default - 3 > 0) {
        $numtoback = $page_default - 3;
        echo '<a class="btn btn-dark" href="?page='.$numtoback."&page_pre=".$page_pre_default.'#displayed">';
        echo $page_default - 3;
        echo "</a>";}
        if ($page_default - 2 > 0) {
          $numtoback = $page_default - 2;
          echo '<a class="btn btn-dark" href="?page='.$numtoback."&page_pre=".$page_pre_default.'#displayed">';
          echo $page_default - 2;
          echo "</a>";}
          if ($page_default - 1 > 0) {
            $numtoback = $page_default - 1;
            echo '<a class="btn btn-dark" href="?page='.$numtoback."&page_pre=".$page_pre_default.'#displayed">';
            echo $page_default - 1;
            echo "</a>";}
       ?>

      <button class="btn btn-dark mx-2"><?php  echo "$page_default";?></button>

      <?php if ($page_default + 1 <= $total_pages) {
        $numtoback = $page_default + 1;
        echo '<a class="btn btn-dark" href="?page='.$numtoback."&page_pre=".$page_pre_default.'#displayed">';
        echo $page_default + 1;
        echo "</a>";}
        if ($page_default + 2 <= $total_pages) {
          $numtoback = $page_default + 2;
          echo '<a class="btn btn-dark" href="?page='.$numtoback."&page_pre=".$page_pre_default.'#displayed">';
          echo $page_default + 2;
          echo "</a>";}
          if ($page_default + 3 <= $total_pages) {
            $numtoback = $page_default + 3;
            echo '<a class="btn btn-dark" href="?page='.$numtoback."&page_pre=".$page_pre_default.'#displayed">';
            echo $page_default + 3;
            echo "</a>";}
       ?>

      <a class="btn btn-dark <?php if($page_default >= $total_pages){ echo 'disabled'; } ?>"
           href="<?php if($page_default >= $total_pages){ echo '#'; } else { echo "?page=".($page_default + 1); } ?><?php echo "&page_pre=".$page_pre_default;  ?>#displayed">หน้าถัดไป
      </a>
      <a class="btn btn-dark <?php if ($page_default >= $total_pages) {echo "disabled";} ?>" href="?page=<?php echo $total_pages; ?><?php echo "&page_pre=".$page_pre_default;  ?>#displayed">หน้าสุดท้าย</a>

 </div>
     </div>
   </div>
     </div>
   </div>
     </div>

     <div class="col-12 mt-4">
       <div class="card" id="preview" name="preview">
         <h3 class="card-header">รายการตรวจสอบ / ยังไม่ถูกไปนำไปแสดงผล</h3>
     <div class="card-body">
          <div class="table-responsive">
          <table class="table text-dark table-hover table-striped mx-auto my-auto w-100 text-center align-middle" data-aos="fade-up" data-aos-duration="500">
                       <tr>
                       <td>ID</td>
                       <td style="width:50%;">หัวข้อ</td>
                       <!-- <td>อาจารย์ที่ปรึกษา</td> -->
                       <td>ประเภท</td>
                       <td>สาขา</td>
                       <td>ปีการศึกษา</td>
                       <td>เพิ่มโดย</td>
                       <td>ดู</td>
                       <td>แสดงผล</td>
                       <td>แก้ไข</td>
                       <td>ลบ</td>
                     </tr>
          <?php
          if($_SESSION["level"] !== "ADMIN"){ $permission = " disabled";}else {
            $permission = "";
          };
          $sql_all_wait = "SELECT * FROM mctarchive_pre ORDER BY add_date ASC LIMIT $offse_pre, $no_of_records_per_page_pre";
          $query = mysqli_query($conn,$sql_all_wait);
          $result_all_wait = mysqli_query($conn, $sql_all_wait);
                while($all = mysqli_fetch_array($result_all_wait)) {
                echo "<tr>" . "<td>" .$all["id"] .   "</td> ";
                echo "<td>" .$all["thainame"] .   "</td> ";
                //echo "<td>" .$all["teacher"] .   "</td> ";
                if ($all["type_doc"] == "1") {
                    echo "<td>ปริญญานิพนธ์นักศึกษา</td>";
                }else {
                  echo "<td>วิจัยอาจารย์</td>";}
                echo "<td>" .$all["branch"] .   "</td> ";
                echo "<td>" .$all["sec"] .   "</td> ";
                echo "<td>" .$all["add_by"] .   "</td> ";
                echo "<td>" . '<a type="button" class="btn btn-info" target="_blank" href="../view.php?preview=1&id='.$all["system_id"].'"><i class="bi bi-eye"></i></a>' .   "</td> ";
                echo "<td>" . '<a type="button" class="btn btn-success '.$permission.'" href="change_status.php?preview=1&id='.$all["system_id"].'#displayed"><i class="bi bi-arrow-left-right"></i>' .   "</td> ";
                echo "<td>" . '<a type="button" class="btn btn-warning" href="edit_topic.php?preview=1&id='.$all["system_id"].'"><i class="bi bi-pencil-square"></i></a>' .   "</td> ";
                echo "<td>" . '<a type="button" class="btn btn-danger" href="del_topic.php?preview=1&idtodel='.$all["system_id"].'"><i class="bi bi-trash"></i></a>' .   "</td> " ."</tr>" ;
                };
                ?>
     </table>
     </div>
     <div class="mt-3 w-100">
     <hr class="my-2">
     <div class="btn-toolbar w-100" style="justify-content: center; display: flex;" role="toolbar" aria-label="Toolbar with button groups">
     <div class="btn-group my-2 shadow-sm" role="group" aria-label="First group">
      <a class="btn btn-dark" href="<?php echo "?page=".$page_default; ?>&page_pre=1#preview">หน้าแรก</a>
      <a class="btn btn-dark <?php if($page_pre_default  <= 1){ echo 'disabled'; } ?>"
          href="<?php echo "?page=".$page_default; ?><?php if($page_pre_default  <= 1){ echo '#'; } else { echo "&page_pre=".($page_pre_default  - 1); } ?>#preview">หน้าที่แล้ว</a>
      </a>

      <?php if ($page_pre_default - 3 > 0) {
        $numtoback = $page_pre_default - 3;
        echo '<a class="btn btn-dark" href="?page='.$page_default."&page_pre=".$numtoback.'#preview">';
        echo $page_pre_default - 3;
        echo "</a>";}
        if ($page_pre_default - 2 > 0) {
          $numtoback = $page_pre_default - 2;
          echo '<a class="btn btn-dark" href="?page='.$page_default."&page_pre=".$numtoback.'#preview">';
          echo $page_pre_default - 2;
          echo "</a>";}
          if ($page_pre_default - 1 > 0) {
            $numtoback = $page_pre_default - 1;
            echo '<a class="btn btn-dark" href="?page='.$page_default."&page_pre=".$numtoback.'#preview">';
            echo $page_pre_default - 1;
            echo "</a>";}
       ?>

      <button class="btn btn-dark mx-2"><?php  echo "$page_pre_default ";?></button>

      <?php if ($page_pre_default + 1 <= $total_pages_pre) {
        $numtoback = $page_pre_default + 1;
        echo '<a class="btn btn-dark" href="?page='.$page_default."&page_pre=".$numtoback.'#preview">';
        echo $page_pre_default + 1;
        echo "</a>";}
        if ($page_pre_default + 2 <= $total_pages_pre) {
          $numtoback = $page_pre_default + 2;
          echo '<a class="btn btn-dark" href="?page='.$page_default."&page_pre=".$numtoback.'#preview">';
          echo $page_pre_default + 2;
          echo "</a>";}
          if ($page_pre_default + 3 <= $total_pages_pre) {
            $numtoback = $page_pre_default + 3;
            echo '<a class="btn btn-dark" href="?page='.$page_default."&page_pre=".$numtoback.'#preview">';
            echo $page_pre_default + 3;
            echo "</a>";}
       ?>


      <a class="btn btn-dark <?php if($page_pre_default  >= $total_pages_pre){ echo 'disabled'; } ?>"
           href="<?php echo "?page=".$page_default; ?><?php if($page_pre_default  >= $total_pages_pre){ echo '#'; } else { echo "&page_pre=".($page_pre_default  + 1); } ?>#preview">หน้าถัดไป
      </a>
      <a class="btn btn-dark <?php if($page_pre_default  >= $total_pages_pre){ echo 'disabled'; } ?>" href="<?php echo "?page=".$page_default; ?>&page_pre=<?php echo $total_pages_pre; ?>#preview">หน้าสุดท้าย</a>

  </div>
     </div>
   </div>
     </div>
   </div>
     </div>

     <?php include'../footer.php'; ?>


     </div>
    </div>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
     <script type="text/javascript" src="..\bootstrap5\js\bootstrap.min.js"></script>
     <script type="text/javascript" src="..\custom\tooltips.js"></script>
   </body>
 </html>
<!-- Developed By SiWDOL M. -->
