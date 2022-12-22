<?php
while($all = mysqli_fetch_array($result_all)) {
  echo '<div class="col-sm-12 col-md-6 col-lg-4 mt-3">';
  echo '<div class="card w-100 h-100 card-font-1 shadow" data-aos="fade-up" data-aos-duration="690">';
  echo '<div class="card-header">';
  echo 'ID : '.$all["id"];
  echo '</div>';
  echo '<div class="card-body d-flex flex-column">';
  echo '<h5 class="card-title">'.'เรื่อง : '.$all["thainame"].'</h5>';
  if (empty($all["engname"] == false)) {
    echo '<h5 class="text-dark">'.'Title : '.$all["engname"].'</h5>';
  } else {echo '<h5 class="card-title">'.'Title : - '.'</h5>';}
  echo '<hr><p class="fw-bold">โดย</p>';
  echo '<p>'.'1.'.$all["std1"].'</p>';
  if (empty($all["std2"] == false)) {
    echo '<p>'.'2.'.$all["std2"].'</p>';
  }
  if (empty($all["std3"] == false)) {
    echo '<p>'.'3.'.$all["std3"].'</p>';
  }
  if (empty($all["std4"] == false)) {
    echo '<p>'.'4.'.$all["std4"].'</p>';
  }
  if (empty($all["std5"] == false)) {
    echo '<p>'.'5.'.$all["std5"].'</p>';
  }
  if (empty($all["std6"] == false)) {
    echo '<p>'.'6.'.$all["std6"].'</p>';
  }
  echo '<hr class="mt-auto">';
  if ($all["type_doc"] == "1") {
    echo '<p class="card-text">อาจารย์ที่ปรึกษา : '.$all["mainTn"].'</p>';
    if(!empty($all["co_teacher"])){
    echo '<p class="card-text">อาจารย์ที่ปรึกษาร่วม : '.$all["coTn"].'</p>';
    }
    echo '<p class="card-text">ประเภท : ปริญญานิพนธ์นักศึกษา</p>';
  }else {
    echo '<p class="card-text">ประเภท : วิจัยอาจารย์</p>';
  }
  echo '<p class="card-text">สาขา : '.$all["branchName"].'</p>';
  echo '<p class="card-text">ปีการศึกษา : '.$all["sec"].'</p>';
  echo '<h6 class="card-text">เนื้อหา : ';
  if (empty($all["pdf"] == false)) {
    echo '<i class="bi bi-file-earmark-check" data-bs-toggle="tooltip" data-bs-placement="top" title="PDF"></i>';
  };
  if (empty($all["video"] == false)) {
    echo ' <i class="bi bi-film" data-bs-toggle="tooltip" data-bs-placement="top" title="Video"></i>';
  };
  if (empty($all["audio"] == false)) {
    echo ' <i class="bi bi-file-music" data-bs-toggle="tooltip" data-bs-placement="top" title="Audio"></i>';
  };
    if (empty($all["site_url"] == false)) {
    echo ' <i class="bi bi-file-code"  data-bs-toggle="tooltip" data-bs-placement="top" title="Website"></i>';
  };
  if (empty($all["yt_link"] == false)) {
    echo ' <i class="bi bi-youtube" data-bs-toggle="tooltip" data-bs-placement="top" title="Youtube"></i>';
  };
  echo '</h6>';
  echo '<a href="view.php?id='.$all["system_id"].'" class="btn btn_clickToView text-white mt-1">รายละเอียด</a>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
};
 ?>
