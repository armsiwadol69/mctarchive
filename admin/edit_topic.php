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
$id = strval($_GET["id"]) ;
if (empty($id) == 1) {
  header( "location: index.php" );
}
/////////////////////////////////////////////
include '../conn.php';
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

if (isset($_GET["preview"])) {
  $sql = "SELECT * FROM mctarchive_pre WHERE system_id = '$id'";
}else {
  $sql = "SELECT * FROM mctarchive WHERE system_id = '$id'";
}




$query = mysqli_query($conn,$sql);
$result_display = mysqli_fetch_array($query,MYSQLI_ASSOC);
if (empty($result_display)) {
  header("Location: index.php");
}
//echo $_SESSION["username"];
//echo $_SESSION["level"];
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
         <div class="jumbotron jumbotron_admin mainjum mainvector j-edittopic mt-4">
   <h2 class="display-5">ส่วนผู้ดูแล : ระบบสืบค้นปริญญานิพนธ์และงานวิจัย</h2>
   <hr class="my-4" style="max-width:70%" >
   <p class="lead">คณะเทคโนโลยีสื่อสารมวลชน มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี</p>
   <h5>ยินดีตอนรับคุณ <?php echo $_SESSION["name"]; ?> เข้าสู่ระบบเมื่อ <?php echo $_SESSION["time"]; ?></h5>

 </div>
       </div>
      </div>

<?php include 'modal.php'; ?>

     <div class="row mt-2">
     <div class="col-12">
       <div class="card shadow-sm w-100">
         <h3 class="card-header">แก้ไขข้อมูลปริญญานิพนธ์/งานวิจัย</h3>
     <div class="card-body">

       <form method="post" action="<?php if (isset($_GET["preview"])) {
         echo "update_topic.php?preview=1";}else {
           echo "update_topic.php";
         }
       ?> " enctype="multipart/form-data">
         <div class="row">
           <div class="col-12 mt-1">
             <label for="text">ชื่อภาษาไทย</label>
             <input type="text" class="form-control" name="thainame" value="<?php echo $result_display["thainame"]; ?>" required>
           </div>
           <div class="col-12 mt-1">
             <label for="text">ชื่อภาษาอังกฤษ</label>
             <input type="text" class="form-control" name="engname" value="<?php echo $result_display["engname"]; ?>" required>
           </div>
         </div>
         <div class="row">
           <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
             <label for="text">ผู้วิจัย 1</label>
             <input type="text" class="form-control" name="std1" value="<?php echo $result_display["std1"]; ?>" placeholder="" required>
           </div>
           <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
             <label for="text">ผู้วิจัย 2</label>
             <input type="text" class="form-control" name="std2" value="<?php echo $result_display["std2"]; ?>">
           </div>
           <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
             <label for="text">ผู้วิจัย 3</label>
             <input type="text" class="form-control" name="std3" value="<?php echo $result_display["std3"]; ?>">
           </div>
             <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
               <label for="text">ผู้วิจัย 4</label>
               <input type="text" class="form-control" name="std4" value="<?php echo $result_display["std4"]; ?>">
             </div>
             <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
               <label for="text">ผู้วิจัย 5</label>
               <input type="text" class="form-control" name="std5" value="<?php echo $result_display["std5"]; ?>">
             </div>
             <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
               <label for="text">ผู้วิจัย 6</label>
               <input type="text" class="form-control" name="std6" value="<?php echo $result_display["std6"]; ?>">
             </div>
         </div>
         <div class="row">
           <div class="col-12 mt-1">
             <label for="text">Youtube URL</span></label>
             <input type="text" class="form-control" name="yt_link" value="<?php echo $result_display["yt_link"]; ?>" placeholder="https://www.youtube.com/embed/ Video ID">
           </div>
           <div class="col-12 mt-1">
             <label for="text">Website URL</span></label>
             <input type="text" class="form-control" name="site_url" value="<?php echo $result_display["site_url"]; ?>" placeholder="Website URL">
           </div>
           <div class="col-lg-4 col-md-4 col-sm-8 mt-1">
           <label for="text">อาจารย์ที่ปรึกษา</label>
           <select name="teacher" class="form-control form-select" required="true">
      <option value="<?php echo $result_display["teacher"]; ?>" selected><?php echo $result_display["teacher"]; ?></option>
      <?php
      $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
      $sql_allid = "SELECT * FROM teacher ORDER BY name ASC";
      $result_allid = mysqli_query($conn, $sql_allid);
      while($row2 = mysqli_fetch_array($result_allid)) {
      echo '<option value="'.$row2["name"].'">'.$row2["name"].'      ('.$row2["branch"].')'.'</option>';
      };
             ?>
    </select>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-8 mt-1">
         <label for="text">สาขา</label>
         <select name="branch" class="form-control form-select" required="true">
    <option selected><?php echo $result_display["branch"];?></option>
    <?php
    $sql_allbranch = "SELECT * FROM branch ORDER BY no ASC";
    $result_allbranch = mysqli_query($conn, $sql_allbranch);
    while($row5_branch = mysqli_fetch_array($result_allbranch)) {
    echo '<option>'.$row5_branch["branch"].'</option>';
    };
           ?>
   </select>
       </div>
         <div class="col-lg-4 col-md-4 col-sm-4 mt-1">
           <label for="text">ปีการศึกษา</label>
           <select name="year" class="form-control form-select" required="true" required>
             <option selected><?php echo $result_display["sec"]; ?></option>
             <?php
             $sql_allyear = "SELECT year FROM year ORDER BY year ";
             $sql_allyearshow = mysqli_query($conn, $sql_allyear);
             while($row3 = mysqli_fetch_array($sql_allyearshow)) {
             echo '<option>'.$row3["year"].'</option>';
             };
                    ?>
          </select>
         </div>
         </div>
         <div class="row">
           <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
             <label class="form-label" for="customFile">เอกสาร .pdf</label>
             <input type="file" class="form-control" name="file_pdf" id="file_pdf" accept="application/pdf"/>
           </div>
           <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
             <label class="form-label" for="customFile">วีดีโอผลงาน </label>
             <input type="file" class="form-control" name="file_video" id="file_video" accept=".mp4" />
           </div>
           <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
             <label class="form-label" for="customFile">ไฟล์เสียง</label>
             <input type="file" class="form-control" name="audio" id="audio" accept="audio/*" />
           </div>
           <div class="col-lg-4 col-md-12 col-sm-12 mt-1" hidden>
             <label for="text">ผลงานเป็นเว็บไซต์</label>
             <select name="website" class="form-control form-select mt-2">
               <?php if ($result_display["website"] == "1") {
                 echo '<option value="1" selected>ใช่</option>
                 <option value="0">ไม่ใช่</option>';
               }else {
                 echo '<option value="1">ใช่</option>
                 <option value="0" selected>ไม่ใช่</option>';
               } ?>
            </select>
           </div>
           <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
             <label for="text">ประเภท</label>
             <select name="type_doc" class="form-control form-select mt-2">
             <?php if ($result_display["type_doc"] == "1") {
               echo '<option value="1" selected>นักศึกษา</option>
               <option value="0">อาจารย์</option>';
             }else {
               echo '<option value="1">นักศึกษา</option>
               <option value="0" selected>อาจารย์</option>';
             } ?>

            </select>
           </div>
           <div class="col-lg-4 col-md-4 col-sm-4 mt-1">
             <label for="text" class="mt-2">ID</label>
             <input type="text" class="form-control-plaintext" name="id" value="<?php echo $result_display["id"]; ?>" readonly>
           </div>
         </div>
         <div class="form-group">
         </div>
         <div class="modal fade" id="add_topic" tabindex="-1" role="dialog" aria-labelledby="changlog" aria-hidden="true" >
         <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="add_topic"><i class="bi bi-file-plus"></i> แก้ไขปริญญานิพนธ์</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
               <h4>ยืนยันการแก้ไขปริญญานิพนธ์/งานวิจัย</h4>
             </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
               <button type="submit" class="btn btn-warning">ยืนยัน</button>
             </div>
           </div>
         </div>
         </div>
         <button type="button" class="btn btn-block btn-warning w-100 mt-3" data-bs-toggle="modal" data-bs-target="#add_topic"><i class="bi bi-file-plus"></i> แก้ไขข้อมูล</button>
         <a type="button" class="btn btn-block btn-secondary w-100 mt-2" href="dashboard.php"><i class="bi bi-arrow-bar-left"></i> กลับหน้าหลัก</a>
       </form>



     </div>
     </div>
   </div>
     </div>
     <?php include'../footer.php'; ?>


     </div>
    </div>
     <script type="text/javascript" src="..\bootstrap5\js\bootstrap.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
     <script type="text/javascript" src="..\custom\delConf.js"></script>
     <script type="text/javascript" src="..\custom\tooltips.js"></script>
   </body>
 </html>
<!-- Developed By SiWDOL M. -->
