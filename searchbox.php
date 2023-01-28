<div class="row">
    <div class="col-12 w-100">
        <div class="card border-info mb-2 shadow-sm">
          <div class="card-body">
          ขอความกรุณาช่วยตอบแบบสอบถามการใช้งาน เพื่อปรับปรุงและพัฒนาระบบ <a href="https://forms.gle/qMgUfrJ2aCaB4UGb7" target="_blank" class="text-decoration-none">ตอบแบบสอบถาม</a> 
          </div>
        </div>
    </div>
    <div class="col-12 w-100">
        <div class="card full-page shadow">
            <div class="card-body">
                <div class="row d-flex">
                    <div class="col-lg-10 col-md-8 col-sm-12 my-2">
                        <form class="d-flex" method="post" action="search.php">
                            <input class="form-control me-2" type="search" name="search"
                                placeholder="ID,ชื่อ,นามสกุล,ปีการศึกษา,อาจารย์ที่ปรึกษา" aria-label="Search">
                            <button class="btn btn-dark" type="submit"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-12 my-2">
                        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle w-100" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                ตัวกรองแสดงผล
                            </button>
                            <ul class="dropdown-menu scrollable-menu" aria-labelledby="dropdownMenuButton1">
                                <!--<li><a class="dropdown-item disabled">อาจารย์ที่ปรึกษา</a></li> -->
                                <?php //$result_teacher2 = mysqli_query($conn, $sql_teacher);
//while($name_teacher2 = mysqli_fetch_array($result_teacher2)) {
//echo '<li><a class="dropdown-item" href="filter.php?teacher='.$name_teacher2["name"].'">'.$name_teacher2["name"].'</a></li>';
//};
?>
                                <li><a class="dropdown-item disabled">สาขา</a></li>
                                <?php
 $sql_branch = "SELECT * FROM branch ORDER BY branch_id ASC";
 $result_branch = mysqli_query($conn, $sql_branch);
 while($name_branch = mysqli_fetch_array($result_branch)) {
 echo '<li><a class="dropdown-item" href="filter.php?branch='.$name_branch["branch_id"].'&bn='.$name_branch["branchName"].'">'.$name_branch["branchName"].'</a></li>';
 };
  ?>
                                <hr>
                                <li><a class="dropdown-item disabled">ปีการศึกษา</a></li>
                                <?php
$sql_allyearshow = mysqli_query($conn, $sql_allyear);
while($yaer_sec = mysqli_fetch_array($sql_allyearshow)) {
echo '<li><a class="dropdown-item" href="filter.php?year='.$yaer_sec["year"].'">'.$yaer_sec["year"].'</a></li>';} ?>
                                <hr>
                                <li><a class="dropdown-item disabled">ประเภท</a></li>
                                <li><a class="dropdown-item" href="filter.php?type_doc=1">ปริญญานิพนธ์นักศึกษา</a></li>
                                <li><a class="dropdown-item" href="filter.php?type_doc=2">วิจัยอาจารย์</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 my-2">
                        <a href="filter.php?type_doc=1" class="btn btn-dark  w-100">ปริญญานิพนธ์นักศึกษา</a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 my-2">
                        <a href="filter.php?type_doc=2" class="btn btn-dark  w-100">วิจัยอาจารย์</a>
                    </div>
                    <?php
$sql_setting = "SELECT * FROM setting WHERE var = 'free2uplaod'";
$query_setting = mysqli_query($conn,$sql_setting);
$result_setting = mysqli_fetch_array($query_setting,MYSQLI_ASSOC);
if ($result_setting['setting'] == "1") {
echo '
<div class="col-lg-12 col-md-12 col-sm-12 my-2">
<a href="pub_add_topic.php" class="btn btn-success w-100">เพิ่มข้อมูล ปริญญานิพนธ์นักศึกษา/วิจัยอาจารย์</a>
</div>
';
}
 ?>
                </div>
            </div>
        </div>
    </div>
</div>