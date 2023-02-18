<?php

include 'commonfPub.php';
$json_data = readSettingJSON2MainPage();
extract($json_data);

ob_start();
$search = strval($_GET["search"]);
if (empty($search) == 1) {
    // header("location: index.php");
    // exit(0);
} else {
    //echo $search;
}
// if ($search == "MeenThaiSubNo1") {
//   header( "location: https://www.youtube.com/watch?v=ZL9r5SQQSd4&t=69s" );
//   exit(0);
// }elseif ($search == "GiveYouUp") {
//   header( "location: https://youtu.be/h0Spm7fPau8?t=19" );
// }elseif ($search == "Siwadol69") {
//   header( "location: https://youtu.be/4QXCPuwBz2E?t=48" );
// }elseif ($search == "Chakitsopon13") {
//   header( "location: https://youtu.be/0YF8vecQWYs?t=59" );
// }elseif ($search == "NutZ308") {
//   header( "location: https://www.facebook.com/HowtoSLEEP/videos/2732432693534881" );
// }elseif ($search == "Nichapat") {
//   header( "location: https://youtu.be/fTczCpIaLAU?t=62" );
// }

//echo $search;

include 'conn.php';
$conn = mysqli_connect($serverName, $userName, $userPassword, $dbName);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="bootstrap5\css\bootstrap.min.css">
    <link rel="stylesheet" href="custom\sicustom.css">
    <link rel="stylesheet" href="custom\loginPage.css">
    <link rel="stylesheet" href="custom\aos.css">
    <script type="text/javascript" src="custom\aos.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <meta charset="utf-8">
    <title>ค้นหา : <?php echo "$search"; ?> | <?php echo $v_websiteName . ' ' . $v_subName ?></title>
    <meta property="og:title" content="ค้นหา : <?php echo "$search"; ?> | <?php echo $v_websiteName . ' ' . $v_subName ?>" />
    <meta property="og:description" content="<?php echo $v_websiteName . ' ' . $v_subName ?>"/>
    <meta property="og:image" content="favicon.png" />
  </head>
  <body>
 <?php
include 'navbar.php';
if (isset($_GET["page"]) and !empty($_GET["page"])) {
    $page_default = intval($_GET["page"]);
} else {
    $page_default = 1;
}
$search_es = mysqli_real_escape_string($conn, $_GET["search"]);
if(isset($_GET["teacher"])){
    $search_teacher = mysqli_real_escape_string($conn, $_GET["teacher"]);
}else{
    $search_teacher = "teacher";
}
if(isset($_GET["year"])){
    $search_year = mysqli_real_escape_string($conn, $_GET["year"]);
}else{
    $search_year = "year";
}
if(isset($_GET["branch"])){
    $search_branch = mysqli_real_escape_string($conn, $_GET["branch"]);
}else{
    $search_branch = "branch";
}
if(isset($_GET["type_doc"])){
    $search_typeDoc  = mysqli_real_escape_string($conn, $_GET["type_doc"]);
}else{
    $search_typeDoc  = "type_doc";
}



$result = $conn->query("SELECT system_id FROM mctarchive WHERE id LIKE '%{$search_es}%' OR std1 LIKE '%{$search_es}%' OR std2 LIKE '%{$search_es}%' OR std3 LIKE '%{$search_es}%' OR std4 LIKE '%{$search_es}%' OR std5 LIKE '%{$search_es}%'
OR std4 LIKE '%{$search_es}%' OR std5 LIKE '%{$search_es}%' OR std6 LIKE '%{$search_es}%' OR thainame LIKE '%{$search_es}%' OR engname LIKE '%{$search_es}%' 
AND teacher = '$search_teacher' AND sec = '$search_year' AND type_doc = '$search_typeDoc' ORDER BY sec DESC");
$row_cut = $result->num_rows;

$checkQ = "SELECT system_id FROM mctarchive WHERE id LIKE '%{$search_es}%' OR std1 LIKE '%{$search_es}%' OR std2 LIKE '%{$search_es}%' OR std3 LIKE '%{$search_es}%' OR std4 LIKE '%{$search_es}%' OR std5 LIKE '%{$search_es}%'
OR std4 LIKE '%{$search_es}%' OR std5 LIKE '%{$search_es}%' OR std6 LIKE '%{$search_es}%' OR thainame LIKE '%{$search_es}%' OR engname LIKE '%{$search_es}%' 
AND teacher = '$search_teacher' AND sec = '$search_year' AND type_doc = '$search_typeDoc' ORDER BY sec DESC";


$no_of_records_per_page = 12;
$offset = ($page_default - 1) * $no_of_records_per_page;
$total_pages = ceil($row_cut / $no_of_records_per_page);

$sql_search = "SELECT * , mT.teacherName AS mainTn , cT.teacherName AS coTn , cT.nameTitle AS TcoTn , mT.nameTitle AS TmainTn FROM mctarchive
 LEFT JOIN teacher AS mT ON mctarchive.teacher = mT.teacher_id
 LEFT JOIN teacher AS cT ON mctarchive.co_teacher = cT.teacher_id
 LEFT JOIN branch ON mctarchive.branch = branch.branch_id WHERE id LIKE '%{$search_es}%' OR std1 LIKE '%{$search_es}%' OR std2 LIKE '%{$search_es}%' OR std3 LIKE '%{$search_es}%' OR std4 LIKE '%{$search_es}%' OR std5 LIKE '%{$search_es}%'
OR std4 LIKE '%{$search_es}%' OR std5 LIKE '%{$search_es}%' OR std6 LIKE '%{$search_es}%' OR thainame LIKE '%{$search_es}%' OR engname LIKE '%{$search_es}%'
AND teacher = '$search_teacher' AND sec = '$search_year' AND type_doc = '$search_typeDoc' ORDER BY sec ASC LIMIT $offset, $no_of_records_per_page";
$query = mysqli_query($conn, $sql_search);
$result_all = mysqli_query($conn, $sql_search);

$row_cnt = $row_cut;

?>

   <div class="container">
     <div class="row">
      <div class="col-12">
        <div class="jumbotron jumbotron_site mainjum mainvector j-search mt-5">
  <h2 class="display-5"><?php echo $v_websiteName; ?></h2>
  <p class="lead"><?php echo $v_subName; ?></p>
  <hr class="my-4" style="max-width:60%" >
  <h2><i class="bi bi-search"></i> ระบบค้นหา : ค้นหาด้วยคำว่า "<?php echo $search; ?>"</h2>
  <h4 class="">จำนวนผลการค้นหาที่พบ <span class="badge bg-dark text-while no-text-outline"> <?php echo "$row_cnt"; ?></span> รายการ</h4>
</div>
      </div>
     </div>
     <?php include 'searchbox.php';
$cPage = getThisPage();
$cPage = substr($cPage, 0, strpos($cPage, "&page"));
//echo $cPage;
?>
    <div class="row gy-2 gx-2 mt-2">
      <?php include 'topiccard.php';
?>
    <div class="col-12">
      <div class="mt-3 w-100">
      <hr class="mt-4">
      <div class="btn-toolbar w-100" style="justify-content: center; display: flex;" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group my-2 shadow-sm" role="group" aria-label="First group">
         <a class="btn btn-dark" href="<?php echo $cPage ?>&page=1#kokodayo">หน้าแรก</a>


         <a class="btn btn-dark <?php if ($page_default <= 1) {echo 'disabled';}?>"
             href="<?php if ($page_default <= 1) {echo '';} else {echo $cPage . "&page=" . ($page_default - 1);}?>#kokodayo">หน้าที่แล้ว</a>
         </a>

         <?php if ($page_default - 3 > 0) {
    $numtoback = $page_default - 3;
    echo '<a class="btn btn-dark" href="' . $cPage . '&page=' . $numtoback . '#kokodayo">';
    echo $page_default - 3;
    echo "</a>";}
if ($page_default - 2 > 0) {
    $numtoback = $page_default - 2;
    echo '<a class="btn btn-dark" href="' . $cPage . '&page=' . $numtoback . '#kokodayo">';
    echo $page_default - 2;
    echo "</a>";}
if ($page_default - 1 > 0) {
    $numtoback = $page_default - 1;
    echo '<a class="btn btn-dark" href="' . $cPage . '&page=' . $numtoback . '#kokodayo">';
    echo $page_default - 1;
    echo "</a>";}
?>

         <button class="btn btn-dark mx-2"><?php echo "$page_default"; ?></button>

         <?php if ($page_default + 1 <= $total_pages) {
    $numtoback = $page_default + 1;
    echo '<a class="btn btn-dark" href="' . $cPage . '&page=' . $numtoback . '#kokodayo">';
    echo $page_default + 1;
    echo "</a>";}
if ($page_default + 2 <= $total_pages) {
    $numtoback = $page_default + 2;
    echo '<a class="btn btn-dark" href="' . $cPage . '&page=' . $numtoback . '#kokodayo">';
    echo $page_default + 2;
    echo "</a>";}
if ($page_default + 3 <= $total_pages) {
    $numtoback = $page_default + 3;
    echo '<a class="btn btn-dark" href="' . $cPage . '&page=' . $numtoback . '#kokodayo">';
    echo $page_default + 3;
    echo "</a>";}
?>

         <a class="btn btn-dark <?php if ($page_default >= $total_pages) {echo 'disabled';}?>"
              href="<?php if ($page_default >= $total_pages) {echo '#';} else {echo $cPage . "&page=" . ($page_default + 1);}?>#kokodayo">หน้าถัดไป
         </a>
         <a class="btn btn-dark <?php if ($page_default == $total_pages) {echo "disabled";}?>" href="<?php echo $cPage ?>&page=<?php echo $total_pages; ?>#kokodayo">หน้าสุดท้าย</a>
         </div>
    </div>


    <?php include 'footer.php';

?>


    </div>
   </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script type="text/javascript" src="bootstrap5\js\bootstrap.min.js"></script>
    <script type="text/javascript" src="custom\tooltips.js"></script>
  </body>
</html>
<!-- Developed By SiWDOL M. -->
