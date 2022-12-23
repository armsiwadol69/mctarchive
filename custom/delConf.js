function delDataOfTopic(system_id) {
    let text = "ยืนยันการลบข้อมูลหรือไม่? \nเมื่อลบแล้วจะไม่สามารถกู้คืนได้";
    if (confirm(text) == true) {
      text = "You pressed OK!";
      window.location = "del_topic.php?idtodel="+system_id;
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
  //To Hide
  function changeStatus2C(t_system_id) {
    let text = "คุณแน่ใจที่จะเปลี่ยนสถานะการแสดงผลข้อมูลนี้หรือไม่?";
    if (confirm(text) == true) {
      text = "You pressed OK!";
      window.location = href="change_status.php?id="+t_system_id;
    } else {
      //text = "You canceled!";
    }
  }
 //To Show
  function changeStatus2D(t_system_id) {
    let text = "คุณแน่ใจที่จะเปลี่ยนสถานะการแสดงผลข้อมูลนี้หรือไม่?";
    if (confirm(text) == true) {
      text = "You pressed OK!";
      window.location = href="change_status.php?preview=1&id="+t_system_id;
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
    form.submit_button.value = "กำลังอัพโหลดและบันทึกข้อมูลโปรดรอซักครู่...";
    return true;
  }