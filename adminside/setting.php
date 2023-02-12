<?php
session_start();
//echo $_SESSION["level"];

include 'commonf.php';

$json_data = readSettingJSON2MainPage();
extract($json_data);

getThisPage();

checkTimeout();
checkAdminUser();
//////////////////////////////////////////
include '../conn.php';
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
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../custom/DataTables/datatables.min.css" />

    <meta charset="utf-8">
    <title>ส่วนผู้ดูแลระบบ : <?php echo $v_websiteName?></title>
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
                <a class="list-group-item list-group-item-action list-group-item-dark p-4 active"
                    href="add_topic.php"><i class="bi bi-file-plus"></i> เพิ่มข้อมูลปริญญานิพนธ์<br>งานวิจัย</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-4 active"
                    data-bs-toggle="modal" data-bs-target="#add_teacher" href="#"><i class="bi bi-file-person"></i>
                    จัดการรายชื่ออาจารย์</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-4 active"
                    data-bs-toggle="modal" data-bs-target="#add_year" href="#"><i class="bi bi-calendar-event"></i>
                    จัดการปีการศึกษา</a>
                <a class="list-group-item list-group-item-action p-4  <?php onlySadmin();?>" data-bs-toggle="modal"
                    data-bs-target="#add_branch" href="#"><i class="bi bi-list-stars"></i>
                    จัดการรายชื่อสาขา</a>
                <a class="list-group-item list-group-item-action p-4  <?php onlySadmin();?>" data-bs-toggle="modal"
                    data-bs-target="#add_admin" href="#"><i class="bi bi-file-plus"></i>
                    จัดการบัญชีผู้ใช้งาน</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-4 pe-none"
                    href="setting.php"><i class="bi bi-gear"></i> ตั้งค่า</a>
                <a
                    class="list-group-item list-group-item-action list-group-item-secondary user-select-none p-1 mt-5 text-center active">VERSION
                    : <?php echo $c_version; ?></a>
                <a class="list-group-item list-group-item-action list-group-item-danger p-1 mt-5 text-center active"
                    href="logout.php">ออกจากระบบ</a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow-sm">
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
                <div class="row mt-2">
                    <div class="col-12">
                        <?php include 'nofbox.php';?>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" data-aos="fade-up" data-aos-duration="500">
                        <div class="card shadow-sm">
                            <h5 class="card-header">ตั้งค่า</h5>
                            <div class="card-body">
                                <h4>ตั้งค่าทั่วไป</h4>
                                <form name="settingWebsite" method="POST" action="savesetting.php">
                                    <div class="form-group mt-2">
                                        <label for="shortNameEng">ชื่อย่อภาษาอังกฤษ (ข้าง Logo)</label>
                                        <input type="text" class="form-control" name="shortNameEng"
                                            value="<?php echo $shortNameEng;?>" require>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="websiteName">ชื่อเว็บไซต์</label>
                                        <input type="text" class="form-control" name="websiteName"
                                            value="<?php echo $v_websiteName;?>" require>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="subName">คำอธิบายเพิ่มเติม</label>
                                        <input type="text" class="form-control" name="subName"
                                            value="<?php echo $v_subName;?>" require>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="email">อีเมลล์</label>
                                        <input type="email" class="form-control" name="email"
                                            value="<?php echo $v_email;?>" require>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="telNumber">เบอร์โทร</label>
                                        <input type="tel" class="form-control" name="telNumber"
                                            value="<?php echo $v_telNumber;?>" require>
                                    </div>

                                    <hr>
                                    <h5>ตั้งค่าอื่นๆ</h5>

                                    <div class="form-check">
                                        <?php
                                        if($v_change_setting == "1"){
                                            echo '<input class="form-check-input" type="checkbox" value="1" id="pubUpload" name="pubUpload" checked>';
                                        }else{
                                            echo '<input class="form-check-input" type="checkbox" value="1" id="pubUpload" name="pubUpload">';
                                        }
                                        ?>
                                        <label class="form-check-label" for="pubUpload">สามารถอัปโหลดข้อมูลได้
                                            โดยไม่ต้องเข้าสู่ระบบ</label>
                                    </div>

                                    <div class="form-group mt-3">
                                        <button type="submit" class="btn btn-success w-100"><i
                                                class="bi bi-check"></i></i> บันทึก</button>
                                    </div>
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

    function showMctMain() {
        document.getElementById("mctArchive_main").removeAttribute("hidden");
        document.getElementById("mctArchive_pre").setAttribute("hidden", "");
        document.getElementById("mctMAIN").classList.add("pe-none");
        document.getElementById("mctMAIN").classList.remove("active");
        document.getElementById("mctPRE").classList.remove("pe-none");
        document.getElementById("mctPRE").classList.add("active");
    }

    function showMctPre() {
        document.getElementById("mctArchive_pre").removeAttribute("hidden");
        document.getElementById("mctArchive_main").setAttribute("hidden", "");
        document.getElementById("mctPRE").classList.add("pe-none");
        document.getElementById("mctPRE").classList.remove("active");
        document.getElementById("mctMAIN").classList.remove("pe-none");
        document.getElementById("mctMAIN").classList.add("active");
    }
    </script>
</body>

</html>
<!-- Developed By SiWDOL M. -->