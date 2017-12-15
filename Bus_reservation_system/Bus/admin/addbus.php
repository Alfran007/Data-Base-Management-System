<?php
include('../dbconnect.php');
session_start();
if($_SESSION['logged'] == 1){
    header('Location:user/user.php');
}
if(isset($_POST['action']))
{
    if($_POST['action']=="Login")
    {
        $email = mysqli_real_escape_string($connection,$_POST['username']);
        $password = mysqli_real_escape_string($connection,$_POST['password']);
        $strSQL = mysqli_query($connection,"select * from admin where adminid='".$email."' and password='".md5($password)."'");
        $Results = mysqli_fetch_array($strSQL);
        if(count($Results)>=1)
        {
            $message = $Results['adminid']." Login Sucessfully!!";
            echo "login success";
            session_start();
            $_SESSION['adminid'] = $email;
            $_SESSION['adminlogged'] = true;
            header('Location:admin.php');
        }
        else
        {
          sleep(2.5);
            $message = "Invalid email or password!!";
        }
      }
      // if($_SESSION['adminlogged'] != 1){
      //   header('Location: ../index.php');
      // }

  }
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



        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->


        <script src="../js/jquery.js"></script>
   <!--script src="http://www.truebus.co.in/assets/js/jquery.js"></script-->


        <!-- <script src="js/jquery-ui.js"></script> -->
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
     <script src="../js/jquery.raty.js"></script>


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

     </head>
     <body>


  	   <!--HEADER-BAR-->
           <div class="tb_header" style="position:fixed;top:0">
              <div class="container">
                 <div class="col-md-6" style="padding:0;">
                    <div class="tb_logo"> <a href="http://localhost/Bus"><img src="../images/bus logo.png"> </a> </div>
                 </div>
                 <div class="col-md-4" style="padding:0;">

                 </div>
                 <div class="col-md-2" style="padding:0;">



   				     <!------logged in---------------->

                                    <div class="dropdown_lis">
   <button onclick="myFunction()" class="dropbtn" style="width:180%;margin-left:-20%;">WELCOME <?php echo $_SESSION['adminid'] ?>  &nbsp; <i class="fa fa-user"></i></button>

                    <div id="tabs" class="dropdown-content">



       <a href="http://localhost/Bus/logout.php"> <i class="fa fa-sign-out"></i>&nbsp;
    Sign out</a>
     </div>
   </div>
                                <!------logged end---------------->
                  </div>
              </div>
              <div class="shadow" style="background:white"><img src="../images/shadow.png"></div>
           </div>



           <form id="signup" data-parsley-validate="" class="ng-pristine ng-valid" novalidate="" action="" method="post">
                 <div class="login-block" style="height:70%;">


                     <h1>Add Bus</h1>
                     <input type="number" value="" placeholder="Enter Route Number" name="routeno" required="">
                     <input type="text" name="busno" data-parsley-required="true" data-parsley-trigger="change" required="" placeholder="Bus Number">
                     <input type="text" name="bustravels" data-parsley-required="true" data-parsley-trigger="change" required="" placeholder="Bus Travels">
                     <input type="text" name="bustype" data-parsley-required="true" data-parsley-trigger="change" required="" placeholder="Bus Type">
                     <input type="number" name="day" data-parsley-required="true" data-parsley-trigger="change" required="" placeholder="Day">
                     <input type="text" name="deptime" data-parsley-required="true" data-parsley-trigger="change" required="" placeholder="Departure Time">
                     <input type="text" name="arrtime" data-parsley-required="true" data-parsley-trigger="change" required="" placeholder="Arrival Time">
                     <input type="number" name="fare" data-parsley-required="true" data-parsley-trigger="change" required="" placeholder="Fare">





  				  <input name="action" type="submit" value="Add Bus" style="position: relative;" onclick="Signup()">
                    <br>
  				   <div class="small_loader" style="text-align:center;display:none"><img src="images/loader-small.gif"></div>
  				  <div class="signup_res" style="text-align:center;"></div>
                    <br>
                 </div>

  			   </form>
           <div style="text-align:center;">

             <a href="http://localhost/Bus/admin/admin.php" style="text-decoration:none">Go Back</a>
           </div>


           <?php
           include('../dbconnect.php');

           if(isset($_POST['action']))
           {
             if($_POST['action']=="Add Bus"){
               $routeno = $_POST['routeno'];
               $busno = $_POST['busno'];
               $bustravels = $_POST['bustravels'];
               $bustype = $_POST['bustype'];
               $day = $_POST['day'];
               $deptime = $_POST['deptime'];
               $arrtime = $_POST['arrtime'];
               $fare = $_POST['fare'];
               $searchq=mysqli_query($connection,"SELECT * FROM `bus` WHERE busno = '".$busno."'");
               $results = mysqli_fetch_array($searchq);
               if(count($results)>=1)
               {
               echo "<br>";
               echo "<div id='success1'  style='color:green;text-align:center; font-weight:bold;border: 1px solid green; height:8%; width:35%; padding:1%; background-color:lightgreen;margin-left:33%;'>"."Bus With same number is already registered."."</div>";
               ob_flush();
               flush();
               sleep(4);
               echo "<script>document.getElementById('success1').style.display = 'none'</script>";
             }
             else {
               mysqli_query($connection,"INSERT INTO `bus` (`busno`, `bustype`, `deptime`, `day`, `routeno`, `Seats`, `bustravels`, `arrtime`, `fare`) VALUES ('".$busno."','".$bustype."','".$deptime."','".$day."','".$routeno."', 46 ,'".$bustravels."','".$arrtime."','".$fare."')");
               echo "<br>";
               echo "<div id='success'  style='color:green;text-align:center; font-weight:bold;border: 1px solid green; height:8%; width:35%; padding:1%; background-color:lightgreen;margin-left:33%;'>"."Bus Successfully Added"."</div>";
               ob_flush();
               flush();
               sleep(4);
               echo "<script>document.getElementById('success').style.display = 'none'</script>";
             }

             }
           }
             ?>




           <!--operator-BAR end-->


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
  <ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content ui-corner-all" id="ui-id-1" tabindex="0" style="display: none;"></ul>
  <ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content ui-corner-all" id="ui-id-2" tabindex="0" style="display: none;"></ul>
  <div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div>
  </body>
  </html>
