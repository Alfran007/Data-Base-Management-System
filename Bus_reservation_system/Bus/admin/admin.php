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
           <div class="col-md-6">
              <div class="tb_bus">
                 <img src="../images/bus.png">
              </div>
           </div>
           <!--HEADER-BAR-END-->
           <!-- Modal -->
           <div style="margin-top:11%;">

             <ul style="list-style-type:none;margin-left:75%;">
               <li style="padding:1%; font-size:30px;"><a href="http://localhost/Bus/admin/addroute.php" style="text-decoration:none;">Add Route &nbsp;</a></li>
               <li style="padding:1%; font-size:30px;"><a href="http://localhost/Bus/admin/checkroute.php" style="text-decoration:none;">Check Routes &nbsp;  </a></li>

               <li style="padding:1%; font-size:30px;"><a href="http://localhost/Bus/admin/addbus.php" style="text-decoration:none;">Add Bus &nbsp;  </a></li>
               <li style="padding:1%; font-size:30px;"><a href="http://localhost/Bus/admin/checkbus.php" style="text-decoration:none;">Check Buses &nbsp;  </a></li>

               <li style="padding:1%; font-size:30px;"><a href="http://localhost/Bus/admin/checkfeedbacks.php" style="text-decoration:none;">Check Feedbacks &nbsp;  </a></li>
               <li style="padding:1%;font-size:30px;"><a href="http://localhost/Bus/admin/checktransaction.php" style="text-decoration:none;">Check Transactions &nbsp;  </a></li>
               <li style="padding:1%; font-size:30px;"><a href="http://localhost/Bus/admin/checkuser.php" style="text-decoration:none;">User Details &nbsp;  </a></li>
               <li style="padding:1%; font-size:30px;"><a href="http://localhost/Bus/admin/checkbtickets.php" style="text-decoration:none;">Check Bookings &nbsp;  </a></li>

             </ul>
           </div>


           <div class="tb_operator" style="position:fixed;bottom:0">
              <div class="container">
                 <div class="tb_inner">
                    <div class="row">
                       <div class="wrapper">
                          <div class="col-md-4 col-sm-12 col-xs-12">
                             <div class="tb_operator">
                                <img src="../images/routte.png"> &nbsp;<span class="tb_operator1">67000 <small class="smalls">ROUTES</small></span>
                             </div>
                          </div>
                          <div class="col-md-4  col-sm-12 col-xs-12">
                             <div class="tb_operator left">
                                <img src="../images/route.png">  &nbsp;<span class="tb_operator2">1800<small class="smalls"> BUS OPERATORS</small></span>
                             </div>
                          </div>
                          <div class="col-md-4  col-sm-12 col-xs-12">
                             <div class="tb_operator right">
                                <img src="../images/ticket.png">  &nbsp;<span class="tb_operator3">6,00,000 + <small class="smalls">TICKETS SOLD</small></span>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
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
