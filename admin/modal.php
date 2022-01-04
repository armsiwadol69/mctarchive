<?php
$sql_allyear = "SELECT * FROM year ORDER BY year ";
$sql_allyearshow = mysqli_query($conn, $sql_allyear);
$sql_teacher = "SELECT * FROM teacher ORDER BY name ASC";
$result_teacher = mysqli_query($conn, $sql_teacher);
$sql_username = "SELECT * FROM login ORDER BY username ASC";
$result_username = mysqli_query($conn, $sql_username);
$sql_branch = "SELECT * FROM branch ORDER BY no ASC";
$result_branch = mysqli_query($conn, $sql_branch);

$sql_setting = "SELECT setting FROM setting WHERE var = 'free2uplaod'";
$query_setting = mysqli_query($conn,$sql_setting);
$result_setting = mysqli_fetch_array($query_setting,MYSQLI_ASSOC);
 ?>
<div class="row mt-2">
  <div class="col-12">
  <div class="card w-100 shadow-sm">
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 <?php if ($_SESSION["level"] !== "ADMIN") {echo "disabled";} ?>">
          <a type="button" href="add_topic.php" class="btn btn-block btn-primary w-100 my-1"><i class="bi bi-file-plus"></i> เพิ่มข้อมูล ปริญญานิพนธ์/งานวิจัย</a>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 ">
          <button type="button" class="btn btn-block btn-dark w-100 my-1" data-bs-toggle="modal" data-bs-target="#add_teacher"><i class="bi bi-file-earmark-person"></i> เพิ่ม/ลบ ชื่ออาจารย์ที่ปรึกษา</button>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 ">
          <button type="button" class="btn btn-block btn-dark w-100 my-1 <?php if ($_SESSION["level"] !== "ADMIN") {echo "disabled";} ?>" data-bs-toggle="modal" data-bs-target="#add_admin"><i class="bi bi-person-check"></i> เพิ่ม/ลบ บัญชีผู้ใช้</button>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 ">
          <button type="button" class="btn btn-block btn-dark w-100 my-1" data-bs-toggle="modal" data-bs-target="#add_year"><i class="bi bi-calendar-check"></i> เพิ่ม/ลบ ปีการศึกษา</button>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 ">
          <button type="button" class="btn btn-block btn-dark w-100 my-1 <?php if ($_SESSION["level"] !== "ADMIN") {echo "disabled";} ?>" data-bs-toggle="modal" data-bs-target="#add_branch"><i class="bi bi-calendar-check"></i> เพิ่ม/ลบ สาขา</button>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 ">
          <a type="button" class="btn btn-block <?php if ($result_setting["setting"] == 0) {
            echo "btn-danger";}else {echo "btn-success";} ?> w-100 my-1 <?php if ($_SESSION["level"] !== "ADMIN") {echo "disabled";} ?>" href="pub_can_upload.php"><i class="bi bi-gear-wide"></i> <?php if ($result_setting["setting"] == 0) {
            echo "เปิดให้บุคคลทั่วไปเพิ่มข้อมูลได้";
          }else {
            echo "ปิดให้บุคคลทั่วไปเพิ่มข้อมูลได้";
          } ?></a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

    <div class="modal fade" id="add_year" tabindex="-1" role="dialog" aria-labelledby="changlog" aria-hidden="true" >
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="add_year"><i class="bi bi-calendar-check"></i> เพิ่ม/ลบ ปีการศึกษา</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
          <table class="table text-dark table-hover table-striped mx-auto my-auto w-100 align-middle text-center">
                       <tr>
                       <td>ปีการศึกษาที่มีอยู่</td>
                       <td>ลบ</td>
                       </tr>
          <?php
          $sql_allyearshow = mysqli_query($conn, $sql_allyear);
          while($yaer_sec = mysqli_fetch_array($sql_allyearshow)) {
          echo '<tr><td>'.$yaer_sec["year"].'</td>';
          echo "<td>" . '<a type="button" class="btn btn-danger" href="del_ty.php?year='.$yaer_sec["year"].'"><i class="bi bi-trash"></i></a>' .   "</td> " ."</tr>" ;
        }; ?>
      </table>
      </div>
          <form method="post" action="add_year.php">
          <div class="form-row">
            <div class="form-group col-12">
              <label for="name">ปีการศึกษา<span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="year" value="" required>
            </div>
          </div>
 <br>
 <button type="submit" class="btn btn-primary btn-block w-100" action="post">
   เพิ่มปีการศึกษา
 </button>
  </form>
        </div>
      </div>
    </div>
    </div>

    <div class="modal fade" id="add_admin" tabindex="-1" role="dialog" aria-labelledby="changlog" aria-hidden="true" >
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="add_admin"><i class="bi bi-person-check"></i> เพิ่ม/ลบ บัญชีผู้ใช้</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
          <table class="table text-dark table-hover table-striped mx-auto my-auto w-100 align-middle text-center">
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
              echo '<td class="text-secondary">ผู้ใช้งานทั่วไป</td>';
            }
            echo "<td>" . '<a type="button" class="btn btn-danger" href="del_ty.php?username='.$name_username["username"].'"><i class="bi bi-trash"></i></a>' .   "</td> " ."</tr>" ;
        }; ?>
      </table>
      </div>
          <hr>
          <form method="post" action="add_admin.php">
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
              <select type="text" class="form-control form-control form-select" name="level" value="" required>
              <option value="ADMIN">ผู้ดูแลระบบ</option>
              <option value="USER">ผู้ใช้งานทั่วไป</option>
              </select>
            </div>
          </div>
 <br>
 <button type="submit" class="btn btn-primary btn-block w-100" action="post">
   เพิ่มผู้ดูแลระบบ
 </button>
  </form>
        </div>
      </div>
    </div>
    </div>

    <div class="modal fade" id="add_teacher" tabindex="-1" role="dialog" aria-labelledby="changlog" aria-hidden="true" >
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="add_teacher"><i class="bi bi-file-earmark-person"></i> เพิ่ม/ลบ ชื่ออาจารย์ที่ปรึกษา</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
          <table class="table text-dark table-hover table-striped mx-auto my-auto w-100 align-middle text-center">
                       <tr>
                       <td>ชื่ออาจารย์ที่ปรึกษา</td>
                       <td>สาขา</td>
                       <td>ลบ</td>
                       </tr>
          <?php
          $result_teacher2 = mysqli_query($conn, $sql_teacher);
          while($name_teacher2 = mysqli_fetch_array($result_teacher2)) {
            echo '<tr><td>'.$name_teacher2["name"].'</td>';
            echo '<td>'.$name_teacher2["branch"].'</td>';
            echo "<td>" . '<a type="button" class="btn btn-danger" href="del_ty.php?teacher='.$name_teacher2["name"].'"><i class="bi bi-trash"></i></a>' .   "</td> " ."</tr>" ;
        }; ?>
      </table>
      </div>
          <hr>
          <form method="post" action="add_teacher.php">
          <div class="form-row">
            <div class="form-group col-12">
              <label for="name">ชื่ออาจารย์<span class="text-danger">*</span>์</label>
              <input type="text" class="form-control" name="teacher" value="" required>
            </div>
            <div class="form-group col-12">
              <label for="name">สาขา<span class="text-danger">*</span></label>
              <select type="text" class="form-control form-select" name="branch" value="" required>
              <option value="">เลือก..</option>
              <?php
              $sql_allbranch = "SELECT * FROM branch ORDER BY no ASC";
              $result_allbranch = mysqli_query($conn, $sql_allbranch);
              while($row5_branch = mysqli_fetch_array($result_allbranch)) {
              echo '<option>'.$row5_branch["branch"].'</option>';
              };
                     ?>
            </select>
            </div>
          </div>

 <br>
 <button type="submit" class="btn btn-primary btn-block w-100" action="post">
   เพิ่มชื่ออาจารย์ที่ปรึกษา
 </button>
  </form>
        </div>
      </div>
    </div>
    </div>

    <div class="modal fade" id="add_branch" tabindex="-1" role="dialog" aria-labelledby="changlog" aria-hidden="true" >
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="add_teacher"><i class="bi bi-file-earmark-person"></i> เพิ่ม/ลบ สาขา</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
          <table class="table text-dark table-hover table-striped mx-auto my-auto w-100 align-middle text-center">
                       <tr>
                       <td>สาขา</td>
                       <td>ลบ</td>
                       </tr>
          <?php
          $result_branch = mysqli_query($conn, $sql_branch);
          while($name_branch = mysqli_fetch_array($result_branch)) {
            echo '<tr><td>'.$name_branch["branch"].'</td>';
            echo "<td>" . '<a type="button" class="btn btn-danger" href="del_ty.php?branch='.$name_branch["branch"].'"><i class="bi bi-trash"></i></a>' .   "</td> " ."</tr>" ;
        }; ?>
      </table>
      </div>
          <hr>
          <form method="post" action="add_branch.php">
          <div class="form-row">
            <div class="form-group col-12">
              <label for="name">ชื่อสาขา<span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="branch" value="" required>
            </div>
          </div>

  <br>
  <button type="submit" class="btn btn-primary btn-block w-100" action="post">
   เพิ่มสาขา
  </button>
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
      <object class="rounded" style="height:69vh;" data="..\storage\etc\how2admin.pdf" type="application/pdf" width="100%">
      <p>อุปกรณ์ของคุณไม่รองรับการดูไฟล์ .pdf <a href="">คลิกที่นี้เพื่อดูหรือดาวน์โหลด!</a></p>
     </object>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
