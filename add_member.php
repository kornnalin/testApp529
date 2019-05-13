<?php echo   $_SESSION["userid"]."<br>"; ?>
<html>
  <head>
    <title>Add New Member</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "stylesheet" type = "text/css" href = "style.css" >
  </head>
  <style>
  h2{
    text-align: center;
    margin-bottom: -20px;
    font-size: 40px;
  }
  </style>
  <body>
    <script>
    function checkAfterSubmit(){
      //check firstName
      if(document.formFirn.name.value == ""){
    		alert('กรุณาใส่ ชื่อและนามสกุล');
    		document.formFirn.name.focus();
    		return false;
    	}
      //check LastName
      if(document.formFirn.nickname.value == ""){
    		alert('กรุณาใส่ ชื่อเล่น');
    		document.formFirn.nickname.focus();
    		return false;
    	}
      //chack User Login
      if(document.formFirn.user.value == ""){
        alert('กรุณาใส่ ชื่อผู้ใช้ เพื่อใช้ล็อกอินเข้าสู่ระบบ ');
        document.formFirn.user.focus();
        return false;
      }
      //check pwd
      if(document.formFirn.pwd.value == ""){
    		alert('กรุณาใส่รหัสผ่าน โดยต้องเป็นอักขระ A-Z , a-z หรือเป็นตัวเลข 0-9 และสัญลักษณ์ (-) , (_) เป็นต้น');
    		document.formFirn.pwd.focus();
    		return false;
    	}
      //check pwd again
      if(document.formFirn.pwdagainvalue == ""){
    		alert('กรุณาใส่รหัสผ่าน อีกครั้ง!! โดยต้องเป็นอักขระ A-Z , a-z หรือเป็นตัวเลข 0-9 และสัญลักษณ์ (-) , (_) เป็นต้น');
    		document.formFirn.pwdagain.focus();
    		return false;
    	}
    document.formFirn.submit();
    }
    </script>
    <h2>สมัครสมาชิกใหม่ </h2><br>
    <center>
    <form action="insert_member.php"name="formFirn" method="post" onSubmit="JavaScript:return checkAfterSubmit();">
      <h3>ชื่อ - นามสกุล :<input type="text" name="name"></h3>
      <h3>ชื่อเล่น : <input type="text" name="nickname"></h3>
      <h3>ชื่อผู้ใช้ : <input type="text" name="user"></h3>
      <h3>รหัสผ่าน : <input type="password" name="pwd"></h3>
      <h3>รหัสผ่าน(อีกครั้ง) : <input type="password" name="pwdagain"></h3>
        <input type="hidden" name="status" value="user"> <br>
      <input type="submit"style="margin-top: 10px;"value="ยืนยัน">
    </form>
    </form>
  </center>
  </body>
</html>
