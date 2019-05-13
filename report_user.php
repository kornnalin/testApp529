<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>เลือกวันที่ต้องการดูรายงาน</title>
  </head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="fonts/thsarabunnew.css"/>
  <link rel="stylesheet" media="all" type="text/css" href="jquery-ui.css" />
  <link rel="stylesheet" media="all" type="text/css" href="jquery-ui-timepicker-addon.css" />
  <script type="text/javascript" src="jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="jquery-ui.min.js"></script>
  <script type="text/javascript" src="jquery-ui-timepicker-addon.js"></script>
  <script type="text/javascript" src="jquery-ui-sliderAccess.js"></script>
  <link rel = "stylesheet" type = "text/css" href = "style.css" >
  <style>
  input{
    font-family: 'TH Sarabun New', Times, Arial, Helvetica, sans-serif;
    text-align: center;
    border: none;
    font-weight: bold;
    width: auto;
  }
  body{
    background-color: #FFC900;
  }
  h2{
    color: blue;
  }
  input{
    font-size: 20px
    width: 50%;
    border-color: gray;
    padding: 5px;
  }

  td{width:50px; height: 30px; text-align:center; background-color: #FFE800;}
  th{background-color: #FFE800;}
  /* span{
    background-color: #FFE800;
  } */
  div.ui-datepicker-header.ui{
    background-color: #FFE800;b
  }
  /* #tb_calendar, #main{ width : 400px; } */
  #main{ border : 5px solid #FFC900;
         border-left: 12px solid #FFC900;
         border-right: 12px solid #FFC900;}
  #nav{
   font-size: 20px;
   background-color: #FFC900;
   min-height: 20px;
   padding: 10px;
   /* text-align: center; */
   color : black;
  }
  .navLeft{float: left; }
  .navRight{float: right;}
  .title{text-align: center;}
  </style>
  <body>
    <script>
    $(function(){

  		var startDateTextBox = $('#dateStart');
  		var endDateTextBox = $('#dateEnd');

  		startDateTextBox.datepicker({
  			dateFormat: 'dd-M-yy',language: 'th',
  			onClose: function(dateText, inst) {
  				if (endDateTextBox.val() != '') {
  					var testStartDate = startDateTextBox.datetimepicker('getDate');
  					var testEndDate = endDateTextBox.datetimepicker('getDate');
  					if (testStartDate > testEndDate)
  						endDateTextBox.datetimepicker('setDate', testStartDate);
  				}
  				else {
  					endDateTextBox.val(dateText);
  				}
  			},
  			onSelect: function (selectedDateTime){
  				endDateTextBox.datetimepicker('option', 'minDate', startDateTextBox.datetimepicker('getDate') );
  			}
  		});

  		endDateTextBox.datepicker({
  			dateFormat: 'dd-M-yy',language: 'th',
  			onClose: function(dateText, inst) {
  				if (startDateTextBox.val() != '') {
  					var testStartDate = startDateTextBox.datetimepicker('getDate');
  					var testEndDate = endDateTextBox.datetimepicker('getDate');
  					if (testStartDate > testEndDate)
  						startDateTextBox.datetimepicker('setDate', testEndDate);
  				}
  				else {
  					startDateTextBox.val(dateText);
  				}
  			},
  			onSelect: function (selectedDateTime){
  				startDateTextBox.datetimepicker('option', 'maxDate', endDateTextBox.datetimepicker('getDate') );
  			}
  		});

  	});

    </script>
    <center>
    <h2><b>รายงานเวลาการเข้างาน<b></h2><br><br>
    <h4>เลือกวันที่ต้องการดูจากด้านล่าง</h4>
    <form action="timestamp_user.php" method="post">
      <div id="startDate">
        <h4>ตั้งแต่วันที่ : <input type="text" name="dateStart" id="dateStart" value="" /></h4><br>
      	<h4>จนถึงวันที่ : <input type="text" name="dateEnd" id="dateEnd" value="" /></h4><br><br>
        <h4><input type="submit" value="ยืนยัน" class="name"></h4>
      <div>
    </form>
  </center>
  </body>
</html>
