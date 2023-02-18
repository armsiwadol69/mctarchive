<?php
session_start();
include 'commonf.php';
include '../conn.php';
$json_data = readSettingJSON2MainPage();
extract($json_data);

$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
//echo $_SESSION["level"];
checkTimeout();
checkAdminUser();
//////////////////////////////////////////////
$id = strval($_GET["id"]) ;
if (empty($id) == 1) {
  header( "location: index.php" );
}

if (isset($_GET["preview"])) {
    $sql = "SELECT * , mT.teacherName AS mainTn , cT.teacherName AS coTn , mctarchive_pre.teacher AS mainTid, mctarchive_pre.co_teacher AS coTid  FROM mctarchive_pre
    LEFT JOIN teacher AS mT ON mctarchive_pre.teacher = mT.teacher_id
    LEFT JOIN teacher AS cT ON mctarchive_pre.co_teacher = cT.teacher_id
    LEFT JOIN branch ON mctarchive_pre.branch = branch.branch_id WHERE system_id = '$id'";
} else {
    $sql = "SELECT * , mT.teacherName AS mainTn , cT.teacherName AS coTn , mctarchive.teacher AS mainTid, mctarchive.co_teacher AS coTid  FROM mctarchive
    LEFT JOIN teacher AS mT ON mctarchive.teacher = mT.teacher_id
    LEFT JOIN teacher AS cT ON mctarchive.co_teacher = cT.teacher_id
    LEFT JOIN branch ON mctarchive.branch = branch.branch_id WHERE system_id = '$id'";
}

$query = mysqli_query($conn, $sql);
$result_display = mysqli_fetch_array($query, MYSQLI_ASSOC);
if (empty($result_display)) {
    //header("Location: index.php");
}

//echo $_SESSION["username"];
//echo $_SESSION["level"];



getThisPage();

$conn = mysqli_connect($serverName, $userName, $userPassword, $dbName);
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
    <link rel="stylesheet" href="..\custom\menuA2.css">
    <script type="text/javascript" src="..\custom\aos.js"></script>
    <link rel="stylesheet" href="..\bootstrap5\css\dselect.min.css">
    <script type="text/javascript" src="..\bootstrap5\js\dselect.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../custom/DataTables/datatables.min.css" />

    <meta charset="utf-8">
    <title>ADMIN : MCT Archive</title>
</head>

<body>
    <?php
//include 'searchbox.php';
include 'modal.php';
?>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-dark text-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-dark mt-3 text-center"><a class="navbar-brand" href="dashboard.php"><img
                        src="../favicon.png" class="d-inline-block align-top" width="25" height="25" alt=""> <?php echo $shortNameEng?></a></div>
            <div class="list-group list-group-flush mt-3">
                <a class="list-group-item list-group-item-action list-group-item-dark p-4 active"
                    href="dashboard.php"><i class="bi bi-table"></i> รายการแสดงผลทั้งหมด</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-4 active"
                    href="dashboard.php?viewPreview=1"> <i class="bi bi-table"></i> รายการรอการตรวจสอบ</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-4 pe-none"
                    href="add_topic.php"><i class="bi bi-file-plus"></i> เพิ่มข้อมูลปริญญานิพนธ์<br>งานวิจัย</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-4  active"
                    data-bs-toggle="modal" data-bs-target="#add_teacher" href="#"><i class="bi bi-file-person"></i>
                    จัดการรายชื่ออาจารย์ <span class="badge bg-info">Qiuck</span></a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-4 active"
                    data-bs-toggle="modal" data-bs-target="#add_year" href="#"><i class="bi bi-calendar-event"></i>
                    จัดการปีการศึกษา</a>
                <a class="list-group-item list-group-item-action p-4  <?php onlySadmin();?>" data-bs-toggle="modal"
                    data-bs-target="#add_branch" href="#"><i class="bi bi-list-stars"></i>
                    จัดการรายชื่อสาขา</a>
                <a class="list-group-item list-group-item-action p-4  <?php onlySadmin();?>"
                    href="userManage.php"><i class="bi bi-file-plus"></i>
                    จัดการบัญชีผู้ใช้งาน</a>
                <a class="list-group-item list-group-item-action p-4 <?php onlySadmin();?>
                    href="setting.php"><i class="bi bi-gear"></i> ตั้งค่า</a>
                    <a class="list-group-item list-group-item-action list-group-item-dark p-4 mt-2 active user-select-none"><?php echo 'ผู้ใช้ : '.$_SESSION["name"].'<br>'.'ระดับผู้ใช้งาน : '; echoUserLevel($_SESSION["level"])?></a>
                <a class="list-group-item list-group-item-action list-group-item-danger p-1 mt-3 text-center active"
                    href="logout.php">ออกจากระบบ</a>
                <a class="list-group-item list-group-item-action list-group-item-secondary user-select-none p-1 mt-3 text-center active">VERSION
                    : <?php echo $c_version; ?></a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <button class="btn btn-outline-primary" id="sidebarToggle">MENU</button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" target="_blank"
                                    href="../index.php">เปิดหน้าหลัก</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#" data-bs-toggle="modal"
                                    data-bs-target="#how2use_admin">วีธีการใช้งาน</a>
                            </li>
                            <li class="nav-item disabled">
                                <a class="nav-link disabled" aria-current="page" href="">Version :
                                    <?php echo $c_version ?></a>
                            </li>
                        </ul>
                        <form class="d-flex">
                            <a class="btn btn-danger" href="logout.php">ออกจากระบบ</a>
                        </form>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <div class=" container-fluid">
                <div class="row mt-1">
                    <div class="col-12">
                        <?php include 'nofbox.php';?>
                    </div>
                    <div class="col-12">
                        <div class="alert alert-info w-100 shadow-sm" role="alert">
                            ข้อแนะนำ : ตรวจสอบชื่อของอาจารย์ที่ปรึกษาก่อนว่ามีในระบบหรือไม่ จึงกรอกข้อมูล หากไม่พบ
                            ให้เพิ่มแล้วรีโหลดหน้าเว็บเพื่อเพิ่มข้อมูล <br>
                            สามารถค้นหาชื่ออาจารย์ได้ในช่อง "อาจารย์ที่ปรึกษา" เพื่อตรวจสอบได้
                            <hr>
                            <h6>ข้อแนะนำ 2 : หากมีไฟล์ผลงานหรือไฟล์ใดๆก็ตาม
                                ในการบันทึกข้อมูลแต่ละครั้งไฟล์ทั้งหมดที่จะอัปโหลดไปด้วย <span
                                    class="badge bg-warning text-dark">ห้ามเกิน 24 GB</span> ต่อครั้ง</h6>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card shadow-sm w-100">
                            <h4 class="card-header">แก้ไขข้อมูล ปริญญานิพนธ์ งานวิจัย</h4>
                            <div class="card-body">
                                <form method="post"
                                    action="<?php if (isset($_GET["preview"])) {echo "update_topic.php?preview=1";}else {echo "update_topic.php";}?>"
                                    enctype="multipart/form-data" onsubmit="return checkForm(this);">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-4 mt-1">
                                            <label for="text">System ID</label>
                                            <input type="text" class="form-control disabled" name="system_id"
                                                value="<?php echo $result_display["system_id"];?>" maxlength="10"
                                                required readonly>
                                        </div>
                                        <div class="col-lg-8 col-sm-8 mt-1">
                                            <label for="text">รหัสประจําเล่ม, รหัสปริญญานิพนธ์และงานวิจัย<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="id"
                                                placeholder="รหัสประจําเล่มข้างสัน" maxlength="69"
                                                value="<?php echo $result_display["id"];?>"
                                                oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);this.value=removeSpaces(this.value);"
                                                required>
                                        </div>
                                        <div class="col-12 mt-1">
                                            <label for="text">ชื่อภาษาไทย<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="thainame"
                                                placeholder="ชื่อภาษาไทย"
                                                value="<?php echo $result_display["thainame"];?>" required>
                                        </div>
                                        <div class="col-12 mt-1">
                                            <label for="text">ชื่อภาษาอังกฤษ<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="engname"
                                                placeholder="ชื่อภาษาอังกฤษ"
                                                value="<?php echo $result_display["engname"];?>" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
                                            <label for="text">ผู้วิจัย 1<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="std1" placeholder="(ต้องกรอก)"
                                                value="<?php echo $result_display["std1"];?>" required>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
                                            <label for="text">ผู้วิจัย 2</label>
                                            <input type="text" class="form-control" name="std2" placeholder=""
                                                value="<?php echo $result_display["std2"];?>">
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
                                            <label for="text">ผู้วิจัย 3</label>
                                            <input type="text" class="form-control" name="std3" placeholder=""
                                                value="<?php echo $result_display["std3"];?>">
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
                                            <label for="text">ผู้วิจัย 4</label>
                                            <input type="text" class="form-control" name="std4" placeholder=""
                                                value="<?php echo $result_display["std4"];?>">
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
                                            <label for="text">ผู้วิจัย 5</label>
                                            <input type="text" class="form-control" name="std5" placeholder=""
                                                value="<?php echo $result_display["std5"];?>">
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
                                            <label for="text">ผู้วิจัย 6</label>
                                            <input type="text" class="form-control" name="std6" placeholder=""
                                                value="<?php echo $result_display["std6"];?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-8 mt-1">
                                            <label for="text">อาจารย์ที่ปรึกษา<span class="text-danger">*</span></label>
                                            <select name="teacher" id="teacher_sb" class="form-select" required="true">
                                                <option value="<?php echo $result_display["mainTid"];?>" selected>
                                                    <?php echo $result_display["mainTn"];?></option>
                                                <?php
                                                $hideMainT = $result_display["mainTid"];
      $sql_allid = "SELECT * FROM teacher WHERE teacher_id != '$hideMainT' ORDER BY CONVERT(teacherName USING tis620) ASC";
      $result_allid = mysqli_query($conn, $sql_allid);
      while($row2 = mysqli_fetch_array($result_allid)) {
      echo '<option value="'.$row2["teacher_id"].'">'.$row2["teacherName"].'</option>';
      };
             ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-8 mt-1">
                                            <label for="text">อาจารย์ที่ปรึกษาร่วม</span></label>
                                            <select name="co_teacher" id="teacher_sb2" class="form-select">
                                                <option value="<?php echo $result_display["coTid"];?>" selected>
                                                    <?php echo $result_display["coTn"];?></option>
                                                    
                                                <?php
                                                if($result_display["coTid"] != '0'){
                                                    echo '<option value="0">ไม่มี</option>';
                                                }
                                                
                                                $hideCoT = $result_display["coTid"];
      $sql_allid = "SELECT * FROM teacher WHERE teacher_id != '$hideCoT' AND teacher_id != '0' ORDER BY CONVERT(teacherName USING tis620) ASC";
      $result_allid = mysqli_query($conn, $sql_allid);
      while($row2 = mysqli_fetch_array($result_allid)) {
      echo '<option value="'.$row2["teacher_id"].'">'.$row2["teacherName"].'</option>';
      };
             ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-8 mt-1">
                                            <label for="text">สาขา<span class="text-danger">*</span></label>
                                            <select name="branch" id="branch_sb" class=" form-select" required="true">
                                                <option value="<?php echo $result_display["branch_id"];?>" selected>
                                                    <?php echo $result_display["branchName"];?></option>
                                                <?php
                                                $hideBranch = $result_display["branch_id"];
    $sql_allbranch = "SELECT * FROM branch WHERE branch_id != '$hideBranch' ORDER BY branch_id DESC";
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
                                                <option value="<?php echo $result_display["sec"];?>" selected>
                                                    <?php echo $result_display["sec"];?></option>
                                                <?php
                                                $hideYaer = $result_display["sec"];
      $sql_allyear = "SELECT year FROM year WHERE year != '$hideYaer' ORDER BY year DESC";
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
                                                <?php if ($result_display["type_doc"] == "1") {
               echo '<option value="1" selected>ปริญญานิพนธ์นักศึกษา</option>
               <option value="0">งานวิจัยอาจารย์</option>';
             }else {
               echo '<option value="1">ปริญญานิพนธ์นักศึกษา</option>
               <option value="0" selected>งานวิจัยอาจารย์</option>';
             } ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
                                            <label class="text" for="customFile">เอกสารรูปเล่มฉบับเต็ม<span
                                                    class="text-danger">*</span></label>
                                            <input type="file" class="form-control" name="file_pdf" id="file_pdf"
                                                accept="application/pdf" />
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
                                            <label class="text" for="customFile">วีดีโอผลงาน  (ถ้ามี)</label>
                                            <div class="input-group">
                                                <input type="file" class="form-control" name="file_video"
                                                    id="file_video" accept=".mp4" />
                                                <?php delVideo($result_display["system_id"],$result_display["video"]);?>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
                                            <label class="text" for="customFile">ไฟล์เสียง (ถ้ามี)</label>
                                            <div class="input-group">
                                                <input type="file" class="form-control" name="audio" id="audio"
                                                    accept="audio/*" />
                                                <?php delAudio($result_display["system_id"],$result_display["audio"]);?>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
                                            <label class="text" for="customFile">ไฟล์ผลงานอื่นๆ (.Zip ถ้ามี)</label>
                                            <div class="input-group">
                                                <input type="file" class="form-control" name="file_zip" id="file_zip"
                                                    accept=".zip" />
                                                <?php delZipFile($result_display["system_id"],$result_display["fileZip"]);?>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
                                            <label for="text">Youtube Video  (ถ้ามี)</label>
                                            <input type="text" class="form-control" name="yt_link"
                                                placeholder="https://www.youtube.com/embed/VideoID"
                                                value="<?php echo $result_display["yt_link"];?>">
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 mt-1">
                                            <label for="text">Website URL (ถ้ามี)</label>
                                            <input type="text" class="form-control" name="site_url"
                                                placeholder="Website URL"
                                                value="<?php echo $result_display["site_url"];?>">
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
                                            <input type="text" class="form-control" name="grade" maxlength="1" data-bs-toggle="tooltip" data-bs-placement="top" title="หากได้ A จะถูกนำไปแสดงในหมวดรายการแนะนำ"
                                                placeholder="เช่น A หรือไม่ระบุก็ได้" value="<?php echo $result_display["grade"];?>" oninput="this.value = this.value.toUpperCase()">
                                        </div>
                                        <!-- <div class="col-lg-4 col-md-12 col-sm-12 mt-1"
                                            <?php //if ($_SESSION["level"] !== "ADMIN") {echo "hidden";} ?>>
                                            <label for="text">ข้ามการตรวจสอบ</label>
                                            <select name="skip_pass" class="form-control form-select">
                                                <option value="0">ไม่ข้าม</option>
                                                <option value="1" selected>ข้าม (แสดงผลทันที)</option>
                                            </select>
                                        </div> -->
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
                                                        ยืนยันแก้ไขข้อมูลปริญญานิพนธ์ งานวิจัย</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4>ยืนยันแก้ไขข้อมูลปริญญานิพนธ์ งานวิจัย</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-warning text-white"
                                                        id="btnSubmit" value="ยืนยัน และ บันทึกข้อมูล"
                                                        name="submit_button">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">ยกเลิก</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-block btn-warning w-100 mt-3"
                                        data-bs-toggle="modal" data-bs-target="#add_topic"><i
                                            class="bi bi-file-plus"></i> บันทึกการแก้ไขข้อมูล</button>
                                    <a type="button" class="btn btn-block btn-secondary w-100 mt-2"
                                        href="dashboard.php"><i class="bi bi-arrow-bar-left"></i> กลับหน้าหลัก</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
        integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="..\custom\menuA2.js"></script>
    <script type="text/javascript" src="..\bootstrap5\js\bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="..\custom\tooltips.js"></script>
    <script type="text/javascript" src="..\custom\delConf.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js"
        integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../custom/DataTables/datatables.min.js"></script>
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