<?php
include 'commonfPub.php';
$json_data = readSettingJSON2MainPage();
extract($json_data);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="bootstrap5\css\bootstrap.min.css">
    <link rel="stylesheet" href="custom\sicustom.css">
    <link rel="stylesheet" href="custom\loginPage.css">
    <link rel="stylesheet" href="custom\aos.css">
    <script type="text/javascript" src="custom\aos.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <meta charset="utf-8">
    <title><?php echo $v_websiteName . ' ' . $v_subName ?></title>
    <meta property="og:title" content="<?php echo $v_websiteName . ' ' . $v_subName ?>" />
    <meta property="og:description" content="<?php echo $v_websiteName . ' ' . $v_subName ?>" />
    <meta property="og:image" content="favicon.png" />
</head>

<body>
    <?php
include 'navbar.php';
$result = $conn->query("SELECT id FROM mctarchive ORDER BY id");
$row_cnt = $result->num_rows;
?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="jumbotron jumbotron_site mainjum mainvector mt-4">
                    <h2 class="display-5"><?php echo $v_websiteName; ?></h2>
                    <p class="lead"><?php echo $v_subName; ?></p>
                    <hr class="my-4" style="max-width:60%">
                    <h4 class="">มีปริญญานิพนธ์และงานวิจัยที่ถูกจัดเก็บเป็นจำนวน <span
                            class="badge bg-dark text-while no-text-outline"> <?php echo "$row_cnt"; ?></span> รายการ
                    </h4>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
if (isset($_GET["add"]) == 1) {
    $add_tt = $_GET["add"];
    if ($add_tt == "0") {
        echo '
             <div class="alert alert-danger w-100 shadow-sm" role="alert">
             ไม่สามารถส่งข้อมูลให้ผู้ดูแลระบบได้ กรุณาติดต่อผู้ดูแลระบบเพื่อตรวจสอบว่า ID ที่กรอกนั้นมีอยู่แล้วหรือไม่
             </div>
             ';
    } elseif ($add_tt == "1") {
        echo '
             <div class="alert alert-success w-100 shadow-sm" role="alert">
             ส่งข้อมูลให้ผู้ดูแลระบบเรียบร้อย
             </div>
             '
        ;
    }
}
?>
        </div>
        <?php include 'searchbox.php';
if (isset($_GET["page"]) and !empty($_GET["page"])) {
    $page_default = intval($_GET["page"]);
} else {
    $page_default = 1;
}
$no_of_records_per_page = 3;
$offset = ($page_default - 1) * $no_of_records_per_page;
$total_pages = ceil($row_cnt / $no_of_records_per_page);
?>
        <div class="row gy-2 gx-2" id="kokodayo" name="kokodayo">
            <div class="col-12">
                <div class="card text-center mt-3 shadow-sm">
                    <div class="card-header">
                        เกี่ยวกับและติดต่อ
                    </div>
                    <div class="card-body">
                    <p>จัดทำโดย</p>
                   
                    <a class="text-decoration-none" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank">
                        <h6 style="color:#E4A8CA;">Siwadol Malisorn</h6>
                    </a>

                    <a class="text-decoration-none" href="https://www.youtube.com/watch?v=cp8UEv8i0lc" target="_blank">
                        <h6 style="color:#0077DD;">Nichapat Promson</h6>
                    </a>  
                    
                    <a class="text-decoration-none" href="https://www.youtube.com/watch?v=cp8UEv8i0lc" target="_blank">
                        <h6 style="color:#34DD9A;">Poonyanuch Tantidechamongkol</h6>
                    </a>
                    <p>Adviser : Chirapong Yanuchit</p>
                    <p>Version : <?php echo $c_version;?></p>
                    <hr>
                    <p>Digital Media Technology (DM6201)</p>
                    <a href="http://www.mct.rmutt.ac.th/" target="_blank"><img src="img\mctlogo.png"
                            class="rounded img-fluid my-1" style="max-height:100px" alt=""></a>
                    <h6>Mass Communication Technology<br></h6>
                    <a href="https://www.rmutt.ac.th/" target="_blank"><img src="img\rmuttlogo.png"
                            class="rounded img-fluid my-1" style="max-height:200px" alt=""></a>
                    <h6 class="">Rajamangala University of Technology Thanyaburi</h6>
                    <hr>
                    <p>หากพบปัญหาการใช้งาน ติดต่อได้ที่ : ห้องสมุด คณะเทคโนโลยีสื่อสารมวลชน มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี</p>
                    <p><a class="alink_end text-dark" href="mailto: <?php echo $v_email;?>">E-mail : <?php echo $v_email;?></a> Tel : <?php echo $v_telNumber;?></a></p>
                    </div>
                    <div class="card-footer text-muted">
                        
                    </div>
                </div>
            </div>

            <?php include 'footer.php';?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
            integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous">
        </script>
        <script type="text/javascript" src="bootstrap5\js\bootstrap.min.js"></script>
        <script type="text/javascript" src="custom\tooltips.js"></script>
</body>

</html>
<!-- Developed By SiWDOL M. -->