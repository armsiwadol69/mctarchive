<?php
ob_start();
session_start();
$id = $_GET["id"];
if (empty($id) == true) {
  header( "location: index.php" );
  exit(0);
}

include 'conn.php';
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);


if (isset($_GET["preview"]) AND $_GET["preview"] == "1") {

  if (!isset($_SESSION["level"]) AND ($_SESSION["level"] !== "ADMIN" OR $_SESSION["level"] !== "USER")) {
    header('location: admin/index.php?login=notlogin');
  }else {
    // code...
    $sql = "SELECT * , mT.teacherName AS mainTn , cT.teacherName AS coTn FROM mctarchive_pre
    LEFT JOIN teacher AS mT ON mctarchive.teacher = mT.teacher_id
    LEFT JOIN teacher AS cT ON mctarchive.co_teacher = cT.teacher_id
    LEFT JOIN branch ON mctarchive.branch = branch.branch_id
    LEFT JOIN login ON mctarchive.add_by = login.user_id
    WHERE system_id = '$id'";
   }
}

if(!isset($_GET["preview"])){
  $sql = "SELECT * , mT.teacherName AS mainTn , cT.teacherName AS coTn FROM mctarchive
  LEFT JOIN teacher AS mT ON mctarchive.teacher = mT.teacher_id
  LEFT JOIN teacher AS cT ON mctarchive.co_teacher = cT.teacher_id
  LEFT JOIN branch ON mctarchive.branch = branch.branch_id
  LEFT JOIN login ON mctarchive.add_by = login.user_id
  WHERE system_id = '$id'";

}


  
  




$query = mysqli_query($conn,$sql) or die("error");
$result = mysqli_fetch_array($query,MYSQLI_ASSOC);

 ?>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.5/pdfobject.min.js" integrity="sha512-K4UtqDEi6MR5oZo0YJieEqqsPMsrWa9rGDWMK2ygySdRQ+DtwmuBXAllehaopjKpbxrmXmeBo77vjA2ylTYhRA==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <meta charset="utf-8">
    <title><?php  ?><?php echo $result["thainame"]; ?> | ระบบสืบค้นปริญญานิพนธ์และงานวิจัย คณะเทคโนโลยีสื่อสารมวลชน มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี</title>
    <meta property="og:title" content="<?php echo $result["thainame"]; ?> | ระบบสืบค้นปริญญานิพนธ์และงานวิจัย คณะเทคโนโลยีสื่อสารมวลชน มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี" />
    <meta property="og:description" content="ระบบสืบค้นปริญญานิพนธ์และงานวิจัย คณะเทคโนโลยีสื่อสารมวลชน มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี"/>
    <meta property="og:image" content="favicon.png" />
  </head>
  <body>
 <?php
 //echo $id;
 include'navbar.php';

  
 if (empty($result)) {
   if (isset($_GET["preview"]) AND $_GET["preview"] == "1") {
     header("Location: admin/index.php");
   }else {
     header("Location: index.php");
   }
   ob_end_flush();
 }


  ?>

   <div class="container">
     <div class="row">
      <div class="col-12">
        <div class="jumbotron jumbotron_site mainjum mainvector mt-5">
  <h2 class="display-5">ระบบสืบค้นปริญญานิพนธ์และงานวิจัย</h2>
  <p class="lead">คณะเทคโนโลยีสื่อสารมวลชน มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี</p>
  <hr class="my-4" style="max-width:70%" >
</div>
      </div>
     </div>
    <?php include 'searchbox.php'; ?>
     <div class="row mt-3">
       <div class="col-12">
         <div class="card shadow-sm w-100" data-aos="fade-up" data-aos-duration="420">
   <div class="card-header">
     รายละเอียด
   </div>
   <div class="card-body">
     <h4 class="card-title"><i class="bi bi-list-ol"></i> <strong>ID : </strong> <?php echo $result["id"]; ?></h4>
     <h4 class="card-title"><i class="bi bi-blockquote-left"></i> <strong>หัวข้อ : </strong> <?php echo $result["thainame"]; ?></h4>
     <h4 class="card-title"><i class="bi bi-blockquote-left"></i> <strong>Title : </strong> <?php echo $result["engname"]; ?></h4>
      <hr>
     <h3><i class="bi bi-person-lines-fill"></i> <strong>โดย</strong></h3>
     <?php
     echo '<h4>'.'1.'.$result["std1"].'</h4>';
     if (empty($result["std2"] == false)) {
       echo '<h4>'.'2.'.$result["std2"].'</h4>';
     }
     if (empty($result["std3"] == false)) {
       echo '<h4>'.'3.'.$result["std3"].'</h4>';
     }
     if (empty($result["std4"] == false)) {
       echo '<h4>'.'4.'.$result["std4"].'</h4>';
     }
     if (empty($result["std5"] == false)) {
       echo '<h4>'.'5.'.$result["std5"].'</h4>';
     }
     if (empty($result["std6"] == false)) {
       echo '<h4>'.'6.'.$result["std6"].'</h4>';
     }
      ?>
     <hr>
     <?php
     if ($result["type_doc"] == "1") {
       echo '<h4 class="card-text"><i class="bi bi-person-check"></i> <strong>อาจารย์ที่ปรึกษา :</strong> '.$result["mainTn"].'</h4>';
       if($result["co_teacher"] != "0"){
        echo '<h4 class="card-text"><i class="bi bi-person-check"></i> <strong>อาจารย์ที่ปรึกษาร่วม :</strong> '.$result["coTn"].'</h4>';
       }else{}
       echo '<h4 class="card-text"><strong>ประเภท :</strong> ปริญญานิพนธ์นักศึกษา</h4>';
     }else {
       echo '<h4 class="card-text"><strong>ประเภท :</strong> วิจัยอาจารย์</h4>';
     }
      ?>

     <h4><i class="bi bi-calendar"></i> <strong>ปีการศึกษา : </strong><?php echo $result["sec"]; ?></h4>
     <div class="row">
       <div class="col-sm-12 col-sm-12 col-lg-4 mt-3">
        <?php
         if (empty($result["site_url"]) == false) {
           echo '<a href="'.$result["site_url"].'"class="btn btn-primary w-100" target="_blank">ชมผลงานเว็บไซต์</a>';
         } else { echo "<h5>ไม่มีเว็บไซต์</h5>";
         }
         ?>
       </div>
       </div>
       <hr>
       <h4><i class="bi bi-file-earmark-check"></i> <strong>เอกสาร</strong></h4>
       <?php if (empty($result["pdf"])) {echo '<h4>ไม่มีเอกสารให้แสดง</h4>';} ?>
       <div style="width: 100%; height: 100%" <?php if (empty($result["pdf"])) {echo "hidden";} ?> >
 <object class="rounded" style="height:100vh;" data="storage\<?php echo $id.'\\'.$result["pdf"]; ?>" type="application/pdf" width="100%">
 <p>อุปกรณ์ของคุณไม่รองรับการดูไฟล์ .pdf <a href="storage\<?php echo $id.'\\'.$result["pdf"]; ?>">คลิกที่นี้เพื่อดูหรือดาวน์โหลด!</a></p>
</object>
 </div>
       <div>
       <?php
       if (empty($result["video"]) == false) {
         echo "<hr>";
         echo '<h4><i class="bi bi-film"></i> วิดีโอ</h4>';
         echo '<video class="w-100 view_vid_si" src="storage\\'.$result["system_id"].'\\'.$result["video"].'"controls muted controlsList="nodownload"> </video>';
       }
       ?>
       <?php
       if (empty($result["yt_link"]) == false) {
         echo "<hr>";
         echo '<h4><i class="bi bi-film"></i> วิดีโอ Youtube</h4>';
         echo '<div class="video-container mt-2">';
         echo '<iframe src="'.$result["yt_link"].'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
         echo '</div>';
       }
       ?>
       </div>
       <div>
       <?php
       if (empty($result["audio"]) == false) {
         echo "<hr>";
         echo '<h4><i class="bi bi-file-music"></i> เสียง</h4>';
         echo '<audio class="w-100" src="storage\\'.$result["system_id"].'\\'.$result["audio"].'"controls controlsList="nodownload"> </audio>';

         }
        if (empty($result["add_by"] == false)) {
          echo "<hr>";
          echo '<h7>'.'เพิ่มข้อมูลโดย : '.$result["name"].' เมื่อ : '.$result["add_date"].'</h7>';
       }
       ?>
       </div>
     </div>
   </div>
 </div>
       </div>

<?php include'footer.php'; ?>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script type="text/javascript" src="bootstrap5\js\bootstrap.min.js"></script>
    <script type="text/javascript" src="custom\tooltips.js"></script>
  </body>
</html>
<!-- Developed By SiWDOL M. -->
