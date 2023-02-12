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
            <div class="sidebar-heading border-bottom bg-dark mt-3 text-center"><a class="navbar-brand"
                    href="dashboard.php"><img src="../favicon.png" class="d-inline-block align-top" width="25"
                        height="25" alt=""> <?php echo $shortNameEng?></a></div>
            <div class="list-group list-group-flush mt-3">
                <a class="list-group-item list-group-item-action list-group-item-dark p-4 active"
                    href="dashboard.php"><i class="bi bi-table"></i> รายการแสดงผลทั้งหมด</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-4 active"
                    href="dashboard.php?viewPreview=1"> <i class="bi bi-table"></i> รายการรอการตรวจสอบ</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-4 active"
                    href="add_topic.php"><i class="bi bi-file-plus"></i> เพิ่มข้อมูลปริญญานิพนธ์<br>งานวิจัย</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-4 active" data-bs-toggle="modal"
                    data-bs-target="#add_teacher" href="#"><i class="bi bi-file-person"></i>
                    จัดการรายชื่ออาจารย์</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-4 active" data-bs-toggle="modal"
                    data-bs-target="#add_year" href="#"><i class="bi bi-calendar-event"></i>
                    จัดการปีการศึกษา</a>
                <a class="list-group-item list-group-item-action p-4  <?php onlySadmin();?>" data-bs-toggle="modal"
                    data-bs-target="#add_branch" href="#"><i class="bi bi-list-stars"></i>
                    จัดการรายชื่อสาขา</a>
                <a class="list-group-item list-group-item-action p-4  <?php onlySadmin();?>" data-bs-toggle="modal"
                    data-bs-target="#add_admin" href="#"><i class="bi bi-file-plus"></i>
                    จัดการบัญชีผู้ใช้งาน</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-4 active <?php onlySadmin();?>"
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
                    <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12" data-aos="fade-up" data-aos-duration="500">
                        <div class="card shadow-sm my-1">
                            <h5 class="card-header">รายชื่ออาจารย์ที่ปรึกษา</h5>
                            <div class="card-body">
                                <div class="modal-body">
                                    <div class="table-responsive" style="max-height : 70vh;overflow-y: auto;">
                                        <table
                                            class="table text-dark table-hover table-striped mx-auto my-auto align-middle text-center">
                                            <tr>
                                                <td>คำนำหน้า</td>
                                                <td>ชื่ออาจารย์ที่ปรึกษา</td>
                                                <td>สาขา</td>
                                                <td>แก้ไข</td>
                                                <td>ลบ</td>
                                            </tr>
                                            <?php
          $result_teacher2 = mysqli_query($conn, $sql_teacher);
          while($name_teacher2 = mysqli_fetch_array($result_teacher2)) {
            echo '<tr><td>'.$name_teacher2["nameTitle"].'</td>';
            echo '<td>'.$name_teacher2["teacherName"].'</td>';
            echo '<td>'.$name_teacher2["branchName"].'</td>';
            echo "<td>" . '<a type="button" class="btn btn-warning"  href="teacher.php?edit=1&Tid='.$name_teacher2["teacher_id"].'""><i class="bi bi-pencil"></i></a>' .   "</td> ";
            echo "<td>" . '<a type="button" class="btn btn-danger" onclick="delTeacher('.$name_teacher2["teacher_id"].')"><i class="bi bi-trash"></i></a>' .   "</td> " ."</tr>" ;
        }; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if(isset($_GET["edit"]) AND isset($_GET["Tid"])){
                        $editTarget_T = $_GET["Tid"];
                        $sql_TRE = "SELECT * FROM teacher LEFT JOIN branch ON teacher.branch = branch.branch_id WHERE teacher_id = '$editTarget_T'";
                        $resultTedit = mysqli_fetch_array(mysqli_query($conn, $sql_TRE));
                        $hideEditBox = '';
                    }else{
                        $hideEditBox = 'hidden';
                    }
                    ?>
                    <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12" data-aos="fade-up" data-aos-duration="500">
                        <div class="card shadow-sm my-1 mb-3 border-warning" <?php echo $hideEditBox;?>>
                            <h5 class="card-header">แก้ไขข้อมูล ชื่ออาจารย์ที่ปรึกษา</h5>
                            <div class="card-body">
                                <div class="modal-body">
                                    <form method="post" action="add_teacher.php?edit=1"
                                        onsubmit="return checkForm(this);">
                                        <div class="row gap-0">
                                            <div class="col-xl-2 col-sm-12">
                                                <label for="teacher_ID">ID</label>
                                                <input type="text" class="form-control" name="teacher_ID"
                                                    value="<?php echo $resultTedit["teacher_id"];?>" required readonly>
                                            </div>
                                            <div class="col-xl-3 col-sm-12">
                                                <label for="name">คำนำหน้า<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="nameTitle"
                                                    value="<?php echo $resultTedit["nameTitle"];?>" required>
                                            </div>
                                            <div class="col-xl-7 col-sm-12">
                                                <label for="name">ชื่ออาจารย์<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="teacher"
                                                    value="<?php echo $resultTedit["teacherName"];?>" required>
                                            </div>
                                            <div class="form-group col-12">
                                                <label for="name">สาขา<span class="text-danger">*</span></label>
                                                <select type="text" class="form-control form-select" name="branch"
                                                    value="" required>
                                                    <option value="<?php echo $resultTedit["branch_id"];?>">
                                                        <?php echo $resultTedit["branchName"];?></option>
                                                    <?php
                                                    $toAvoid = $resultTedit["branch"];
              $sql_allbranch = "SELECT * FROM branch WHERE branch_id != '$toAvoid' ORDER BY branch_id ASC";
              $result_allbranch = mysqli_query($conn, $sql_allbranch);
              while($row5_branch = mysqli_fetch_array($result_allbranch)) {
              echo '<option value="'.$row5_branch["branch_id"].'">'.$row5_branch["branchName"].'</option>';
              };
                     ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-6">
                                            <input type="submit" class="btn btn-primary btn-block w-100"
                                            value="บันทึกข้อมูล" id="btnSubmitTeacher">
                                            </div>
                                            <div class="col-6">
                                            <button type="button" onclick="history.back()" class="btn btn-secondary btn-block w-100"
                                            >ยกเลิก</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow-sm my-1">
                            <h5 class="card-header">เพิ่มชื่ออาจารย์ที่ปรึกษา</h5>
                            <div class="card-body">
                                <div class="modal-body">
                                    <form method="post" action="add_teacher.php" onsubmit="return checkForm(this);">
                                        <div class="row gap-0">
                                            <div class="col-xl-4 col-sm-12">
                                                <label for="name">คำนำหน้า<span class="text-danger">*</span>์</label>
                                                <input type="text" class="form-control" name="nameTitle" value=""
                                                    required>
                                            </div>
                                            <div class="col-xl-8 col-sm-12">
                                                <label for="name">ชื่ออาจารย์<span class="text-danger">*</span>์</label>
                                                <input type="text" class="form-control" name="teacher" value=""
                                                    required>
                                            </div>
                                            <div class="form-group col-12">
                                                <label for="name">สาขา<span class="text-danger">*</span></label>
                                                <select type="text" class="form-control form-select" name="branch"
                                                    value="" required>
                                                    <option value="">เลือก..</option>
                                                    <?php
              $sql_allbranch = "SELECT * FROM branch ORDER BY branch_id ASC";
              $result_allbranch = mysqli_query($conn, $sql_allbranch);
              while($row5_branch = mysqli_fetch_array($result_allbranch)) {
              echo '<option value="'.$row5_branch["branch_id"].'">'.$row5_branch["branchName"].'</option>';
              };
                     ?>
                                                </select>
                                            </div>
                                        </div>

                                        <br>
                                        <input type="submit" class="btn btn-primary btn-block w-100"
                                            value="เพิ่มชื่ออาจารย์ที่ปรึกษา" id="btnSubmitTeacher">
                                    </form>
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