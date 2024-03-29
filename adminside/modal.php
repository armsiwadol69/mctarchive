<?php
$sql_allyear = "SELECT * FROM year ORDER BY year DESC";
$sql_allyearshow = mysqli_query($conn, $sql_allyear);
$sql_teacher = "SELECT teacher.*,MIN(teacherName), branch.branchName, mctarchive.system_id FROM teacher
LEFT JOIN branch ON teacher.branch = branch.branch_id 
LEFT JOIN mctarchive ON mctarchive.teacher = teacher_id OR mctarchive.co_teacher = teacher_id
WHERE teacher_id != 0 
GROUP BY teacher_id
ORDER BY CONVERT(MIN(teacherName) USING tis620) ASC";
$result_teacher = mysqli_query($conn, $sql_teacher);
$sql_username = "SELECT login.* , MIN(user_id) , mctarchive.system_id FROM login 
LEFT JOIN mctarchive ON mctarchive.add_by = user_id
GROUP BY user_id
ORDER BY MIN(user_id) ASC";
$result_username = mysqli_query($conn, $sql_username);
$sql_branch = "SELECT branch.* , MIN(branch_id) , mctarchive.system_id FROM branch 
LEFT JOIN mctarchive ON mctarchive.branch = branch_id
WHERE branch_id != 0 
GROUP BY branch_id
ORDER BY MIN(branch_id) ASC";
$result_branch = mysqli_query($conn, $sql_branch);

$sql_setting = "SELECT setting FROM setting WHERE var = 'free2uplaod'";
$query_setting = mysqli_query($conn,$sql_setting);
$result_setting = mysqli_fetch_array($query_setting,MYSQLI_ASSOC);

if ($_SESSION["level"] !== "ADMIN") {$permission = " disabled";} else {
    $permission = "";
};
 ?>

<div class="modal fade" id="add_year" tabindex="-1" role="dialog" aria-labelledby="changlog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_year"><i class="bi bi-calendar-check"></i> เพิ่ม/ลบ ปีการศึกษา</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive" style="max-height : 50vh;overflow-y: auto;">
                    <table
                        class="table text-dark table-hover table-striped mx-auto my-auto w-100 align-middle text-center">
                        <tr>
                            <td>ปีการศึกษา</td>
                            <td>ลบ</td>
                        </tr>
                        <?php
          $sql_allyearshow = mysqli_query($conn, $sql_allyear);
          while($yaer_sec = mysqli_fetch_array($sql_allyearshow)) {
          echo '<tr><td>'.$yaer_sec["year"].'</td>';
          echo "<td>" . '<a type="button" class="btn btn-danger'.$permission.'" onclick="delYear('.$yaer_sec["year"].')"><i class="bi bi-trash"></i></a>' .   "</td> " ."</tr>" ;
        }; ?>
                    </table>
                </div>
                <form method="post" action="add_year.php" onsubmit="return checkForm(this);">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="name">ปีการศึกษา<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="year" value="" required>
                        </div>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary btn-block w-100" value="เพิ่มปีการศึกษา" id="btnSubmitYear">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add_admin" tabindex="-1" role="dialog" aria-labelledby="changlog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_admin"><i class="bi bi-person-check"></i> เพิ่ม/ลบ บัญชีผู้ใช้</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table
                        class="table text-dark table-hover table-striped mx-auto my-auto w-100 align-middle text-center">
                        <tr>
                            <td>รายชื่อผู้ใช้งานระบบ</td>
                            <td>ชื่อ</td>
                            <td>ระดับ</td>
                            <td>ลบ</td>
                        </tr>
                        <?php
          $result_username = mysqli_query($conn, $sql_username);
          while($name_username = mysqli_fetch_array($result_username)) {
            echo '<tr><td>'.$name_username["username"].'</td>';
            echo '<td>'.$name_username["name"].'</td>';
            if ($name_username["level"] == "ADMIN") {
              echo '<td class="text-primary">ผู้ดูแลระบบ</td>';
            }else {
              echo '<td class="text-secondary">ผู้เพิ่มข้อมูล</td>';
            }
            if(empty($name_username["system_id"])){
            echo "<td>" . '<a type="button" class="btn btn-danger" onclick="delUser('.$name_username["user_id"].')"><i class="bi bi-trash"></i></a>' .   "</td> " ."</tr>" ;
            }else{
            echo '<td data-bs-toggle="tooltip" data-bs-placement="top" title="ลบไม่ได้ มีรายการที่เกี่ยวข้อง">' . '<a type="button" class="btn btn-danger disabled" onclick="delUser('.$name_username["user_id"].')"><i class="bi bi-trash"></i></a>' .   "</td> " ."</tr>" ;
            }
        }; ?>
                    </table>
                </div>
                <hr>
                <form method="post" action="add_admin.php" onsubmit="return checkForm(this);">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="name">Username<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="username" value="" required>
                        </div>
                        <div class="form-group col-12">
                            <label for="name">Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password" value="" required>
                        </div>
                        <div class="form-group col-12">
                            <label for="name">ชื่อ<span class="text-danger">*</span></label>
                            <input type="name" class="form-control" name="name" value="" required>
                        </div>
                        <div class="form-group col-12">
                            <label for="name">ระดับ<span class="text-danger">*</span></label>
                            <select type="text" class="form-control form-control form-select" name="level" value=""
                                required>
                                <option value="ADMIN">ผู้ดูแลระบบ</option>
                                <option value="USER">ผู้เพิ่มข้อมูล</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary btn-block w-100" value="สร้างบัญชีผู้ใช้งาน" id="btnSubmitUser_old">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add_teacher" tabindex="-1" role="dialog" aria-labelledby="changlog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_teacher"><i class="bi bi-file-earmark-person"></i> เพิ่ม/ลบ
                    ชื่ออาจารย์ที่ปรึกษา</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive" style="max-height : 50vh;overflow-y: auto;">
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
            echo "<td>" . '<a type="button" class="btn btn-warning '.'"  href="teacher.php?edit=1&Tid='.$name_teacher2["teacher_id"].'""><i class="bi bi-pencil"></i></a>' .   "</td> ";
            if(empty($name_teacher2["system_id"])){
                echo "<td>" . '<a type="button" class="btn btn-danger '. $permission.'" onclick="delTeacher('.$name_teacher2["teacher_id"].')"><i class="bi bi-trash"></i></a>' .   "</td> " ."</tr>" ;
                }else{
                echo '<td  data-bs-toggle="tooltip" data-bs-placement="top" title="ลบไม่ได้ มีรายการที่เกี่ยวข้อง">' . '<a type="button" class="btn btn-danger disabled'. $permission.'" onclick="delTeacher('.$name_teacher2["teacher_id"].')"><i class="bi bi-trash"></i></a>' .   "</td> " ."</tr>" ;    
                }
        }; ?>
                                        </table>
                </div>
                <p class="mt-2">ชื่ออาจารย์ที่ปรึกษาที่ลบไม่ได้ เนื่องจาก อาจารย์ที่ปรึกษาเกี่ยวข้องกับข้อมูลข้อมูลปริญญานิพนธ์หรืองานวิจัย อย่างน้อย 1 หัวข้อ เช่น เป็นที่ปรึกษา หรือ ที่ปรึกษาร่วม</p>
                <hr>
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

<div class="modal fade" id="add_branch" tabindex="-1" role="dialog" aria-labelledby="changlog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_teacher"><i class="bi bi-list-stars"></i> เพิ่ม/ลบ สาขา</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table
                        class="table text-dark table-hover table-striped mx-auto my-auto w-100 align-middle text-center">
                        <tr>
                            <td>สาขา</td>
                            <td>ลบ</td>
                        </tr>
                        <?php
          $result_branch = mysqli_query($conn, $sql_branch);
          while($name_branch = mysqli_fetch_array($result_branch)) {
            echo '<tr><td>'.$name_branch["branchName"].'</td>';
            if(empty($name_branch["system_id"])){
            echo "<td>" . '<a type="button" class="btn btn-danger" onclick="delBranch('.$name_branch["branch_id"].')"><i class="bi bi-trash"></i></a>' .   "</td> " ."</tr>" ;
            }else{
            echo '<td data-bs-toggle="tooltip" data-bs-placement="top" title="ลบไม่ได้ มีรายการที่เกี่ยวข้อง">' . '<a type="button" class="btn btn-danger disabled" onclick="delBranch('.$name_branch["branch_id"].')"><i class="bi bi-trash"></i></a>' .   "</td> " ."</tr>" ;    
            }
        }; ?>
                    </table>
                </div>
                <p class="mt-2">สาขาที่ลบไม่ได้ เนื่องจากสาขานั้นมีข้อมูลข้อมูลปริญญานิพนธ์หรืองานวิจัย ที่เกี่ยวข้องอย่างน้อย 1 ราย</p>
                <hr>
                <form method="post" action="add_branch.php" onsubmit="return checkForm(this);">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="name">ชื่อสาขา<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="branch" value="" required>
                        </div>
                    </div>

                    <br>
                    <input type="submit" class="btn btn-primary btn-block w-100" value="เพิ่มข้อมูลสาขา" id="btnSubmitBranch">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="how2use_admin" tabindex="-1" aria-labelledby="how2use" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="how2use_admin">วีธีการใช้งาน : ผู้ดูแลระบบ <?php
            $memes_1 = rand(1,100);
            if ($memes_1 == 69) {
              echo "ดูแลเธอสู้คนๆนั้นไม่ได้หรอก :)";
            } ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6>หากไม่ขึ้น ให้สลับ Tab</h6>
                <object class="rounded" style="height:69vh;" data="..\storage\etc\how2admin.pdf" type="application/pdf"
                    width="100%">
                    <p>อุปกรณ์ของคุณไม่รองรับการดูไฟล์ .pdf <a
                            href="..\storage\etc\how2admin.pdf">คลิกที่นี้เพื่อดูหรือดาวน์โหลด!</a></p>
                </object>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>