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
    <title><?php echo $v_websiteName.' '.$v_subName?></title>
    <meta property="og:title" content="<?php echo $v_websiteName.' '.$v_subName?>" />
    <meta property="og:description" content="<?php echo $v_websiteName.' '.$v_subName?>"/>
    <meta property="og:image" content="favicon.png" />
    <link rel="stylesheet" type="text/css" href="custom/DataTables/datatables.min.css" />
    <style>
      table.dataTable thead th, table.dataTable thead td, table.dataTable tfoot th, table.dataTable tfoot td {text-align: left !important;}
    </style>
  </head>
  <body>
 <?php
 include'navbar.php';
 $result = $conn->query("SELECT id FROM mctarchive ORDER BY id");
 $row_cnt = $result->num_rows;
  ?>

   <div class="container">
     <div class="row">
      <div class="col-12">
        <div class="jumbotron jumbotron_site mainjum mainvector mt-4">
  <h2 class="display-5"><?php echo $v_websiteName;?></h2>
  <p class="lead"><?php echo $v_subName;?></p>
  <hr class="my-4" style="max-width:60%" >
  <h4 class="">มีปริญญานิพนธ์และงานวิจัยที่ถูกจัดเก็บเป็นจำนวน <span class="badge bg-dark text-while no-text-outline"> <?php echo "$row_cnt"; ?></span> รายการ</h4>
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
           }elseif ($add_tt == "1") {
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
     <?php include 'searchbox.php'; ?>
    <div class="row" id="kokodayo" name="kokodayo">
            <div class="col-12" id="mctArchive" data-aos="fade-up" data-aos-duration="500">
                        <div class="card shadow-sm my-2" id="displayed" name="displayed">
                            <h5 class="card-header">รายการทั้งหมดที่ถูกแสดงผล</h5>
                            <div class="card-body">
                                <div class="table-responsive px-1 py-1">
                                    <table
                                        class="table text-dark table-hover table-striped my-auto w-100"
                                        id="table_1">
                                        <thead>
                                            <tr>
                                                <td>รหัสประจําเล่ม</td>
                                                <td>หัวข้อ</td>
                                                <!-- <td>ผู้ศึกษา</td> -->
                                                <td>อาจารย์ที่ปรึกษา</td>
                                                <td>สาขา</td>
                                                <td>ปีการศึกษา</td>
                                                <td>ประเภท</td>
                                                <!-- <td>ดู</td> -->
                                            </tr>
                                        </thead>
                                        <?php
//$sql_all = "SELECT * FROM mctarchive LEFT JOIN branch ON mctarchive.branch = branch.branch_id ORDER BY add_date DESC LIMIT $offset, $no_of_records_per_page";
$sql_all = "SELECT * , mT.teacherName AS mainTn , cT.teacherName AS coTn , cT.nameTitle AS TcoTn , mT.nameTitle AS TmainTn FROM mctarchive
LEFT JOIN teacher AS mT ON mctarchive.teacher = mT.teacher_id
LEFT JOIN teacher AS cT ON mctarchive.co_teacher = cT.teacher_id
LEFT JOIN branch ON mctarchive.branch = branch.branch_id
ORDER BY sec DESC";
//$sql_all = "SELECT * FROM mctarchive ORDER BY id ASC";
$query = mysqli_query($conn,$sql_all);
$result_all = mysqli_query($conn, $sql_all);
while ($all = mysqli_fetch_array($result_all)) {
    echo "<tr>" . "<td>" . $all["id"] . "</td> ";
    echo '<td><a class="text-decoration-none text-success fw-bold" href="view.php?id='.$all["system_id"].'">' . $all["thainame"] . "</a></td> ";
   // echo "<td>" .$all["std1"] . '<br>'.$all["std2"] . '<br>'.$all["std3"] . '<br>'.$all["std4"] . '<br>'.$all["std5"] . '<br>'.$all["std6"] .  "</td> ";
    echo "<td>" . $all["TmainTn"].$all["mainTn"] . "</td> ";
    echo "<td>" . $all["branchName"] . "</td> ";
    echo "<td>" . $all["sec"] . "</td> ";
    if ($all["type_doc"] == "1") {
      echo "<td>ปริญญานิพนธ์นักศึกษา</td>";
  } else {
      echo "<td>วิจัยอาจารย์</td>";}
    echo "</tr>";
    //echo "<td>" . '<a type="button" class="btn btn-info" target="_blank" href="view.php?id=' . $all["system_id"] . '"><i class="bi bi-eye"></i></a>' . "</td> ";
}
;
?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php include 'footer.php'; ?>
      </div>
    </div>
    </div>
    
   </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script type="text/javascript" src="bootstrap5\js\bootstrap.min.js"></script>
    <script type="text/javascript" src="custom\tooltips.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js"
        integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="custom/DataTables/datatables.min.js"></script>
    <script type="text/javascript">
       $(document).ready(function() {
        $('#table_1').DataTable({
            //"ordering": false,
            order: [[4, 'desc']],
            pageLength: 10
        });
    });
    </script>
  </body>
</html>
<!-- Developed By SiWDOL M. -->
