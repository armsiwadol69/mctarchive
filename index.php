<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="bootstrap5\css\bootstrap.min.css">
    <link rel="stylesheet" href="custom\sicustom.css">
    <link rel="stylesheet" href="custom\aos.css">
    <script type="text/javascript" src="custom\aos.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <meta charset="utf-8">
    <title>ระบบสืบค้นปริญญานิพนธ์และงานวิจัย คณะเทคโนโลยีสื่อสารมวลชน มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี</title>
    <meta property="og:title" content="ระบบสืบค้นปริญญานิพนธ์และงานวิจัย คณะเทคโนโลยีสื่อสารมวลชน มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี" />
    <meta property="og:description" content="ระบบสืบค้นปริญญานิพนธ์และงานวิจัย คณะเทคโนโลยีสื่อสารมวลชน มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี"/>
    <meta property="og:image" content="favicon.png" />
  </head>
  <body>
 <?php
 include'navbar.php';
 $result = $conn->query("SELECT id FROM mctarchive ORDER BY id");
 $row_cnt = $result->num_rows;
  ?>

   <div class="container">
     <div class="row">
      <div class="col-12">
        <div class="jumbotron jumbotron_site mainjum mainvector mt-4">
  <h2 class="display-5">ระบบสืบค้นปริญญานิพนธ์และงานวิจัย</h2>
  <p class="lead">คณะเทคโนโลยีสื่อสารมวลชน มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี</p>
  <hr class="my-4" style="max-width:70%" >
  <h4 class="">มีปริญญานิพนธ์และงานวิจัยที่ถูกจัดเก็บเป็นจำนวน <span class="badge bg-dark text-while no-text-outline"> <?php echo "$row_cnt"; ?></span> รายการ</h4>
</div>
      </div>
     </div>
     <div class="row">
       <?php
       if (isset($_GET["add"]) == 1) {
           $add_tt = $_GET["add"];
           if ($add_tt == "0") {
             echo '
             <div class="alert alert-danger w-100 shadow-sm" role="alert">
             ไม่สามารถส่งข้อมูลให้ผู้ดูแลระบบได้ กรุณาติดต่อผู้ดูแลระบบเพื่อตรวจสอบว่า ID ที่กรอกนั้นมีอยู่แล้วหรือไม่
             </div>
             ';
           }elseif ($add_tt == "1") {
             echo '
             <div class="alert alert-success w-100 shadow-sm" role="alert">
             ส่งข้อมูลให้ผู้ดูแลระบบเรียบร้อย
             </div>
             '
             ;
           }
         }
        ?>
     </div>
     <?php include 'searchbox.php'; ?>
    <div class="row" id="kokodayo" name="kokodayo">
      <?php
      if (isset($_GET["page"]) AND !empty($_GET["page"])) {
        $page_default = intval($_GET["page"]);
      }else {
        $page_default = 1;
      }

      $no_of_records_per_page = 12;
      $offset = ($page_default-1) * $no_of_records_per_page;
      $total_pages = ceil($row_cnt / $no_of_records_per_page);


      $sql_all = "SELECT * FROM mctarchive LEFT JOIN teacher AS mainTeacher ON mctarchive.teacher = mainTeacher.teacher_id LEFT JOIN branch ON mctarchive.branch = branch.branch_id
        ORDER BY add_date DESC LIMIT $offset, $no_of_records_per_page ";

      //$sql_all = "SELECT * FROM mctarchive ORDER BY id ASC";
      $query = mysqli_query($conn,$sql_all);
      $result_all = mysqli_query($conn, $sql_all);
      include'topiccard.php'; // card
            ?>

    <div class="col-12">
      <div class="mt-3 w-100">
      <hr class="mt-4">
      <div class="btn-toolbar w-100" style="justify-content: center; display: flex;" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group my-2 shadow-sm" role="group" aria-label="First group">
         <a class="btn btn-dark" href="?page=1#kokodayo">หน้าแรก</a>


         <a class="btn btn-dark <?php if($page_default <= 1){ echo 'disabled'; } ?>"
             href="<?php if($page_default <= 1){ echo ''; } else { echo "?page=".($page_default - 1); } ?>#kokodayo">หน้าที่แล้ว</a>
         </a>

         <?php if ($page_default - 3 > 0) {
           $numtoback = $page_default - 3;
           echo '<a class="btn btn-dark" href="?page='.$numtoback.'#kokodayo">';
           echo $page_default - 3;
           echo "</a>";}
           if ($page_default - 2 > 0) {
             $numtoback = $page_default - 2;
             echo '<a class="btn btn-dark" href="?page='.$numtoback.'#kokodayo">';
             echo $page_default - 2;
             echo "</a>";}
             if ($page_default - 1 > 0) {
               $numtoback = $page_default - 1;
               echo '<a class="btn btn-dark" href="?page='.$numtoback.'#kokodayo">';
               echo $page_default - 1;
               echo "</a>";}
          ?>

         <button class="btn btn-dark mx-2"><?php  echo "$page_default";?></button>

         <?php if ($page_default + 1 <= $total_pages) {
           $numtoback = $page_default + 1;
           echo '<a class="btn btn-dark" href="?page='.$numtoback.'#kokodayo">';
           echo $page_default + 1;
           echo "</a>";}
           if ($page_default + 2 <= $total_pages) {
             $numtoback = $page_default + 2;
             echo '<a class="btn btn-dark" href="?page='.$numtoback.'#kokodayo">';
             echo $page_default + 2;
             echo "</a>";}
             if ($page_default + 3 <= $total_pages) {
               $numtoback = $page_default + 3;
               echo '<a class="btn btn-dark" href="?page='.$numtoback.'#kokodayo">';
               echo $page_default + 3;
               echo "</a>";}
          ?>

         <a class="btn btn-dark <?php if($page_default >= $total_pages){ echo 'disabled'; } ?>"
              href="<?php if($page_default >= $total_pages){ echo '#'; } else { echo "?page=".($page_default + 1); } ?>#kokodayo">หน้าถัดไป
         </a>
         <a class="btn btn-dark <?php if ($page_default == $total_pages) {echo "disabled";} ?>" href="?page=<?php echo $total_pages; ?>#kokodayo">หน้าสุดท้าย</a>

    </div>
      </div>
    </div>
    </div>
    <?php include 'footer.php'; ?>
   </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script type="text/javascript" src="bootstrap5\js\bootstrap.min.js"></script>
    <script type="text/javascript" src="custom\tooltips.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.0/jquery.cookie.min.js"></script>
    <script type="text/javascript">
     $(document).ready(function() {
         if ($.cookie('pop') == null) {
             $('#show1Visit').modal('show');
             $.cookie('pop', '1');
         }
     });
    </script>
  </body>
</html>
<!-- Developed By SiWDOL M. -->
