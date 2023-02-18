<?php
include 'commonfPub.php';
$json_data = readSettingJSON2MainPage();
extract($json_data);

//echo $_SESSION["username"];
//echo $_SESSION["level"];
include 'conn.php';
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
////////////////////////////////////
$sql_setting = "SELECT * FROM setting WHERE var = 'free2uplaod'";
$query_setting = mysqli_query($conn,$sql_setting);
$result_setting = mysqli_fetch_array($query_setting,MYSQLI_ASSOC);
if ($result_setting['setting'] == "0") {
  header('location: index.php');
}
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
   <link rel="stylesheet" href="bootstrap5\css\dselect.min.css">
   <script type="text/javascript" src="bootstrap5\js\dselect.min.js"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
   
   <meta charset="utf-8">
   <title><?php echo $v_websiteName.' '.$v_subName?></title>
    <meta property="og:title" content="<?php echo $v_websiteName.' '.$v_subName?>" />
    <meta property="og:description" content="<?php echo $v_websiteName.' '.$v_subName?>"/>
 </head>
   <body>
    <?php include 'navbar.php';
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
     <?php include 'searchbox.php'; ?>


     <div class="row">
     <div class="col-12">
       <div class="card my-2 shadow-sm w-100">
         <h6 class="card-header">เพิ่มข้อมูลปริญญานิพนธ์นักศึกษา/วิจัยอาจารย์</h6>
     <div class="card-body">
       <h4 class="text-danger">ข้อมูลที่ท่านเพิ่มมานั้น จะถูกนำไปให้ผู้ดูแลระบบตรวจสอบก่อน จึงจะแสดงผล</h4>
       <form method="post" action="pub_upload_topic.php" enctype="multipart/form-data"
                                    onsubmit="return checkForm(this);">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-4 mt-1">
                                            <label for="text">System ID</label>
                                            <input type="text" class="form-control disabled" name="system_id"
                                                value="<?php echo time();?>" maxlength="10" required readonly>
                                        </div>
                                        <div class="col-lg-8 col-sm-8 mt-1">
                                            <label for="text">รหัสประจําเล่ม, รหัสปริญญานิพนธ์และงานวิจัย<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="id"
                                                placeholder="รหัสประจําเล่มข้างสัน" maxlength="69"
                                                oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);this.value=removeSpaces(this.value);"
                                                required>
                                        </div>
                                        <div class="col-12 mt-1">
                                            <label for="text">ชื่อภาษาไทย<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="thainame"
                                                placeholder="ชื่อภาษาไทย" required>
                                        </div>
                                        <div class="col-12 mt-1">
                                            <label for="text">ชื่อภาษาอังกฤษ<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="engname"
                                                placeholder="ชื่อภาษาอังกฤษ" required>
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
      $sql_allyear = "SELECT year FROM year ORDER BY year DESC";
      $sql_allyearshow = mysqli_query($conn, $sql_allyear);
      while($row3 = mysqli_fetch_array($sql_allyearshow)) {
      echo '<option>'.$row3["year"].'</option>';
      };
             ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
                                            <label for="text">ประเภท<span class="text-danger">*</span></label>
                                            <select name="type_doc" class="form-control form-select">
                                                <option value="1" selected>ปริญญานิพนธ์นักศึกษา</option>
                                                <option value="2">วิจัยอาจารย์</option>
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
                                        <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
                                            <label class="text" for="customFile">ไฟล์เสียง</label>
                                            <input type="file" class="form-control" name="audio" id="audio"
                                                accept="audio/*" />
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
                                            <label class="text" for="customFile">ไฟล์ผลงานอื่นๆ (.Zip)</label>
                                            <input type="file" class="form-control" name="file_zip" id="file_zip"
                                                accept=".zip" />
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
                                            <label for="text">Youtube Video</span></label>
                                            <input type="text" class="form-control" name="yt_link"
                                                placeholder="https://www.youtube.com/embed/VideoID">
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
                                            <label for="text">Website URL</span></label>
                                            <input type="text" class="form-control" name="site_url"
                                                placeholder="Website URL">
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 mt-1" hidden>
                                            <label for="text">ผลงานเป็นเว็บไซต์</label>
                                            <select name="website" class="form-control form-select mt-2">
                                                <option value="0" selected>ไม่ใช่</option>
                                                <option value="1">ใช่</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 mt-1">
                                            <label for="text">เกรด (แนะนำ)</label>
                                            <input type="text" class="form-control" name="grade" maxlength="1"
                                                placeholder="เช่น A หรือไม่ระบุก็ได้" oninput="this.value = this.value.toUpperCase()">
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 mt-1" hidden>
                                            <label for="text">ข้ามการตรวจสอบ</label>
                                            <select name="skip_pass" class="form-control form-select" readonly>
                                                <option value="0" selected>ไม่ข้าม</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    </div>
                                    <div class="modal fade" id="add_topic" tabindex="-1" role="dialog"
                                        aria-labelledby="changlog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="add_topic"><i
                                                            class="bi bi-file-plus"></i>
                                                        เพิ่มปริญญานิพนธ์/งานวิจัย</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4>ยืนยันการเพิ่มปริญญานิพนธ์/งานวิจัย</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-primary text-white"
                                                        id="btnSubmit" value="ยืนยัน และ บันทึกข้อมูล"
                                                        name="submit_button">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">ยกเลิก</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-block btn-primary w-100 mt-3"
                                        data-bs-toggle="modal" data-bs-target="#add_topic"><i
                                            class="bi bi-file-plus"></i> เพิ่มข้อมูล</button>
                                    <a type="button" class="btn btn-block btn-secondary w-100 mt-2"
                                        href="index.php"><i class="bi bi-arrow-bar-left"></i> กลับหน้าหลัก</a>
                                </form>



     </div>
     </div>
   </div>
     </div>
     <footer>
       <div class="card mb-2">
         <div class="card-body text-center text-info">
           <h6>Developed by Siwadol Malisorn</h6>
           <h6>Ilust. by Nichapat Promson | Poonyanuch Tantidechamongkol</h6>
           <h6>From DM6201/MCT</h6>
           <h6>Version : <?php echo $c_version ?></h6>
         </div>
       </div>
     </footer>


     </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
        integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="..\custom\menuA2.js"></script>
     <script type="text/javascript" src="bootstrap5\js\bootstrap.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
     <script type="text/javascript" src="custom\tooltips.js"></script>
     <script type="text/javascript" src="custom\tooltips.js"></script>
    <script type="text/javascript" src="custom\delConf.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js"
        integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="custom/DataTables/datatables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#table_1').DataTable({
            "ordering": false
        });
        $('#table_2').DataTable({
            "ordering": false
        });
    });


    $(document).ready(function() {

        window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
                $(this).remove();
            });
        }, 4200);

    });


    function removeSpaces(string) {
        return string.split(' ').join('');
    }
    </script>
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
