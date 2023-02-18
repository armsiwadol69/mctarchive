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
//echo $_SESSION["username"];
//echo $_SESSION["level"];
$sql_allyear = "SELECT * FROM year ORDER BY year ";
$sql_allyearshow = mysqli_query($conn, $sql_allyear);
$sql_teacher = "SELECT * FROM teacher ORDER BY teacher_id ASC";
$result_teacher = mysqli_query($conn, $sql_teacher);

if (isset($_GET["page"])) {
    $page_default = intval($_GET["page"]);
} else {
    $page_default = 1;
}

$result = $conn->query("SELECT id FROM mctarchive ORDER BY id");
$row_cnt = $result->num_rows;
$no_of_records_per_page = 20;
$offset = ($page_default - 1) * $no_of_records_per_page;
$total_pages = ceil($row_cnt / $no_of_records_per_page);

//////////////////////////////////////////////////////////////////////////

if (isset($_GET["page_pre"])) {
    $page_pre_default = intval($_GET["page_pre"]);
} else {
    $page_pre_default = 1;
}

$result_page_pre = $conn->query("SELECT id FROM mctarchive_pre ORDER BY id");
$row_cnt_page_pre = $result_page_pre->num_rows;
$no_of_records_per_page_pre = 20;
$offse_pre = ($page_pre_default - 1) * $no_of_records_per_page_pre;
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
                <button id="mctMAIN"
                    class="list-group-item list-group-item-action list-group-item-dark p-4 pe-none text-left"
                    onclick="showMctMain();"><i class="bi bi-table"></i> รายการแสดงผลทั้งหมด</button>
                <button id="mctPRE"
                    class="list-group-item list-group-item-action list-group-item-dark p-4  active"
                    onclick="showMctPre();"> <i class="bi bi-table"></i> รายการรอการตรวจสอบ</button>
                <a class="list-group-item list-group-item-action list-group-item-dark p-4  active"
                    href="add_topic.php"><i class="bi bi-file-plus"></i> เพิ่มข้อมูลปริญญานิพนธ์<br>งานวิจัย</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-4  active"
                    href="teacher.php"><i class="bi bi-file-person"></i>
                    จัดการรายชื่ออาจารย์</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-4  active"
                    data-bs-toggle="modal" data-bs-target="#add_year" href="#"><i class="bi bi-calendar-event"></i>
                    จัดการปีการศึกษา</a>
                <a class="list-group-item list-group-item-action p-4  <?php onlySadmin();?>"
                    data-bs-toggle="modal" data-bs-target="#add_branch" href="#"><i class="bi bi-list-stars"></i>
                    จัดการรายชื่อสาขา</a>
                <a class="list-group-item list-group-item-action p-4  <?php onlySadmin();?>"
                    href="userManage.php"><i class="bi bi-file-plus"></i>
                    จัดการบัญชีผู้ใช้งาน</a>
                <a class="list-group-item list-group-item-action p-4 <?php onlySadmin();?>"
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
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow-sm">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- <button class="btn btn-outline-primary" id="sidebarToggle">MENU</button> -->
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
                        <div class="d-flex">
                            <button class="btn btn-outline-primary d-block d-xl-block d-xxl-block d-xxl-none me-2" id="sidebarToggle">MENU</button>
                            <a class="btn btn-danger" href="logout.php">ออกจากระบบ</a> 
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <div class=" container-fluid">
                <div class="row mt-1">
                    <div class="col-12">
                        <?php include 'nofbox.php';?>
                    </div>
                    <div class="col-12" id="mctArchive_main" data-aos="fade-up" data-aos-duration="500">
                        <div class="card shadow-sm" id="displayed" name="displayed">
                            <h5 class="card-header">รายการทั้งหมดที่ถูกแสดงผล</h5>
                            <div class="card-body">
                                <div class="table-responsive px-1 py-1">
                                    <table
                                        class="table text-dark table-hover table-striped my-auto w-100 text-center align-middle dt-head-center"
                                        id="table_1">
                                        <thead>
                                            <tr>
                                                <td>รหัสประจําเล่ม</td>
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
                                        </thead>
                                        <?php
if ($_SESSION["level"] !== "ADMIN") {$permission = " disabled";} else {
    $permission = "";
};
//$sql_all = "SELECT * FROM mctarchive LEFT JOIN branch ON mctarchive.branch = branch.branch_id ORDER BY add_date DESC LIMIT $offset, $no_of_records_per_page";
$sql_all = "SELECT * FROM mctarchive LEFT JOIN branch ON mctarchive.branch = branch.branch_id ORDER BY add_date DESC";
$query = mysqli_query($conn, $sql_all);
$result_all = mysqli_query($conn, $sql_all);
while ($all = mysqli_fetch_array($result_all)) {
    echo "<tr>" . "<td>" . $all["id"] . "</td> ";
    echo "<td>" . $all["thainame"] . "</td> ";
    //echo "<td>" .$all["teacher"] .   "</td> ";
    if ($all["type_doc"] == "1") {
        echo "<td>ปริญญานิพนธ์นักศึกษา</td>";
    } else {
        echo "<td>วิจัยอาจารย์</td>";}
    echo "<td>" . $all["branchName"] . "</td> ";
    echo "<td>" . $all["sec"] . "</td> ";
    echo "<td>" . '<a type="button" class="btn btn-info" target="_blank" href="../view.php?id=' . $all["system_id"] . '"><i class="bi bi-eye"></i></a>' . "</td> ";
    echo "<td>" . '<a type="button" class="btn btn-success' . $permission . '" onclick="changeStatus2C(' . "'" . $all["system_id"] . "','".$all["thainame"]."'". ')"><i class="bi bi-arrow-left-right"></i></a>' . "</td> ";
    echo "<td>" . '<a type="button" class="btn btn-warning' . $permission . '" href="edit_topic.php?id=' . $all["system_id"] . '"><i class="bi bi-pencil-square"></i></a>' . "</td> ";
    echo "<td>" . '<button type="button" class="btn btn-danger' . $permission . '" onclick="delDataOfTopic(' ."'". $all["system_id"] ."','".$all["id"]."','".$all["thainame"]."'".')"><i class="bi bi-trash"></i></button>' . "</td> " . "</tr>";
}
;
?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-4" id="mctArchive_pre">
                        <div class="card shadow-sm" id="preview" name="preview">
                            <h5 class="card-header">รายการรอตรวจสอบและยังไม่ถูกไปนำไปแสดงผล</h5>
                            <div class="card-body">
                                <div class="table-responsive px-1 py-1">
                                    <table
                                        class="table text-dark table-hover table-striped my-auto w-100 text-center align-middle dt-head-center"
                                        id="table_2">
                                        <thead>
                                            <tr>
                                                <td>ID</td>
                                                <td class="w-50">หัวข้อ</td>
                                                <!-- <td>อาจารย์ที่ปรึกษา</td> -->
                                                <td>ประเภท</td>
                                                <td>สาขา</td>
                                                <td>ปีการศึกษา</td>
                                                <td hidden>เพิ่มโดย</td> 
                                                <td>ดู</td>
                                                <td>แสดงผล</td>
                                                <td>แก้ไข</td>
                                                <td>ลบ</td>
                                            </tr>
                                        </thead>
                                        <?php
if ($_SESSION["level"] !== "ADMIN") {$permission = " disabled";} else {
    $permission = "";
}
;
$sql_all_wait = "SELECT * FROM mctarchive_pre LEFT JOIN branch ON mctarchive_pre.branch = branch.branch_id LEFT JOIN login ON mctarchive_pre.add_by = login.user_id ORDER BY add_date DESC";
$query = mysqli_query($conn, $sql_all_wait);
$result_all_wait = mysqli_query($conn, $sql_all_wait);
while ($all = mysqli_fetch_array($result_all_wait)) {
    echo "<tr>" . "<td>" . $all["id"] . "</td> ";
    echo '<td>' . $all["thainame"] . "</td> ";
    //echo "<td>" .$all["teacher"] .   "</td> ";
    if ($all["type_doc"] == "1") {
        echo "<td>ปริญญานิพนธ์นักศึกษา</td>";
    } else {
        echo "<td>วิจัยอาจารย์</td>";}
    echo "<td>" . $all["branchName"] . "</td> ";
    echo "<td>" . $all["sec"] . "</td> ";
    echo "<td hidden>" . $all["name"] . "</td> ";
    echo "<td>" . '<a type="button" class="btn btn-info" target="_blank" href="../view.php?preview=1&id=' . $all["system_id"] . '"><i class="bi bi-eye"></i></a>' . "</td> ";
    echo "<td>" . '<a type="button" class="btn btn-success' . $permission . '" onclick="changeStatus2D(' . "'" . $all["system_id"] ."','".$all["thainame"]."'" . ')"><i class="bi bi-arrow-left-right"></i></a>' . "</td> ";
    echo "<td>" . '<a type="button" class="btn btn-warning' . '" href="edit_topic.php?preview=1&id=' . $all["system_id"] . '"><i class="bi bi-pencil-square"></i></a>' . "</td> ";
    echo "<td>" . '<button type="button" class="btn btn-danger' . $permission . '" onclick="delDataPreOfTopic(' ."'". $all["system_id"] ."','".$all["id"]."','".$all["thainame"]."'".')"><i class="bi bi-trash"></i></button>' . "</td> " . "</tr>";
}
;
?>
                                    </table>
                                </div>
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
    <script type="text/javascript" src="..\custom\delConf.js?v=5"></script>
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
        }, 10000);

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
    
    $(document).ready(function() {
        document.getElementById("mctArchive_pre").setAttribute("hidden", "");

        <?php
        if(isset($_GET["viewPreview"]) AND !empty($_GET["viewPreview"])){
            echo 'showMctPre();';
            }
        ?>
});
    </script>
  
</body>

</html>
<!-- Developed By SiWDOL M. -->