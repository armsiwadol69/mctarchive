<?php

include 'commonfPub.php';
$json_data = readSettingJSON2MainPage();
extract($json_data);

ob_start();
$search = strval($_POST["search"]) ;
if (empty($search) == 1) {
  header( "location: index.php" );
  exit(0);
}else {
  //echo $search;
}
if ($search == "MeenThaiSubNo1") {
  header( "location: https://www.youtube.com/watch?v=ZL9r5SQQSd4&t=69s" );
  exit(0);
}elseif ($search == "GiveYouUp") {
  header( "location: https://youtu.be/h0Spm7fPau8?t=19" );
}elseif ($search == "Siwadol69") {
  header( "location: https://youtu.be/4QXCPuwBz2E?t=48" );
}elseif ($search == "Chakitsopon13") {
  header( "location: https://youtu.be/0YF8vecQWYs?t=59" );
}elseif ($search == "NutZ308") {
  header( "location: https://www.facebook.com/HowtoSLEEP/videos/2732432693534881" );
}elseif ($search == "Nichapat") {
  header( "location: https://youtu.be/fTczCpIaLAU?t=62" );
}


  //echo $search;


include 'conn.php';
$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
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
    <title>ค้นหา : <?php echo "$search"; ?> | <?php echo $v_websiteName.' '.$v_subName?></title>
    <meta property="og:title" content="ค้นหา : <?php echo "$search"; ?> | <?php echo $v_websiteName.' '.$v_subName?>" />
    <meta property="og:description" content="<?php echo $v_websiteName.' '.$v_subName?>"/>
    <meta property="og:image" content="favicon.png" />
  </head>
  <body>
 <?php
 include'navbar.php';
 $search_es = mysqli_real_escape_string($conn,$_POST["search"]);
 $sql_search = "SELECT * , mT.teacherName AS mainTn , cT.teacherName AS coTn FROM mctarchive
 LEFT JOIN teacher AS mT ON mctarchive.teacher = mT.teacher_id
 LEFT JOIN teacher AS cT ON mctarchive.co_teacher = cT.teacher_id
 LEFT JOIN branch ON mctarchive.branch = branch.branch_id WHERE id LIKE '%{$search_es}%' OR std1 LIKE '%{$search_es}%' OR std2 LIKE '%{$search_es}%' OR std3 LIKE '%{$search_es}%' OR std4 LIKE '%{$search_es}%' OR std5 LIKE '%{$search_es}%'
 OR std4 LIKE '%{$search_es}%' OR std5 LIKE '%{$search_es}%' OR std6 LIKE '%{$search_es}%' OR thainame LIKE '%{$search_es}%' OR engname LIKE '%{$search_es}%' OR teacher LIKE '%{$search_es}%' OR sec LIKE '%{$search_es}%' ORDER BY id ASC";
 $query = mysqli_query($conn,$sql_search);
 $result_all = mysqli_query($conn, $sql_search);
 $row_cnt = $result_all->num_rows;
  ?>

   <div class="container">
     <div class="row">
      <div class="col-12">
        <div class="jumbotron jumbotron_site mainjum mainvector j-search mt-5">
  <h2 class="display-5"><?php echo $v_websiteName;?></h2>
  <p class="lead"><?php echo $v_subName;?></p>
  <hr class="my-4" style="max-width:70%" >
  <h2><i class="bi bi-search"></i> ระบบค้นหา : ค้นหาด้วยคำว่า "<?php echo$search; ?>"</h2>
  <h4 class="">จำนวนผลการค้นหาที่พบ <span class="badge bg-dark text-while no-text-outline"> <?php echo "$row_cnt"; ?></span> รายการ</h4>
</div>
      </div>
     </div>
     <?php include 'searchbox.php'; ?>
    <div class="row">
      <?php
            include'topiccard.php';
            ?>

    <?php include'footer.php'; ?>

    </div>
   </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script type="text/javascript" src="bootstrap5\js\bootstrap.min.js"></script>
    <script type="text/javascript" src="custom\tooltips.js"></script>
  </body>
</html>
<!-- Developed By SiWDOL M. -->
