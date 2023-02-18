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
                <a class="list-group-item list-group-item-action list-group-item-dark p-4 active" href="teacher.php"><i
                        class="bi bi-file-person"></i>
                    จัดการรายชื่ออาจารย์</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-4 active" data-bs-toggle="modal"
                    data-bs-target="#add_year" href="#"><i class="bi bi-calendar-event"></i>
                    จัดการปีการศึกษา</a>
                <a class="list-group-item list-group-item-action p-4  <?php onlySadmin();?>" data-bs-toggle="modal"
                    data-bs-target="#add_branch" href="#"><i class="bi bi-list-stars"></i>
                    จัดการรายชื่อสาขา</a>
                <a class="list-group-item list-group-item-action p-4 pe-none" data-bs-toggle="modal"
                    data-bs-target="#add_admin" href="#"><i class="bi bi-file-plus"></i>
                    จัดการบัญชีผู้ใช้งาน</a>
                <a class="list-group-item list-group-item-action p-4 <?php onlySadmin();?>" href="setting.php"><i
                        class="bi bi-gear"></i> ตั้งค่า</a>
                <a
                    class="list-group-item list-group-item-action list-group-item-dark p-4 mt-2 active user-select-none"><?php echo 'ผู้ใช้ : '.$_SESSION["name"].'<br>'.'ระดับผู้ใช้งาน : '; echoUserLevel($_SESSION["level"])?></a>
                <a class="list-group-item list-group-item-action list-group-item-danger p-1 mt-3 text-center active"
                    href="logout.php">ออกจากระบบ</a>
                <a
                    class="list-group-item list-group-item-action list-group-item-secondary user-select-none p-1 mt-3 text-center active">VERSION
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
                <div class="row mt-2 gx-2 gy-2">
                    <div class="col-12">
                        <?php include 'nofbox.php';?>
                    </div>
                    <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12" data-aos="fade-up" data-aos-duration="500">
                        <div class="card shadow-sm">
                            <h5 class="card-header">บัญชีผู้ใช้</h5>
                            <div class="card-body">
                                <div class="modal-body">
                                    <div class="table-responsive" style="max-height : 70vh;overflow-y: auto;">
                                        <table
                                            class="table text-dark table-hover table-striped mx-auto my-auto align-middle text-center">
                                            <tr>
                                                <td>Username</td>
                                                <td>ชื่อของเจ้าของบัญชี</td>
                                                <td>ระดับ</td>
                                                <td>สถานะบัญชี</td>
                                                <td>เปลี่ยนสถานะ</td>
                                                <td>แก้ไข</td>
                                                <td>ลบ</td>
                                            </tr>
                                            <?php
        if ($_SESSION["level"] !== "ADMIN") {$permission = " disabled";} else {
            $permission = "";
        };
        $result_username = mysqli_query($conn, $sql_username);
        while($name_username = mysqli_fetch_array($result_username)) {
            echo '<tr><td>'.$name_username["username"].'</td>';
            echo '<td>'.$name_username["name"].'</td>';
            if ($name_username["level"] == "ADMIN") {
              echo '<td class="text-primary">ผู้ดูแลระบบ</td>';
            }else {
              echo '<td class="text-secondary">ผู้เพิ่มข้อมูล</td>';
            }
            if($name_username["status"] == '0'){
            echo '<td class="text-danger text-capitalize">inactive</td>';    
            echo "<td>" . '<a type="button" class="btn btn-success '. $permission.'" onclick="AUserStatus('.$name_username["user_id"].')"><i class="bi bi-check-circle"></i></i></a>' .   "</td> " ;
            }else{
            echo '<td class="text-success text-capitalize">active</td>';    
            echo "<td>" . '<a type="button" class="btn btn-danger '. $permission.'" onclick="DAUserStatus('.$name_username["user_id"].')"><i class="bi bi-x-circle"></i></a>' .   "</td> " ;
            }
            echo "<td>" . '<a type="button" class="btn btn-warning '.'"  href="userManage.php?edit=1&Tid='.$name_username["user_id"].'""><i class="bi bi-pencil"></i></a>' .   "</td> ";
            if(empty($name_username["system_id"])){
            echo "<td>" . '<a type="button" class="btn btn-danger" onclick="delUser('.$name_username["user_id"].')"><i class="bi bi-trash"></i></a>' .   "</td> " ."</tr>" ;
            }else{
            echo '<td data-bs-toggle="tooltip" data-bs-placement="top" title="ลบไม่ได้ มีรายการที่เกี่ยวข้อง">' . '<a type="button" class="btn btn-danger disabled" '.')"><i class="bi bi-trash"></i></a>' .   "</td> " ."</tr>" ;
            }
        }; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow-sm mt-2">
                            <h5 class="card-header">โปรดทราบ</h5>
                            <div class="card-body">
                                    <p>บัญชีที่ลบไม่ได้ เนื่องจาก บัญชีที่มีการเพิ่มข้อมูลข้อมูลปริญญานิพนธ์หรืองานวิจัย อย่างน้อย 1 รายการ หากต้องการจำกัดการเข้าถึงของบัญชีให้ทำการปิดการเข้าถึงแทน (เปลี่ยนสถานะเป็น <span class="text-danger">Inactive</span>)</p>
                            </div>
                        </div>
                    </div>
                    <?php
                    if(isset($_GET["edit"]) AND isset($_GET["Tid"])){
                        $editTarget_T = $_GET["Tid"];
                        $sql_TRE = "SELECT * FROM login WHERE user_id = '$editTarget_T'";
                        $resultTedit = mysqli_fetch_array(mysqli_query($conn, $sql_TRE));
                        $hideEditBox = '';
                    }else{
                        $hideEditBox = 'hidden';
                        $sql_TRE = "SELECT * FROM login WHERE user_id = 'NONE'";
                        $resultTedit = mysqli_fetch_array(mysqli_query($conn, $sql_TRE));
                    }
                    ?>
                    <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12" data-aos="fade-up" data-aos-duration="500">
                        <div class="card shadow-sm mb-3 border-warning" <?php echo $hideEditBox;?>>
                            <h5 class="card-header">แก้ไขข้อมูล บัญชีผู้ใช้</h5>
                            <div class="card-body">
                                <div class="modal-body">
                                    <form method="post" action="add_admin.php?edit=1" onsubmit="return checkForm(this);"
                                        onkeyup="checkPasswordMatch();checkEmpty();">
                                        <div class="row gap-0">
                                            <div class="col-xl-2 col-sm-12">
                                                <label for="user_id">ID</label>
                                                <input type="text" class="form-control" name="user_id"
                                                    value="<?php echo $resultTedit["user_id"];?>" required readonly>
                                            </div>
                                            <div class="col-xl-10 col-sm-12">
                                                <label for="username">Username<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="username"
                                                    value="<?php echo $resultTedit["username"];?>" required>
                                            </div>
                                            <div class="col-xl-12 col-sm-12">
                                                <label for="name">ชื่อของเจ้าของบัญชี<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name"
                                                    value="<?php echo $resultTedit["name"];?>" required>
                                            </div>
                                            <div class="col-xl-12 col-sm-12">
                                                <label for="name">ระดับ<span class="text-danger">*</span></label>
                                                <select type="text" class="form-control form-control form-select"
                                                    name="level" value="" required>
                                                    <!-- <option value="ADMIN">ผู้ดูแลระบบ</option>
                                                    <option value="USER">ผู้เพิ่มข้อมูล</option> -->
                                                    <?php 
                                                    if ($resultTedit["level"] == "ADMIN") {
                                                       echo '<option value="ADMIN" selected>ผู้ดูแลระบบ</option>';
                                                       echo '<option value="USER">ผู้เพิ่มข้อมูล</option>';
                                                      }else {
                                                        echo '<option value="ADMIN">ผู้ดูแลระบบ</option>';
                                                        echo '<option value="USER" selected>ผู้เพิ่มข้อมูล</option>';
                                                      }?>
                                                </select>
                                            </div>
                                            <hr class="mt-3">
                                            <h6>เปลี่ยนรหัสผ่าน</h6>
                                            <div class="col-xl-12 col-sm-12">
                                                <label for="password_old">รหัสผ่าน<span
                                                        class="text-danger">*</span></label>
                                                <input type="password" class="form-control" name="password_old"
                                                    id="cPassword1" value="">
                                            </div>
                                            <div class="col-xl-12 col-sm-12">
                                                <label for="password">รหัสผ่านอีกครั้ง<span
                                                        class="text-danger">*</span></label>
                                                <input type="password" class="form-control" name="password"
                                                    id="cPassword2" value="">
                                            </div>
                                            <div class="col-xl-12">
                                                <div id="divCheckPasswordMatch"></div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-6">
                                                <input type="submit" class="btn btn-primary btn-block w-100"
                                                    value="บันทึกข้อมูล" id="btnSubmitEditUser">
                                            </div>
                                            <div class="col-6">
                                                <button type="button" onclick="window.location.href='teacher.php'"
                                                    class="btn btn-secondary btn-block w-100">ยกเลิก</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow-sm my-1">
                            <h5 class="card-header">เพิ่มบัญชีผู้ใช้</h5>
                            <div class="card-body">
                                <div class="modal-body">
                                    <form method="post" action="add_admin.php" onsubmit="return checkForm(this);"
                                        onkeyup="checkPasswordMatchNewUser();checkEmptyNewUser();">
                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label for="name">Username<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="username" value=""
                                                    required>
                                            </div>
                                            <div class="form-group col-12">
                                                <label for="name">รหัสผ่าน<span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" name="password_old"
                                                    id="newPassword1" value="" required>
                                            </div>
                                            <div class="form-group col-12">
                                                <label for="name">รหัสผ่านอีกครั้ง<span
                                                        class="text-danger">*</span></label>
                                                <input type="password" class="form-control" name="password"
                                                    id="newPassword2" value="" required>
                                            </div>
                                            <div class="col-xl-12">
                                                <div id="divCheckPasswordMatchNewUser" class="mt-1"></div>
                                            </div>
                                            <div class="form-group col-12">
                                                <label for="name">ชื่อของเจ้าของบัญชี<span
                                                        class="text-danger">*</span></label>
                                                <input type="name" class="form-control" name="name" value="" required>
                                            </div>
                                            <div class="form-group col-12">
                                                <label for="name">ระดับ<span class="text-danger">*</span></label>
                                                <select type="text" class="form-control form-control form-select"
                                                    name="level" value="" required>
                                                    <option value="ADMIN">ผู้ดูแลระบบ</option>
                                                    <option value="USER">ผู้เพิ่มข้อมูล</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <input type="submit" class="btn btn-primary btn-block w-100"
                                            value="สร้างบัญชีผู้ใช้งาน" id="btnSubmitUser">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow-sm mt-2">
                            <h5 class="card-header">รายละเอียดและสิทธิของบัญชี</h5>
                            <div class="card-body">
                                <div class="modal-body">
                                    <p><span class="badge text-bg-info">ผู้ดูแลระบบ</span> เพิ่ม แก้ไข ลบ
                                        ข้อมูลปริญญานิพนธ์และงานวิจัย ปีการศึกษา ชื่ออาจารย์ที่ปรึกษา สาขา
                                        ตรวจสอบและอนุมัติข้อมูลปริญญานิพนธ์และงานวิจัย ที่ถูกเพิ่มเข้ามาโดย
                                        ผู้เพิ่มข้อมูล และ ตั้งค่าเว็บแอพพลิเคชั่น</p>
                                    <hr>
                                    <p><span class="badge text-bg-secondary">ผู้เพิ่มข้อมูล</span> เพิ่ม
                                        ข้อมูลปริญญานิพนธ์และงานวิจัย <span class="fw-bold">โดยข้อมูลที่เพิ่มมานั้น
                                            จะอยู่ในรายการรอตรวจสอบและยังไม่ถูกไปนำไปแสดงผล</span> และ
                                        เพิ่มชื่ออาจารย์ที่ปรึกษา</p>
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

    function checkPasswordMatch() {
        var password = $("#cPassword1").val();
        var confirmPassword = $("#cPassword2").val();

        if (password != confirmPassword) {
            $("#divCheckPasswordMatch").html('<p class="text-danger">รหัสผ่านไม่ตรงกัน</p>');
            $("#btnSubmitEditUser").prop("disabled", true);
        } else {
            $("#divCheckPasswordMatch").html('<p class="text-success">รหัสผ่านตรงกัน</p>');
            $("#btnSubmitEditUser").removeAttr('disabled');
        }
    }

    function checkPasswordMatchNewUser() {
        var password = $("#newPassword1").val();
        var confirmPassword = $("#newPassword2").val();

        if (password != confirmPassword) {
            $("#divCheckPasswordMatchNewUser").html('<p class="text-danger">รหัสผ่านไม่ตรงกัน</p>');
            $("#btnSubmitUser").prop("disabled", true);
        } else {
            $("#divCheckPasswordMatchNewUser").html('<p class="text-success">รหัสผ่านตรงกัน</p>');
            $("#btnSubmitUser").removeAttr('disabled');
        }
    }

    function checkEmptyNewUser() {
        var password = $("#newPassword1").val().length;
        var confirmPassword = $("#newPassword2").val().length;
        if (password === 0 && confirmPassword === 0) {
            $("#divCheckPasswordMatchNewUser").html('');
            $("#btnSubmitUser").prop("disabled", true);
        }
    }

    function checkEmpty() {
        var password = $("#cPassword1").val().length;
        var confirmPassword = $("#cPassword2").val().length;
        if (password === 0 && confirmPassword === 0) {
            $("#divCheckPasswordMatch").html('');
            //$("#btnSubmitEditUser").prop("disabled", true);
        }
    }
    </script>
</body>

</html>
<!-- Developed By SiWDOL M. -->