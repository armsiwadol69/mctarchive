function delDataOfTopic(system_id,id,topicName) {
    let text = "ยืนยันการลบข้อมูลหรือไม่? \nเมื่อลบแล้วจะไม่สามารถกู้คืนได้";
    if (confirm(text) == true) {
      text = "You pressed OK!";
      window.location = "adminside\\del_topic.php?idtodel="+system_id+"&nid="+id+"&topicName="+topicName;
    } else {
      //text = "You canceled!";
    }
  }

  function delDataPreOfTopic(system_id,id,topicName) {
    let text = "ยืนยันการลบข้อมูลหรือไม่? \nเมื่อลบแล้วจะไม่สามารถกู้คืนได้";
    if (confirm(text) == true) {
      text = "You pressed OK!";
      window.location = "adminside\\del_topic.php?preview=1&idtodel="+system_id+"&nid="+id+"&topicName="+topicName;
    } else {
      //text = "You canceled!";
    }
  }
  
  function delYear(year) {
    let text = "ยืนยันการลบข้อมูลปีหรือไม่? (ไม่แนะนำ) \nเมื่อลบแล้วจะไม่สามารถกู้คืนได้";
    if (confirm(text) == true) {
      text = "You pressed OK!";
      window.location = href="del_ty.php?year="+year;
    } else {
      //text = "You canceled!";
    }
  }
  
  function delTeacher(teacher_id) {
    let text = "ยืนยันการลบชื่อหรือไม่? (ไม่แนะนำ) \nเมื่อลบแล้วจะไม่สามารถกู้คืนได้";
    if (confirm(text) == true) {
      text = "You pressed OK!";
      window.location = href="del_ty.php?teacher="+teacher_id;
    } else {
      //text = "You canceled!";
    }
  }
  
  function delUser(user_id) {
    let text = "ยืนยันการลบบัญชีผู้ใช้นี้หรือไม่?\nเมื่อลบแล้วจะไม่สามารถกู้คืนได้";
    if (confirm(text) == true) {
      text = "You pressed OK!";
      window.location = href="del_ty.php?username="+user_id;
    } else {
      //text = "You canceled!";
    }
  }

  function delBranch(branch_id) {
    let text = "ยืนยันการลบสาขานี้หรือไม่?\nเมื่อลบแล้วจะไม่สามารถกู้คืนได้";
    if (confirm(text) == true) {
      text = "You pressed OK!";
      window.location = href="del_ty.php?branch="+branch_id;
    } else {
      //text = "You canceled!";
    }
  }

  function delVideoFile(system_id,fileName) {
    let text = "ยืนยันการลบไฟล์วีดีโอของหัวข้อนี้หรือไม่?\nเมื่อลบแล้วจะไม่สามารถกู้คืนได้\n"+"|"+system_id+"|"+fileName;
    if (confirm(text) == true) {
      text = "You pressed OK!";
      window.location = href="del_ty.php?videoFileSys="+system_id+"&fileName="+fileName;
    } else {
      //text = "You canceled!";
    }
  }

  function delAudio(system_id,fileName) {
    let text = "ยืนยันการลบไฟล์เสียงของหัวข้อนี้หรือไม่?\nเมื่อลบแล้วจะไม่สามารถกู้คืนได้\n"+"|"+system_id+"|"+fileName;
    if (confirm(text) == true) {
      text = "You pressed OK!";
      window.location = href="del_ty.php?AudioFileSys="+system_id+"&fileName="+fileName;
    } else {
      //text = "You canceled!";
    }
  }

  function delZipFile(system_id,fileName) {
    let text = "ยืนยันการลบไฟล์ .Zip ของหัวข้อนี้หรือไม่?\nเมื่อลบแล้วจะไม่สามารถกู้คืนได้\n"+"|"+system_id+"|"+fileName;
    if (confirm(text) == true) {
      text = "You pressed OK!";
      window.location = href="del_ty.php?ZipFileSys="+system_id+"&fileName="+fileName;
    } else {
      //text = "You canceled!";
    }
  }

  //To Hide
  function changeStatus2C(t_system_id,name) {
    let text = "คุณแน่ใจที่จะเปลี่ยนสถานะการแสดงผลข้อมูลนี้หรือไม่?";
    if (confirm(text) == true) {
      text = "You pressed OK!";
      window.location = href="adminside\\\change_status.php?id="+t_system_id+"&topicName="+name;
    } else {
      //text = "You canceled!";
    }
  }
 //To Show
  function changeStatus2D(t_system_id,name) {
    let text = "คุณแน่ใจที่จะเปลี่ยนสถานะการแสดงผลข้อมูลนี้หรือไม่?";
    if (confirm(text) == true) {
      text = "You pressed OK!";
      window.location = href="adminside\\\change_status.php?preview=1&id="+t_system_id+"&topicName="+name;
    } else {
      //text = "You canceled!";
    }
  }

//check and onetime click to upload and save data
  function checkForm(form){
    //
    // check form input values
    //
  
    form.submit_button.disabled = true;
    form.submit_button.value = "กำลังอัปโหลดและบันทึกข้อมูลโปรดรอซักครู่...";
    return true;
  }

  //del alert
  