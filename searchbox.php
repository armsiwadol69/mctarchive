<div class="row">
    <div class="col-12 w-100" hidden>
        <div class="card border-info mb-2 shadow-sm">
            <div class="card-body">
                ขอความกรุณาช่วยตอบแบบสอบถามการใช้งาน เพื่อปรับปรุงและพัฒนาระบบ <a
                    href="https://forms.gle/qMgUfrJ2aCaB4UGb7" target="_blank"
                    class="text-decoration-none">ตอบแบบสอบถาม</a>
            </div>
        </div>
    </div>
    <div class="col-12 w-100">
        <div class="card full-page shadow">
            <div class="card-body">
                <div class="row gx-2 gy-2">

                    <div class="col-lg-12 col-md-12 col-sm-12 my-2">
                        <form method="GET" action="search.php">
                            <div class="row gx-2 gy-2">
                                <div class="col-lg-10 col-sm-12">
                                    <input class="form-control me-2 w-100" type="search" name="search"
                                        placeholder="รหัสประจำเล่ม,ชื่อหัวข้อภาษาไทยหรืออังกฤษ,ชื่อหรือนามสกุลผู้ศึกษา"
                                        value="<?php if (isset($_GET["search"])) {echo $_GET["search"];}?>"
                                        aria-label="Search">
                                </div>
                                <div class="col-lg-2 col-sm-12">
                                    <button class="btn btn-dark w-100" type="submit"><i class="bi bi-search"></i>
                                        ค้นหา</button>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-8 mt-1" hidden>
                                    <label for="text">อาจารย์ที่ปรึกษา</label>
                                    <select name="teacher" id="teacher_sb" class="form-select" required="true">
                                        <option value="teacher">ทั้งหมด</option>
                                        <?php
$sql_allid = "SELECT * FROM teacher WHERE teacher_id != '0' ORDER BY teacherName ASC";
$result_allid = mysqli_query($conn, $sql_allid);
while ($row2 = mysqli_fetch_array($result_allid)) {
    echo '<option value="ห' . $row2["teacher_id"] . '">' . $row2["teacherName"] . '</option>';
}
;
?>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-8 mt-1" hidden>
                                    <label for="text">สาขา</label>
                                    <select name="branch" id="branch_sb" class=" form-select" required="true">
                                        <option value="branch">ทั้งหมด</option>
                                        <?php
$sql_allbranch = "SELECT * FROM branch WHERE branch_id != '0' ORDER BY branch_id ASC";
$result_allbranch = mysqli_query($conn, $sql_allbranch);
while ($row5_branch = mysqli_fetch_array($result_allbranch)) {
    echo '<option value="' . $row5_branch["branch_id"] . '">' . $row5_branch["branchName"] . '</option>';
}
;
?>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-4 mt-1" hidden>
                                    <label for="text">ปีการศึกษา</label>
                                    <select name="year" class="form-control form-select" required="true">
                                        <option value="sec">ทั้งหมด</option>
                                        <?php
$sql_allyear = "SELECT year FROM year ORDER BY year DESC";
$sql_allyearshow = mysqli_query($conn, $sql_allyear);
while ($row3 = mysqli_fetch_array($sql_allyearshow)) {
    echo '<option>' . $row3["year"] . '</option>';
}
;
?>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 mt-1" hidden>
                                    <label for="text">ประเภท</label>
                                    <select name="type_doc" class="form-control form-select">
                                        <option value="1" selected>ปริญญานิพนธ์นักศึกษา</option>
                                        <option value="2">วิจัยอาจารย์</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-12">
                        <hr>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 my-2">
                        <button type="button" onclick="location.href='filter.php?hmedia=show';"
                            class="btn btn-dark h-100 w-100">หัวข้อที่มีไฟล์ผลงานแนบ เช่น วีดีโอ เสียง</button>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 my-2">
                        <button class="btn btn-dark dropdown-toggle w-100 h-100" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            แบ่งตามอาจารย์ที่ปรึกษา
                        </button>
                        <div class="dropdown">

                            <ul class="dropdown-menu scrollable-menu w-100" aria-labelledby="dropdownMenuButton1"
                                style="max-height: 50vh;overflow-y: auto;">
                                <?php
$sql_teacher = "SELECT * FROM teacher WHERE teacher_id != '0' ORDER BY CONVERT(teacherName USING tis620) ASC";
$result_teacher = mysqli_query($conn, $sql_teacher);
while ($name_teacher = mysqli_fetch_array($result_teacher)) {
    echo '<li><a class="dropdown-item" href="filter.php?teacher=' . $name_teacher["teacher_id"] . '&tn=' . $name_teacher["teacherName"] . '">' . $name_teacher["teacherName"] . '</a></li>';
}
;
?>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 my-2">
                        <button class="btn btn-dark dropdown-toggle w-100 h-100" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            ตัวกรองแสดงผล
                        </button>
                        <div class="dropdown">

                            <ul class="dropdown-menu scrollable-menu w-100" aria-labelledby="dropdownMenuButton1"
                                style="max-height: 50vh;overflow-y: auto;">
                                <!--<li><a class="dropdown-item disabled">อาจารย์ที่ปรึกษา</a></li> -->
                                <?php //$result_teacher2 = mysqli_query($conn, $sql_teacher);
//while($name_teacher2 = mysqli_fetch_array($result_teacher2)) {
//echo '<li><a class="dropdown-item" href="filter.php?teacher='.$name_teacher2["name"].'">'.$name_teacher2["name"].'</a></li>';
//};
?>
                                <li><a class="dropdown-item disabled">สาขา</a></li>
                                <?php
$sql_branch = "SELECT * FROM branch WHERE branch_id != '0' ORDER BY branch_id ASC";
$result_branch = mysqli_query($conn, $sql_branch);
while ($name_branch = mysqli_fetch_array($result_branch)) {
    echo '<li><a class="dropdown-item" href="filter.php?branch=' . $name_branch["branch_id"] . '&bn=' . $name_branch["branchName"] . '">' . $name_branch["branchName"] . '</a></li>';
}
;
?>
                                <hr>
                                <li><a class="dropdown-item disabled">ประเภท</a></li>
                                <li><a class="dropdown-item" href="filter.php?type_doc=1">ปริญญานิพนธ์นักศึกษา</a></li>
                                <li><a class="dropdown-item" href="filter.php?type_doc=2">งานวิจัยอาจารย์</a></li>
                                <hr>
                                <li><a class="dropdown-item disabled">ปีการศึกษา</a></li>
                                <?php
$sql_allyearshow = mysqli_query($conn, $sql_allyear);
while ($yaer_sec = mysqli_fetch_array($sql_allyearshow)) {
    echo '<li><a class="dropdown-item" href="filter.php?year=' . $yaer_sec["year"] . '">' . $yaer_sec["year"] . '</a></li>';}?>


                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 my-2">
                        <button class="btn btn-dark dropdown-toggle w-100 h-100" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            ดูทั้งหมด
                        </button>
                        <div class="dropdown">

                            <ul class="dropdown-menu scrollable-menu w-100" aria-labelledby="dropdownMenuButton1"
                                style="max-height: 50vh;overflow-y: auto;">
                                <li><a class="dropdown-item" href="viewAll.php">รูปแบบการ์ด</a></li>
                                <li><a class="dropdown-item" href="viewAllTable.php">รูปแบบตาราง</a></li>
                            </ul>
                        </div>
                    </div>
                    <?php
$sql_setting = "SELECT * FROM setting WHERE var = 'free2uplaod'";
$query_setting = mysqli_query($conn, $sql_setting);
$result_setting = mysqli_fetch_array($query_setting, MYSQLI_ASSOC);
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