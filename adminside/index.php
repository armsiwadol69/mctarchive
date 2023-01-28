<?php
session_start();
include 'commonf.php';
$json_data = readSettingJSON2MainPage();
extract($json_data);

isLogin();

include '../conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login | MCT ARCHIVE</title>
    <link rel="shortcut icon" href="../favicon.png" type="image/x-icon">
    <link rel="icon" href="../favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="..\bootstrap5\css\bootstrap.min.css">
    <link rel="stylesheet" href="..\custom\sicustom.css">
    <link rel="stylesheet" href="..\custom\aos.css">
    <link rel="stylesheet" href="..\custom\loginPage.css?v=1.1">
    <script type="text/javascript" src="..\custom\aos.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <style>
    body {
        /* background-image: url('https://shop.vive.co.th/wp-content/uploads/2021/03/tipco-set-1-1.jpg');
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat; */
        overflow: hidden;
    }
    </style>
</head>

<body>
    <video id="bgVid" class="background-video" autoplay loop>
        <source src="../img/pv4_t.mp4" type="video/mp4">
    </video>

    <div class="container-fluid px-0">
        <div class="row no-gutters">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 d-none d-sm-none d-md-none d-lg-none d-xl-block">
                <div class="card noBorder loginLeftImage w-100 vh-100">
                    <div class="card-body d-flex flex-column p-0">
                        <h5 class="mt-auto mx-3 text-white"
                            style="filter: drop-shadow(5px 5px 5px rgba(0, 0, 0, 0.7));"><?php echo $shortNameEng; ?> Version <?php echo $c_version;?> | SiWADOL X MCT Library <button class="btn btn-outline-info" onclick="turnUpVol();"><i class="bi bi-music-note-beamed"></i></button></h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 p-0">
                <div class="card noBorder loginRightBackground w-100 vh-100">
                    <div class="card-body d-flex align-items-center">
                        <form method="POST" action="login.php">
                            <div class="row d-flex justify-content-center">
                                <div class="col-12 d-flex flex-column justify-content-center text-white text-center">
                                <h1 class="d-flex display-4 justify-content-center fw-bold"><?php echo $v_websiteName; ?></h1>
                                <h4 class="d-flex justify-content-center fw-bold"><?php echo $v_subName; ?></h5>
                                    <img class="img-fluid" style=" filter: drop-shadow(7px 7px 7px rgba(0, 0, 0, 0.5));"
                                        src="../img/Blue_Archive_logo_JP.png" alt="" hidden>
                                </div>
                                <div class="col-0 col-xl-3 offest-3"></div>
                                <div class="col-8 col-md-8 col-xl-6 offest-3">
                                    <div class="form-group mt-4">
                                        <label for="name" class="text-white font-weight-bold">Username</label>
                                        <input type="username" class="form-control" name="username" aria-describedby="username" placeholder="Username" required>
                                    </div>
                                </div>
                                <div class="col-xl-3 offest-4"></div>
                                <div class="col-xl-3 offest-4"></div>
                                <div class="col-8 col-md-8 col-xl-6">
                                    <div class="form-group">
                                        <label for="password" class="text-white font-weight-bold">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="col-xl-3 offest-3"></div>
                                <div class="col-8 col-md-8 col-xl-6">
                                    <div class="form-group">
                                        
                                    </div>

                                    <div class="form-group mt-3">
                                        <button type="submit"
                                            class="btn btn_login w-100 text-white font-weight-bold shadow-sm">
                                            <i class="bi bi-box-arrow-in-right"></i> Login
                                        </button>
                                    </div>
                                    <div class="mt-4 text-center font-weight-bold">
                                        <a href="../index.php" class="text-decoration-none text-white"><i
                                                class="bi bi-box-arrow-in-left"></i> หน้าหลัก</a>
                                    </div>
                                    <div class="mt-4 text-center">
                                    <?php
                                    if (isset($_GET["login"]) == 1) {
                                    $status = $_GET["login"];
                                      }else {
                                    $status = NULL;
                                      }
                                    if ($status == "fail") {
                                      echo '
                                      <div class="alert alert-warning w-100 shadow-sm" role="alert">
                                      ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง
                                      </div>
                                      ';
                                    }elseif ($status == "notlogin") {
                                      echo '
                                      <div class="alert alert-warning w-100 shadow-sm" role="alert">
                                      กรุณาเข้าสู่ระบบก่อน
                                      </div>
                                      ';
                                    }
                                    elseif ($status == "afk") {
                                      echo '
                                      <div class="alert alert-warning w-100 shadow-sm" role="alert">
                                      ออกจากระบบอัตโนมัติเนื่องจากไม่มีการใช้งานนานกว่า 60 นาที
                                      </div>
                                      ';
                                    }
                                    ?>
                                    <div class="mt-2 text-center d-block d-sm-block d-md-block d-lg-block d-xl-none">
                                        <h6 class="mt-3 text-dark"
                                            style="filter: drop-shadow(5px 5px 5px rgba(0, 0, 0, 0.5));"><?php echo $shortNameEng; ?> Version <?php echo $c_version;?> | SiWADOL X MCT Library <button class="btn btn-outline-info" onclick="turnUpVol();"><i class="bi bi-music-note-beamed"></i></button></h6>
                                    </div>
                                </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
    var vid = document.getElementById("bgVid");
    vid.volume = 0;
    vid.play();
    
    function turnUpVol(){
        vid.removeAttribute("muted");
        vid.volume = 0.1;
    }

    </script>
    
</body>

</html>