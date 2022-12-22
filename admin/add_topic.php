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

//echo $_SESSION["username"];
//echo $_SESSION["level"];
include '../conn.php';
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
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
    <link rel="stylesheet" href="..\bootstrap5\css\dselect.min.css">
    <script type="text/javascript" src="..\bootstrap5\js\dselect.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <meta charset="utf-8">
    <title>ADMIN : MCT Library</title>
</head>

<body>
    <?php include 'navbar_admin.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="jumbotron jumbotron_admin mainjum mainvector j-addtopic mt-4">
                    <h2 class="display-5">ส่วนผู้ดูแล : ระบบสืบค้นปริญญานิพนธ์และงานวิจัย</h2>
                    <hr class="my-4" style="max-width:70%">
                    <p class="lead">คณะเทคโนโลยีสื่อสารมวลชน มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี</p>
                    <h5>ยินดีตอนรับคุณ <?php echo $_SESSION["username"]; ?> เข้าสู่ระบบเมื่อ
                        <?php echo $_SESSION["time"]; ?></h5>

                </div>
            </div>
            <div class="col-12">
                <div class="alert alert-info w-100 shadow-sm" role="alert">
                   ข้อแนะนำ : ตรวจสอบชื่อของอาจารย์ที่ปรึกษาก่อนว่ามีในระบบหรือไม่ จึงกรอกข้อมูล หากไม่พบ ให้เพิ่มแล้วรีโหลดหน้าเว็บเพื่อเพิ่มข้อมูล <br>
                   สามารถค้นหาชื่ออาจารย์ได้ในช่อง "อาจารย์ที่ปรึกษา" เพื่อตรวจสอบได้
                </div>
            </div>
        </div>

        <?php include 'modal.php'; ?>

        <div class="row">
            <div class="col-12">
                <div class="card my-2 shadow-sm w-100">
                    <h4 class="card-header">เพิ่มข้อมูล ปริญญานิพนธ์/งานวิจัย</h4>
                    <div class="card-body">

                        <form method="post" action="upload_topic.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-4 col-sm-4 mt-1">
                                    <label for="text">System ID</label>
                                    <input type="text" class="form-control" name="system_id"
                                        value="<?php echo time();?>" maxlength="10" required readonly>
                                </div>
                                <div class="col-lg-8 col-sm-8 mt-1">
                                    <label for="text">รหัสประจําเล่ม, รหัสริญญานิพนธ์และงานวิจัย<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="id"
                                        placeholder="รหัสประจําเล่มข้างสัน" maxlength="69" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" required>
                                </div>
                                <div class="col-12 mt-1">
                                    <label for="text">ชื่อภาษาไทย<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="thainame" placeholder="ชื่อภาษาไทย"
                                        required>
                                </div>
                                <div class="col-12 mt-1">
                                    <label for="text">ชื่อภาษาอังกฤษ<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="engname" placeholder="ชื่อภาษาอังกฤษ"
                                        required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
                                    <label for="text">ผู้วิจัย 1<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="std1" placeholder="(ต้องกรอก)"
                                        required>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
                                    <label for="text">ผู้วิจัย 2</label>
                                    <input type="text" class="form-control" name="std2" placeholder="">
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
                                    <label for="text">ผู้วิจัย 3</label>
                                    <input type="text" class="form-control" name="std3" placeholder="">
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
                                    <label for="text">ผู้วิจัย 4</label>
                                    <input type="text" class="form-control" name="std4" placeholder="">
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
                                    <label for="text">ผู้วิจัย 5</label>
                                    <input type="text" class="form-control" name="std5" placeholder="">
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
                                    <label for="text">ผู้วิจัย 6</label>
                                    <input type="text" class="form-control" name="std6" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-8 mt-1">
                                    <label for="text">อาจารย์ที่ปรึกษา<span class="text-danger">*</span></label>
                                    <select name="teacher" id="teacher_sb" class="form-select" required="true">
                                        <option value="0">เลือก...</option>
                                        <?php
      $sql_allid = "SELECT * FROM teacher WHERE teacher_id != 0 ORDER BY teacher_id ASC";
      $result_allid = mysqli_query($conn, $sql_allid);
      while($row2 = mysqli_fetch_array($result_allid)) {
      echo '<option value="'.$row2["teacher_id"].'">'.$row2["teacherName"].'      (ID: '.$row2["teacher_id"].')'.'</option>';
      };
             ?>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-8 mt-1">
                                    <label for="text">อาจารย์ที่ปรึกษาร่วม</span></label>
                                    <select name="co_teacher" id="teacher_sb2" class="form-select">
                                        <option value="0">ไม่มี</option>
                                        <?php
      $sql_allid = "SELECT * FROM teacher WHERE teacher_id != 0 ORDER BY teacher_id ASC";
      $result_allid = mysqli_query($conn, $sql_allid);
      while($row2 = mysqli_fetch_array($result_allid)) {
      echo '<option value="'.$row2["teacher_id"].'">'.$row2["teacherName"].'      ('.$row2["teacher_id"].')'.'</option>';
      };
             ?>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-8 mt-1">
                                    <label for="text">สาขา<span class="text-danger">*</span></label>
                                    <select name="branch" id="branch_sb" class=" form-select" required="true">
                                        <option value="">เลือก...</option>
                                        <?php
    $sql_allbranch = "SELECT * FROM branch ORDER BY branch_id ASC";
    $result_allbranch = mysqli_query($conn, $sql_allbranch);
    while($row5_branch = mysqli_fetch_array($result_allbranch)) {
    echo '<option value="'.$row5_branch["branch_id"].'">'.$row5_branch["branchName"].'</option>';
  };
     ?>
                                    </select>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 mt-1">
                                    <label for="text">ปีการศึกษา<span class="text-danger">*</span></label>
                                    <select name="year" class="form-control form-select" required="true">
                                        <option value="">เลือก...</option>
                                        <?php
      $sql_allyear = "SELECT year FROM year ORDER BY year ";
      $sql_allyearshow = mysqli_query($conn, $sql_allyear);
      while($row3 = mysqli_fetch_array($sql_allyearshow)) {
      echo '<option>'.$row3["year"].'</option>';
      };
             ?>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
                                    <label class="text" for="customFile">เอกสาร .pdf<span
                                            class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="file_pdf" id="file_pdf"
                                        accept="application/pdf" required="true" />
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
                                    <label class="text" for="customFile">วีดีโอผลงาน</label>
                                    <input type="file" class="form-control" name="file_video" id="file_video"
                                        accept=".mp4" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mt-1">
                                    <label for="text">Youtube Video</span></label>
                                    <input type="text" class="form-control" name="yt_link"
                                        placeholder="https://www.youtube.com/embed/VideoID">
                                </div>
                                <div class="col-12 mt-1">
                                    <label for="text">Website URL</span></label>
                                    <input type="text" class="form-control" name="site_url" placeholder="Website URL">
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
                                    <label class="form-label" for="customFile">ไฟล์เสียง</label>
                                    <input type="file" class="form-control" name="audio" id="audio" accept="audio/*" />
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 mt-1" hidden>
                                    <label for="text">ผลงานเป็นเว็บไซต์</label>
                                    <select name="website" class="form-control form-select mt-2">
                                        <option value="0" selected>ไม่ใช่</option>
                                        <option value="1">ใช่</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
                                    <label for="text">ประเภท<span class="text-danger">*</span></label>
                                    <select name="type_doc" class="form-control form-select mt-2">
                                        <option value="1" selected>ปริญญานิพนธ์นักศึกษา</option>
                                        <option value="2">วิจัยอาจารย์</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 mt-1"
                                    <?php if ($_SESSION["level"] !== "ADMIN") {echo "hidden";} ?>>
                                    <label for="text">ข้ามการตรวจสอบ</label>
                                    <select name="skip_pass" class="form-control form-select mt-2">
                                        <option value="0">ไม่ข้าม</option>
                                        <option value="1" selected>ข้าม (แสดงผลทันที)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                            </div>
                            <div class="modal fade" id="add_topic" tabindex="-1" role="dialog"
                                aria-labelledby="changlog" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="add_topic"><i class="bi bi-file-plus"></i>
                                                เพิ่มปริญญานิพนธ์/งานวิจัย</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h4>ยืนยันการเพิ่มปริญญานิพนธ์/งานวิจัย</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">ยกเลิก</button>
                                            <button type="submit" class="btn btn-primary">ยืนยัน</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-block btn-primary w-100 mt-3" data-bs-toggle="modal"
                                data-bs-target="#add_topic"><i class="bi bi-file-plus"></i> เพิ่มข้อมูล</button>
                            <a type="button" class="btn btn-block btn-secondary w-100 mt-2" href="dashboard.php"><i
                                    class="bi bi-arrow-bar-left"></i> กลับหน้าหลัก</a>
                        </form>



                    </div>
                </div>
            </div>
        </div>
        <?php include('../footer.php') ?>


    </div>
    </div>
    <script type="text/javascript" src="..\bootstrap5\js\bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
        integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="..\custom\delConf.js"></script>
    <script type="text/javascript" src="..\custom\tooltips.js"></script>
    <script>
    const config = {
        search: true, // Toggle search feature. Default: false
    }
    dselect(document.querySelector('#teacher_sb'), config)
    dselect(document.querySelector('#teacher_sb2'), config)
    dselect(document.querySelector('#branch_sb'), config)
    </script>
</body>

</html>
<!-- Developed By SiWDOL M. -->