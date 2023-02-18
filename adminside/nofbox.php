<?php

if (isset($_GET["add_admin"]) == "1") {
    $admin_set_ok = $_GET["add_admin"];
    if ($admin_set_ok == "1") {
        echo '
       <div class="alert alert-success alert-dismissible w-100 shadow-sm" role="alert">
       เพิ่มบัญชีผู้ใช้งานระบบสำเร็จ
       </div>
       ';
    } elseif ($admin_set_ok == "0") {
        echo '
       <div class="alert alert-danger alert-dismissible w-100 shadow-sm" role="alert">
       ไม่สามารถบัญชีผู้ใช้งานระบบได้
       </div>
       '
        ;
    } elseif ($admin_set_ok == "2") {
        echo '
       <div class="alert alert-danger alert-dismissible w-100 shadow-sm" role="alert">
       คุณไม่ได้กรอบข้อมูลหรือกรอกข้อมูลไม่ครบ
       </div>
       '
        ;
    } elseif ($admin_set_ok == "3") {
        echo '
       <div class="alert alert-success alert-dismissible w-100 shadow-sm" role="alert">
       บันทึกการแก้ไขข้อมูลบัญชีผู้ใช้สำเร็จ
       </div>
       '
        ;
    }
     elseif ($admin_set_ok == "4") {
        echo '
       <div class="alert alert-success alert-dismissible w-100 shadow-sm" role="alert">
       เปลี่ยนสถานะบัญชีสำเร็จ
       </div>
       '
        ;
    }
}

if (isset($_GET["add_teacher"]) == 1) {
    $teacher_set_ok = $_GET["add_teacher"];
    if ($teacher_set_ok == "1") {
        echo '
       <div class="alert alert-success alert-dismissible w-100 shadow-sm" role="alert">
       เพิ่มชื่ออาจารย์ที่ปรึกษาสำเร็จ
       </div>
       ';
    } elseif ($teacher_set_ok == "0") {
        echo '
       <div class="alert alert-danger alert-dismissible w-100 shadow-sm" role="alert">
       ไม่สามารถเพิ่มชื่ออาจารย์ที่ปรึกษาได้
       </div>
       ';
    } elseif ($teacher_set_ok == "2") {
        echo '
       <div class="alert alert-danger alert-dismissible w-100 shadow-sm" role="alert">
       คุณไม่ได้กรอบข้อมูลหรือกรอกข้อมูลไม่ครบ
       </div>
       '
        ;
    } elseif ($teacher_set_ok == "4") {
        echo '
       <div class="alert alert-success alert-dismissible w-100 shadow-sm" role="alert">
       บันทึกการแก้ไขข้อมูลอาจารย์ที่ปรึกษาสำเร็จ
       </div>
       '
        ;
    }
}

if (isset($_GET["add_year"]) == 1) {
    $year_set_ok = $_GET["add_year"];
    if ($year_set_ok == "1") {
        echo '
         <div class="alert alert-success alert-dismissible w-100 shadow-sm" role="alert">
         เพิ่มปีการศึกษาสำเร็จ
         </div>
         ';
    } elseif ($year_set_ok == "0") {
        echo '
         <div class="alert alert-danger alert-dismissible w-100 shadow-sm" role="alert">
         ไม่สามารถเพิ่มปีการศึกษาได้
         </div>
         ';
    } elseif ($year_set_ok == "2") {
        echo '
         <div class="alert alert-danger alert-dismissible w-100 shadow-sm" role="alert">
         คุณไม่ได้กรอบข้อมูลหรือกรอกข้อมูลไม่ครบ
         </div>
         '
        ;
    }
}

if (isset($_GET["add_branch"]) == 1) {
    $add_branch = $_GET["add_branch"];
    if ($add_branch == "1") {
        echo '
           <div class="alert alert-success alert-dismissible w-100 shadow-sm" role="alert">
           เพิ่มสาขาสำเร็จ
           </div>
           ';
    } elseif ($add_branch == "0") {
        echo '
           <div class="alert alert-danger alert-dismissible w-100 shadow-sm" role="alert">
           ไม่สามารถเพิ่มสาขาได้
           </div>
           ';
    } elseif ($add_branch == "2") {
        echo '
           <div class="alert alert-danger alert-dismissible w-100 shadow-sm" role="alert">
           คุณไม่ได้กรอบข้อมูลหรือกรอกข้อมูลไม่ครบ
           </div>
           '
        ;
    }
}

if (isset($_GET["del_topic"]) == 1) {
    $del_topic = $_GET["del_topic"];
    if ($del_topic == "1") {
        echo '
         <div class="alert alert-success alert-dismissible w-100 shadow-sm" role="alert">
         ลบข้อมูลสำเร็จ
         </div>
         ';
    } elseif ($del_topic == "0") {
        echo '
         <div class="alert alert-danger alert-dismissible w-100 shadow-sm" role="alert">
         ไม่สามารถลบข้อมูลได้
         </div>
         ';
    }
}

if (isset($_GET["del_files"]) == 1) {
    $del_files = $_GET["del_files"];
    if ($del_files == "1") {
        echo '
          <div class="alert alert-success alert-dismissible w-100 shadow-sm" role="alert">
          ลบข้อมูลสำเร็จ
          </div>
          ';
    } elseif ($del_files == "0") {
        echo '
          <div class="alert alert-danger alert-dismissible w-100 shadow-sm" role="alert">
          ไม่สามารถลบข้อมูลได้
          </div>
          ';
    }
}

if (isset($_GET["upload_topic"]) == 1) {
    $upload_topic_ok = $_GET["upload_topic"];
    if ($upload_topic_ok == "0") {
        echo '
           <div class="alert alert-danger alert-dismissible w-100 shadow-sm" role="alert">
           ไม่สามารถข้อมูล ปริญญานิพนธ์หรืองานวิจัยได้ โปรดตรวจสอบว่า ID ที่ท่านกรอกนั้น มีอยู่แล้วหรือไม่
           </div>
           ';
    } elseif ($upload_topic_ok == "1") {
        echo '
           <div class="alert alert-success alert-dismissible w-100 shadow-sm" role="alert">
           เพิ่มข้อมูล ปริญญานิพนธ์หรืองานวิจัย สำเร็จ
           </div>
           '
        ;
    }
}

if (isset($_GET["update_topic"]) == 1) {
    $update_topic_ok = $_GET["update_topic"];
    if ($update_topic_ok == "0") {
        echo '
             <div class="alert alert-danger alert-dismissible w-100 shadow-sm" role="alert">
             ไม่สามารถแก้ไขข้อมูลได้
             </div>
             ';
    } elseif ($update_topic_ok == "1") {
        echo '
             <div class="alert alert-success alert-dismissible w-100 shadow-sm" role="alert">
             แก้ไขข้อมูลสำเร็จ
             </div>
             '
        ;
    }
}
if (isset($_GET["del_year"]) == 1) {
    $del_year = $_GET["del_year"];
    if ($del_year == "0") {
        echo '
               <div class="alert alert-danger alert-dismissible w-100 shadow-sm" role="alert">
               ไม่สามารถลบปีการศึกษาได้
               </div>
               ';
    } elseif ($del_year == "1") {
        echo '
               <div class="alert alert-success alert-dismissible w-100 shadow-sm" role="alert">
               ลบปีการศึกษาสำเร็จ
               </div>
               '
        ;
    }
}
if (isset($_GET["del_teacher"]) == 1) {
    $del_teacher = $_GET["del_teacher"];
    if ($del_teacher == "0") {
        echo '
                 <div class="alert alert-danger alert-dismissible w-100 shadow-sm" role="alert">
                 ไม่สามารถลบชื่ออาจารย์ที่ปรึกษาได้
                 </div>
                 ';
    } elseif ($del_teacher == "1") {
        echo '
                 <div class="alert alert-success alert-dismissible w-100 shadow-sm" role="alert">
                 ลบชื่ออาจารย์ที่ปรึกษาสำเร็จ
                 </div>
                 '
        ;
    }
}
if (isset($_GET["del_admin"]) == 1) {
    $del_admin = $_GET["del_admin"];
    if ($del_admin == "0") {
        echo '
                   <div class="alert alert-danger alert-dismissible w-100 shadow-sm" role="alert">
                   ไม่สามารถลบผู้ดูแลระบบได้
                   </div>
                   ';
    } elseif ($del_admin == "1") {
        echo '
                   <div class="alert alert-success alert-dismissible w-100 shadow-sm" role="alert">
                   ลบผู้ดูแลระบบสำเร็จ
                   </div>
                   '
        ;
    }
}
if (isset($_GET["cs"]) == 1) {
    $cs = $_GET["cs"];
    if ($cs == "0") {
        echo '
                     <div class="alert alert-danger alert-dismissible w-100 shadow-sm" role="alert">
                     ไม่สามารถปรับเปลี่ยนการแสดงผลข้อมูล
                     </div>
                     ';
    } elseif ($cs == "1") {
        echo '
                     <div class="alert alert-success alert-dismissible w-100 shadow-sm" role="alert">
                     ปรับเปลี่ยนการแสดงผลข้อมูลสำเร็จ
                     </div>
                     '
        ;
    }
}
if (isset($_GET["del_branch"]) == 1) {
    $del_branch = $_GET["del_branch"];
    if ($del_branch == "0") {
        echo '
                       <div class="alert alert-danger alert-dismissible w-100 shadow-sm" role="alert">
                       ไม่สามารถลบสาขาได้
                       </div>
                       ';
    } elseif ($del_branch == "1") {
        echo '
                       <div class="alert alert-success alert-dismissible w-100 shadow-sm" role="alert">
                       ลบสาขาสำเร็จ
                       </div>
                       '
        ;
    }
}

if (isset($_GET["savesetting"]) == "1") {
    $savesetting = $_GET["savesetting"];
    if ($savesetting == "1") {
        echo '
    <div class="alert alert-success alert-dismissible w-100 shadow-sm" role="alert">
    บันทึกการตั้งค่าสำเร็จ
    </div>
    ';
    } elseif ($savesetting == "0") {
        echo '
    <div class="alert alert-danger alert-dismissible w-100 shadow-sm" role="alert">
    ไม่สามารถบันทึกการตั้งค่าได้
    </div>
    '
        ;
    }
}
