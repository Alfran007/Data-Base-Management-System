<?php include('../signup.php');
session_start();
$name = $_SESSION['userid'];

?>
<html>
<shadow></shadow><style></style>
<head><style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\:form{display:block;}.ng-animate-shim{visibility:hidden;}.ng-anchor{position:absolute;}</style>
      <meta http-equiv="content-type" content="text/html; charset=UTF-8">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
         <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta name="description" content="">
      <meta name="author" content="">

	  <!-- <link rel="shortcut icon" type="image/png" href="http://www.truebus.co.in/admin-panel/assets/uploads/favicons/1472116690_1469446049_TrueBus.png"> -->
      <title>GO BUS : Online Bus Ticket Booking</title>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
      <!-- custom CSS -->
	  <link href="../css/bootstrap.css" rel="stylesheet">
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
       <link rel="stylesheet" href="../css/bootstrap.min.css">
	   <link rel="stylesheet" href="../css/font-awesome.min.css">
      <link href="../css/main.css" rel="stylesheet">
      <link href="../css/parsley.css" rel="stylesheet">
      <link href="../css/datepick.css" rel="stylesheet">


      <!-- Bootstrap core CSS -->

      <style>
  [ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
  display: none !important;

}
</style>
<style media="screen">

 table{
   width: 100%;
 }
</style>



      <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
      <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->


      <script src="../js/jquery.js"></script>
 <!--script src="http://www.truebus.co.in/assets/js/jquery.js"></script-->


      <script src="../js/jquery-ui.js"></script>

   <script src="../js/jquery.raty.js"></script>


      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

   </head>
   <body>


	   <!--HEADER-BAR-->
         <div class="tb_header" style="position:fixed; top:0;">
            <div class="container">
               <div class="col-md-6" style="padding:0;">
                  <div class="tb_logo"> <a href="http://localhost/Bus"><img src="../images/bus logo.png"> </a> </div>
               </div>
               <div class="col-md-4" style="padding:0;">
                 <div class="tb_navbar" style="width:140%">
                   <ul>
                      <li><a href="http://localhost/Bus/user/user.php">Home &nbsp;<span style="color:#f0a2a3;"> |</span></a></li>
                      <li><a href="http://localhost/Bus/user/useraboutus.php">About Us &nbsp;  <span style="color:#f0a2a3;"> |</span></a></li>
                      <li><a href="http://localhost/Bus/user/usercontactus.php">Contact Us &nbsp;  <span style="color:#f0a2a3;"> |</span></a></li>
                      <li><a href="http://localhost/Bus/user/feedback.php">Feedback &nbsp;  <span style="color:#f0a2a3;"> |</span></a></li>

                      <li><a href="http://localhost/Bus/user/usercancellation.php">Easy Cancel/Refund</a> </li>
                   </ul>
                 </div>
               </div>
               <div class="col-md-2" style="padding:0;">

                 <div class="dropdown_lis">
<button onclick="myFunction()" class="dropbtn">WELCOME <?php echo $name ?>  &nbsp; <i class="fa fa-user"></i></button>

 <div id="tabs" class="dropdown-content">
<a href="http://localhost/Bus/user/mytrips.php"> <i class="fa fa-bookmark"></i>&nbsp;
My Trips</a>


<a href="http://localhost/Bus/logout.php"> <i class="fa fa-sign-out"></i>&nbsp;
Sign out</a>
</div>
</div>
				                               <!------logged end---------------->
               </div>
            </div>
            <div class="shadow" style="background:white"><img src="../images/shadow.png"></div>
         </div>
         <!--HEADER-BAR-END-->
         <!-- Modal -->


         <div style="margin-top:10%; padding-left:20%;">
           <h1 style="color:maroon">Please review your Details </h1>
            <?php
              include('../dbconnect.php');
              if(isset($_POST['action'])){
                if($_POST['action']=="Book Now"){
                $name = $_POST['name'];
                $_SESSION['name'] = $name;
                $mob = $_POST['mob'];
                $_SESSION['mob'] = $mob;
                $age = $_POST['age'];
                $_SESSION['age'] = $age;
                $uid = $_POST['uid'];
                $_SESSION['uid'] = $uid;
                $sex = $_POST['sex'];
                $_SESSION['sex'] = $sex;
                $busnumber = $_POST['busnumber'];
                $_SESSION['busno'] = $busnumber;
                echo "<table>";
                echo "<tr>";
                echo "<td>";
                echo "<b>"."Name:"."</b>"."  ".$name."<br>"."<br>";
                echo "<b>"."Age:"."</b>"."  ".$age."<br>"."<br>";
                echo "<b>"."Sex:"."</b>"."  ".$sex."<br>"."<br>";
                echo "<b>"."Mobile No.:"."</b>"."  ".$mob."<br>"."<br>";
                echo "<b>"."U-ID:"."</b>"."  ".$uid."<br>"."<br>";
                echo "</td>";
                echo "<td>";
                echo "<b>"."Bus No.:"."</b>"."  ".$busnumber."<br>"."<br>";
                echo "<b>"."From:"."</b>"."  ".$_SESSION['from']."<br>"."<br>";
                echo "<b>"."To:"."</b>"."  ".$_SESSION['to']."<br>"."<br>";
                $searchq = mysqli_query($connection,"SELECT fare FROM bus WHERE busno ='".$busnumber."'");
                while($results = mysqli_fetch_array($searchq)){
                echo "<b>"."Fare:"."</b>"."  ".$results['fare']."   INR"."<br>"."<br>";
                $_SESSION['fare'] = $results['fare'];
                }
                echo "<b>"."Date of Journey:"."</b>"."  ".$_SESSION['doj']."<br>"."<br>";
                echo "</td>";
                echo "</tr>";
                echo "<table>";
                echo "<a href='payment.php'>"."<input type='submit' value='Proceed to pay...' style='margin-left:30%;;height:8%;width:15%;'>"."</a>";
              }
            }
             ?>
           </div>



















     <!--   custom JavaScript -->
	 <script src="../js/angular/angular.js"></script>
	 <script src="../js/dirPagination.js"></script>
	  <script src="../js/search.js"></script>
	  <script src="../js/service.js"></script>
      <script src="../js/truebus.js"></script>
	  <script src="../js/rating.js"></script>
      <script src="../js/bootstrap.js"></script>
	  <script src="../js/jquery.form.js"></script>
	  <script src="../js/custom.js"></script>

	<script src="../js/jquery-datepicker.js"></script>
	<script src="../js/parsley.min.js"></script>

      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->



<ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content ui-corner-all" id="ui-id-1" tabindex="0" style="display: none;"></ul>
<ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content ui-corner-all" id="ui-id-2" tabindex="0" style="display: none;"></ul>
<div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div>
<script>
    $( document ).ready(function() {

		 $('#pickDate').click(function (e) {
            $(this).next().datepicker('show');
        });
    $(".pickup_date").datepicker({

           minDate: 0//this option for allowing user to select from year range
        });


		$(".returnsd").datepicker({

         minDate: new Date($(".datetimepicker4").val())

     //this option for allowing user to select from year range
        });
		$(".pickup_date").on('change',function(e){

		$("#Calenderreturn").datepicker({

         minDate: new Date($(".Calenderfrom").val())

     //this option for allowing user to select from year range
        });
		});
		$(".date_of_birth").datepicker({
	       changeYear: 'true',
            changeMonth: 'true'

        });
		$('ul.tabs li').click(function(){
			var id = $(this).data('id');
			//alert(id);
		var tab_id = $(this).attr('data-tab');

			$('ul.tabs li').removeClass('current');
			$('.tab-content').removeClass('current');

			$(this).addClass('current');
			$("#"+tab_id).addClass('current');

			$('#pament_option').val(id);
	   });
});
</script>

</body>
</html>
