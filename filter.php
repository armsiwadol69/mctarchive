<?php
include 'commonfPub.php';
$json_data = readSettingJSON2MainPage();
extract($json_data);

include 'conn.php';
$conn = mysqli_connect($serverName, $userName, $userPassword, $dbName);

if (isset($_GET["page"]) and !empty($_GET["page"])) {
    $page_default = intval($_GET["page"]);
} else {
    $page_default = 1;
}

$no_of_records_per_page = 12;
$offset = ($page_default - 1) * $no_of_records_per_page;

if (isset($_GET["year"]) == 1 and empty($_GET["year"]) == 0) {
    $taget_s = $_GET["year"];
    $sql_search = "SELECT * , mT.teacherName AS mainTn , cT.teacherName AS coTn FROM mctarchive
    LEFT JOIN teacher AS mT ON mctarchive.teacher = mT.teacher_id
    LEFT JOIN teacher AS cT ON mctarchive.co_teacher = cT.teacher_id
    LEFT JOIN branch ON mctarchive.branch = branch.branch_id WHERE sec LIKE '$taget_s' ORDER BY add_date ASC LIMIT $offset, $no_of_records_per_page";
    $sql_search_2all = "SELECT system_id FROM mctarchive WHERE sec LIKE '$taget_s' ORDER BY add_date ASC ";
    $taget_to_find = 'ปีการศึกษา : ' . $taget_s;
    $taget_nextpage = "?year=" . "$taget_s";

} elseif (isset($_GET["teacher"]) == 1 and empty($_GET["teacher"]) == 0) {
    $taget_s = $_GET["teacher"];
    $taget_n = $_GET["tn"];
    $sql_search = "SELECT * , mT.teacherName AS mainTn , cT.teacherName AS coTn FROM mctarchive
    LEFT JOIN teacher AS mT ON mctarchive.teacher = mT.teacher_id
    LEFT JOIN teacher AS cT ON mctarchive.co_teacher = cT.teacher_id
    LEFT JOIN branch ON mctarchive.branch = branch.branch_id
    WHERE teacher = '$taget_s' ORDER BY add_date ASC LIMIT $offset, $no_of_records_per_page";
    $sql_search_2all = "SELECT system_id FROM mctarchive WHERE teacher = '$taget_s' ORDER BY teacher ASC";
    $taget_to_find = 'หัวข้อที่เกี่ยวกับที่ปรึกษา : ' . $taget_n;
    $taget_nextpage = "?teacher=" . "$taget_s";
} elseif (isset($_GET["branch"]) == 1 and empty($_GET["branch"]) == 0) {
    $taget_s = $_GET["branch"];
    $taget_n = $_GET["bn"];
    $sql_search = "SELECT * , mT.teacherName AS mainTn , cT.teacherName AS coTn FROM mctarchive
    LEFT JOIN teacher AS mT ON mctarchive.teacher = mT.teacher_id
    LEFT JOIN teacher AS cT ON mctarchive.co_teacher = cT.teacher_id
    LEFT JOIN branch ON mctarchive.branch = branch.branch_id
    WHERE mctarchive.branch = '$taget_s' ORDER BY add_date ASC LIMIT $offset, $no_of_records_per_page";
    $sql_search_2all = "SELECT system_id FROM mctarchive WHERE branch = '$taget_s' ORDER BY add_date ASC ";
    $taget_to_find = 'หัวข้อที่เกี่ยวกับสาขา : ' . $taget_n;
    $taget_nextpage = "?branch=" . "$taget_s";
} elseif ($_GET["type_doc"] == "1" and empty($_GET["type_doc"]) == 0) {
    $taget_s = $_GET["type_doc"];
    $sql_search = "SELECT * , mT.teacherName AS mainTn , cT.teacherName AS coTn FROM mctarchive
    LEFT JOIN teacher AS mT ON mctarchive.teacher = mT.teacher_id
    LEFT JOIN teacher AS cT ON mctarchive.co_teacher = cT.teacher_id
    LEFT JOIN branch ON mctarchive.branch = branch.branch_id WHERE type_doc LIKE '1' ORDER BY add_date ASC LIMIT $offset, $no_of_records_per_page";
    $sql_search_2all = "SELECT system_id FROM mctarchive WHERE type_doc LIKE '1' ORDER BY add_date ASC ";
    $taget_to_find = 'ปริญญานิพนธ์ของ : นักศึกษา';
    $taget_nextpage = "?type_doc=" . "$taget_s";
} elseif ($_GET["type_doc"] == "2" and empty($_GET["type_doc"]) == 0) {
    $taget_s = $_GET["type_doc"];
    $sql_search = "SELECT * , mT.teacherName AS mainTn , cT.teacherName AS coTn FROM mctarchive
    LEFT JOIN teacher AS mT ON mctarchive.teacher = mT.teacher_id
    LEFT JOIN teacher AS cT ON mctarchive.co_teacher = cT.teacher_id
    LEFT JOIN branch ON mctarchive.branch = branch.branch_id WHERE type_doc LIKE '2' ORDER BY add_date ASC LIMIT $offset, $no_of_records_per_page";
    $sql_search_2all = "SELECT system_id FROM mctarchive WHERE type_doc LIKE '2' ORDER BY add_date ASC ";
    $taget_to_find = 'งานวิจัยของ : อาจารย์';
    $taget_nextpage = "?type_doc=" . "$taget_s";
} else {
    header("location: index.php");
    exit(0);
    //echo strlen($year);
}

$query = mysqli_query($conn, $sql_search);
$result_all = mysqli_query($conn, $sql_search);
$result_row = mysqli_query($conn, $sql_search_2all);
$row_cnt = $result_row->num_rows;
$total_pages = ceil($row_cnt / $no_of_records_per_page);
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
    <title>ระบบสืบค้นปริญญานิพนธ์และงานวิจัย คณะเทคโนโลยีสื่อสารมวลชน มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรีี</title>
    <meta property="og:title"
        content="<?php echo "$taget_to_find"; ?> | <?php echo $v_websiteName.' '.$v_subName?>" />
    <meta property="og:description"
        content="<?php echo $v_websiteName.' '.$v_subName?>" />
    <meta property="og:image" content="favicon.png" />
</head>

<body>
    <?php
include 'navbar.php';
?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="jumbotron jumbotron_site mainjum mainvector mt-5">
                    <h2 class="display-5"><?php echo $v_websiteName;?></h2>
                    <p class="lead"><?php echo $v_subName;?></p>
                    <hr class="my-4" style="max-width:70%">
                    <h2><i class="bi bi-filter-square"></i> แสดงผลเฉพาะ<?php echo $taget_to_find; ?></h2>
                    <h4 class="">จำนวนรายการที่ตรงตามเงื่อนไข <span class="badge bg-dark text-while no-text-outline">
                            <?php echo "$row_cnt"; ?></span> รายการ</h4>
                    <?php if ($row_cnt == 0) {
    echo ' <h4 class="">ไม่พบข้อมูล</h4> ';
}?>
                </div>
            </div>
        </div>
        <?php include 'searchbox.php';?>
        <div class="row" id="kokodayo" name="kokodayo">
            <?php
include 'topiccard.php';
?>


            <div class="col-12">
                <div class="mt-3 w-100">
                    <hr class="my-2">
                    <div class="btn-toolbar w-100" style="justify-content: center; display: flex;" role="toolbar"
                        aria-label="Toolbar with button groups">
                        <div class="btn-group my-2 shadow-sm" role="group" aria-label="First group">
                            <a class="btn btn-dark" href="<?php echo "$taget_nextpage"; ?>&page=1#kokodayo">หน้าแรก</a>
                            <a class="btn btn-dark <?php if ($page_default <= 1) {echo 'disabled';}?>"
                                href="<?php echo "$taget_nextpage"; ?><?php if ($page_default <= 1) {echo '$taget_nextpage';} else {echo "&page=" . ($page_default - 1);}?>#kokodayo">หน้าที่แล้ว</a>
                            </a>
                            <?php if ($page_default - 3 > 0) {
    $numtoback = $page_default - 3;
    echo '<a class="btn btn-dark" href="' . $taget_nextpage . '&page=' . $numtoback . '#kokodayo">';
    echo $page_default - 3;
    echo "</a>";}
if ($page_default - 2 > 0) {
    $numtoback = $page_default - 2;
    echo '<a class="btn btn-dark" href="' . $taget_nextpage . '&page=' . $numtoback . '#kokodayo">';
    echo $page_default - 2;
    echo "</a>";}
if ($page_default - 1 > 0) {
    $numtoback = $page_default - 1;
    echo '<a class="btn btn-dark" href="' . $taget_nextpage . '&page=' . $numtoback . '#kokodayo">';
    echo $page_default - 1;
    echo "</a>";}
?>

                            <button class="btn btn-dark mx-2"><?php echo "$page_default"; ?></button>

                            <?php if ($page_default + 1 <= $total_pages) {
    $numtoback = $page_default + 1;
    echo '<a class="btn btn-dark" href="' . $taget_nextpage . '&page=' . $numtoback . '#kokodayo">';
    echo $page_default + 1;
    echo "</a>";}
if ($page_default + 2 <= $total_pages) {
    $numtoback = $page_default + 2;
    echo '<a class="btn btn-dark" href="' . $taget_nextpage . '&page=' . $numtoback . '#kokodayo">';
    echo $page_default + 2;
    echo "</a>";}
if ($page_default + 3 <= $total_pages) {
    $numtoback = $page_default + 3;
    echo '<a class="btn btn-dark" href="' . $taget_nextpage . '&page=' . $numtoback . '#kokodayo">';
    echo $page_default + 3;
    echo "</a>";}
?>

                            <a class="btn btn-dark <?php if ($page_default >= $total_pages) {echo 'disabled';}?>"
                                href="<?php echo "$taget_nextpage"; ?><?php if ($page_default >= $total_pages) {echo '#';} else {echo "&page=" . ($page_default + 1);}?>">หน้าถัดไป
                            </a>
                            <a class="btn btn-dark <?php if ($page_default >= $total_pages) {echo 'disabled';}?>"
                                href="<?php echo "$taget_nextpage"; ?>&page=<?php echo $total_pages; ?>">หน้าสุดท้าย</a>

                        </div>
                    </div>
                </div>
            </div>

            <?php include 'footer.php';?>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
        integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="bootstrap5\js\bootstrap.min.js"></script>
    <script type="text/javascript" src="custom\tooltips.js"></script>
</body>

</html>
<!-- Developed By SiWDOL M. -->