<?php
include('dbconnect.php');
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
        $strSQL = mysqli_query($connection,"select Email from user where Email='".$email."' and password='".md5($password)."'");
        $Results = mysqli_fetch_array($strSQL);
        if(count($Results)>=1)
        {
            $message = $Results['username']." Login Sucessfully!!";
            echo "login success";
            session_start();
            $_SESSION['userid'] = $email;
            $_SESSION['logged'] = true;
            header('Location:user/user.php');
        }
        else
        {
          sleep(2.5);
            $message = "Invalid email or password!!";
        }
    }

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
	  <link href="css/bootstrap.css" rel="stylesheet">
      <!-- IE10 viewport hack for Surfac5e/desktop Windows 8 bug -->
       <link rel="stylesheet" href="css/bootstrap.min.css">
	   <link rel="stylesheet" href="css/font-awesome.min.css">
      <link href="css/main.css" rel="stylesheet">
      <link href="css/parsley.css" rel="stylesheet">
      <link href="css/datepick.css" rel="stylesheet">


      <!-- Bootstrap core CSS -->

      <style>
  [ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
  display: none !important;
}
</style>




      <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
      <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->


      <script src="js/jquery.js"></script>
 <!--script src="http://www.truebus.co.in/assets/js/jquery.js"></script-->


      <!-- <script src="js/jquery-ui.js"></script> -->
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
   <script src="js/jquery.raty.js"></script>


      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

   </head>
   <body>


	   <!--HEADER-BAR-->
         <div class="tb_header">
            <div class="container">
               <div class="col-md-6" style="padding:0;">
                  <div class="tb_logo"> <a href="http://localhost/Bus"><img src="images/bus logo.png"> </a> </div>
               </div>
               <div class="col-md-4" style="padding:0;">
                  <div class="tb_navbar" style="width:80%">
                    <ul>
                       <li><a href="http://localhost/Bus">Home &nbsp;<span style="color:#f0a2a3;"> |</span></a></li>
                       <li><a href="http://localhost/Bus/aboutus.php">About Us &nbsp;  <span style="color:#f0a2a3;"> |</span></a></li>
                       <li><a href="http://localhost/Bus/contactus.php">Contact Us &nbsp;  <span style="color:#f0a2a3;">

                      </ul>
                  </div>
               </div>
               <div class="col-md-2" style="padding:0;">

				                  <div class="signin_up">
                     <ul style="width:130%">
                        <li><a href="#myModala" data-toggle="modal" data-target="#myModala">Admin</a>  <span style="color:#f0a2a3;">/</span></li>
                        <li><a href="#myModals" data-toggle="modal" data-target="#myModals">Sign In</a>  <span style="color:#f0a2a3;">/</span></li>

                        <li><a href="#myModal" data-toggle="modal" data-target="#myModal">Sign Up</a></li>
                     </ul>
                  </div>
				                               <!------logged end---------------->
               </div>
            </div>
            <div class="shadow" style="background:white"><img src="images/shadow.png"></div>
         </div>
         <!--HEADER-BAR-END-->
         <!-- Modal -->
         <div class="modal fade" id="myModals" role="dialog">
            <div class="modal-dialog">
               <!-- Modal content-->
               <button type="button" class="close_lft" data-dismiss="modal">×</button>
			   <form id="login" data-parsley-validate="" class="ng-pristine ng-valid" novalidate="" action="" method="post">
               <div class="login-block">
                  <h1>Login</h1>
                  <input type="text" name="username" placeholder="Email" class="username" id="username" required="">
                  <input type="password" class="password" name="password" placeholder="Password" id="password" required="">
                  <input type="checkbox" id="checkbox3" class="css-checkbox" name="rememberme" data-parsley-multiple="rememberme">
                  <label for="checkbox3" class="css-label lite-red-check">Remember Me</label>

				  <input name="action" type="submit" value="Login" style="position: relative;" onclick="Login()">
				   <br>
                  <div class="small_loader" style="text-align:center;display:none"><img src="images/loader-small.gif"></div>
				  <div class="login_res" style="text-align:center;"></div>
                  <br>
                  <div class="forgot"><a data-dismiss="modal" href="#myModalf" data-toggle="modal" data-target="#myModalf">Forgot Password?</a></div>
                  <div class="sign_in"><a data-dismiss="modal" href="#myModal" data-toggle="modal" data-target="#myModal">Sign Up</a></div>
               </div>
			   </form>
            </div>
         </div>

         <div class="modal fade" id="myModala" role="dialog">
            <div class="modal-dialog">
               <!-- Modal content-->
               <button type="button" class="close_lft" data-dismiss="modal">×</button>
			   <form id="login" data-parsley-validate="" class="ng-pristine ng-valid" novalidate="" action="admin/admin.php" method="post">
               <div class="login-block">
                  <h1>Login</h1>
                  <input type="text" name="username" placeholder="Email" class="username" id="username" required="">
                  <input type="password" class="password" name="password" placeholder="Password" id="password" required="">
                  <input type="checkbox" id="checkbox3" class="css-checkbox" name="rememberme" data-parsley-multiple="rememberme">
                  <label for="checkbox3" class="css-label lite-red-check">Remember Me</label>

				  <input name="action" type="submit" value="Login" style="position: relative;" onclick="Login()">
				   <br>
                  <div class="small_loader" style="text-align:center;display:none"><img src="images/loader-small.gif"></div>
				  <div class="login_res" style="text-align:center;"></div>
                  <br>
               </div>
			   </form>
            </div>
         </div>




         <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
               <!-- Modal content-->
               <button type="button" class="close_lft" data-dismiss="modal">×</button>
			   <form id="signup" data-parsley-validate="" class="ng-pristine ng-valid" novalidate="" action="signup.php" method="post">
               <div class="login-block">


                   <h1>Sign Up</h1>
                   <input type="email" value="" class="username" placeholder="Email" name="username" required="">
                   <input class="mobile" id="signup-username" type="text" name="mob" data-parsley-type="digits" data-parsley-required="true" data-parsley-trigger="change" required="" minlength="3" data-parsley-minlength="3" data-parsley-maxlength="15" placeholder="Mobile">
                   <input type="password" value="" class="password" placeholder="Password" id="dfdfd" name="password" data-parsley-maxlength="15" data-parsley-minlength="6" required="">
                   <input type="password" data-parsley-maxlength="15" data-parsley-minlength="6" data-parsley-equalto="#dfdfd" data-parsley-equalto-message="Password confirmation must match the password." class="password" required="" placeholder="Repeat Password" id="password"><br>
                   <span class="terms_tb">By signing up, you agree to our <a data-dismiss="modal" href="#myModalt" data-toggle="modal" data-target="#myModalt">Terms and Conditions.</a></span> <br>
                   <br>

				  <input name="action" type="submit" value="Sign up" style="position: relative;" onclick="Signup()">
                  <br>
				   <div class="small_loader" style="text-align:center;display:none"><img src="images/loader-small.gif"></div>
				  <div class="signup_res" style="text-align:center;"></div>
                  <br>
                  <div class="account"><a data-dismiss="modal" href="#myModals" data-toggle="modal" data-target="#myModals">Already have an account?</a></div>
                  <div class="sign_in"><a data-dismiss="modal" href="#myModals" data-toggle="modal" data-target="#myModals">Sign In</a></div>
               </div>

			   </form>
            </div>
         </div>





         <div class="modal fade" id="myModalt" role="dialog">
            <div class="modal-dialog">
               <!-- Modal content-->
               <button type="button" class="close_lft" data-dismiss="modal" style="margin-right:-33.5%">×</button>
               <div class="login-block" style="width:150%;margin-left:-25%;">
                <p>
                  Go Bus' responsibilities include:
                </p>
                <hr style="border: 0.5px dotted maroon">
                <p style="padding-left:3%;">
                  1.Issuing a valid ticket (a ticket that will be accepted by the bus operator) for its’ network of bus operators<br>
                  2.Providing refund and support in the event of cancellation<br>
                  3.Providing customer support and information in case of any delays / inconvenience<br>
                </p>
                <p>
                  Go Bus’ responsibilities do NOT include:
                </p>
                <hr style="border: 0.5px dotted maroon">
                <p style="padding-left:3%;">
                  1.The bus operator’s bus not departing / reaching on time<br>
                  2.The bus operator’s employees being rude<br>
                  3.The bus operator’s bus seats etc not being up to the customer’s expectation<br>
                  4.The bus operator canceling the trip due to unavoidable reasons<br>
                  5.The baggage of the customer getting lost / stolen / damaged<br>
                  6.The bus operator changing a customer’s seat at the last minute to accommodate a lady / child<br>
                  7.The customer waiting at the wrong boarding point (please call the bus operator to find out the exact boarding point<br>
                  &nbsp;&nbsp; if you are not a regular traveler on that particular bus)<br>
                  8.The bus operator changing the boarding point and/or using a pick-up vehicle at the boarding point to take customers to<br>   &nbsp;&nbsp;the bus departure point<br>
                </p>
            </div>
         </div>
       </div>






	       <div class="modal fade" id="myModalf" role="dialog">
            <div class="modal-dialog">
               <!-- Modal content-->
               <button type="button" class="close_lft" data-dismiss="modal">×</button>
			    <form id="forgot" data-parsley-validate="" class="ng-pristine ng-valid" novalidate="">
               <div class="login-block">
                  <h1>Forgot Password</h1>
                  <input type="email" name="email" placeholder="Email" class="username">

                  <span class="terms_tb">By signing up, you agree to our <a data-dismiss="modal" href="#myModalt" data-toggle="modal" data-target="#myModalt">Terms and Conditions.</a></span> <br>
                  <br>

				  <input type="button" value="SEND EMAIL" style="position: relative;" onclick="Forgot()">

                  <br>
				   <div class="small_loader" style="text-align:center;display:none"><img src="images/loader-small.gif"></div>
				  <div class="forgot_res" style="text-align:center;"></div>
                  <br>
                  <div class="account"><a href="#">Already have an account?</a></div>
                  <div class="sign_in"><a data-dismiss="modal" href="#myModals" data-toggle="modal" data-target="#myModals">Sign In</a></div>
               </div>
			   </form>
            </div>
         </div>















         <!--SEARCH-BAR-->
         <div class="container ng-scope" ng-controller="search">
            <div class="row" style="min-height:400px;margin-top:120px;">
               <div class="col-md-6">
			   <form id="myForm" action="searchbus.php" method="post" data-parsley-validate="" class="ng-pristine ng-valid" novalidate="">
                  <section id="Search" class="LB XXCN  P20">
                     <h1 class="bookTic XCN TextSemiBold">Online Bus Tickets Booking</h1>
                     <div class="searchRow clearfix">
                        <div class="LB">
                           <label class="inputLabel">From</label>
                           <input id="board_point" class="XXinput searching ui-autocomplete-input" name="from" placeholder="Enter a city" type="text" data-id="board_point" autocomplete="off" data-parsley-error-message="Please select a source city" tabindex="1" required=""><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
                           <div class="errorMessageFixed"> </div>
                        </div>
                        <span class="switchButton" id="switchButton"></span>
                        <div class="searchRight NoPaddingRight">
                           <label class="inputLabel">To</label>
                           <input id="Destination" class="XXinput searching ui-autocomplete-input" name="to" placeholder="Enter a city" type="text" tabindex="2" data-id="drop_point" autocomplete="off" data-parsley-error-message="Please select a destination city" required=""><span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
                           <div class="errorMessageFixed"> </div>
                        </div>
                     </div>
                     <div class="searchRow clearfix">
                        <div class="LB">
                           <label class="inputLabel">Date of Journey</label>
                           <span class="blackTextSmall"></span>
                           <input  placeholder="dd-mm-yyyy"  type="date" name='doj' title="Date in the format dd-mmm-yyyy" tabindex="3" style="width:153%; height:32px; color:grey;">
                        </div>

                     </div>
                     <div class="dateError">Onward date should be before return date</div>
                     <input name="action" type="submit" value="Search Buses" style="position: relative; float:right;margin-top:-57px; width:46%;">
                     <!-- <button class="RB Xbutton" id="searchBtn" ng-click="homesearch()">Search Buses</button> -->
                  </section>
				  </form>
               </div>
               <div class="col-md-6">
                  <div class="tb_bus">
                     <img src="images/bus.png">
                  </div>
               </div>
            </div>
         </div>
         <!--SEARCH-BAR-END-->
         <!--operator-BAR-->
         <div class="tb_operator">
            <div class="container">
               <div class="tb_inner">
                  <div class="row">
                     <div class="wrapper">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                           <div class="tb_operator">
                              <img src="images/routte.png"> &nbsp;<span class="tb_operator1">67000 <small class="smalls">ROUTES</small></span>
                           </div>
                        </div>
                        <div class="col-md-4  col-sm-12 col-xs-12">
                           <div class="tb_operator left">
                              <img src="images/route.png">  &nbsp;<span class="tb_operator2">1800<small class="smalls"> BUS OPERATORS</small></span>
                           </div>
                        </div>
                        <div class="col-md-4  col-sm-12 col-xs-12">
                           <div class="tb_operator right">
                              <img src="images/ticket.png">  &nbsp;<span class="tb_operator3">6,00,000 + <small class="smalls">TICKETS SOLD</small></span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--operator-BAR end-->

         <!--footer-BAR-->
         </a><div class="container"><a href="#">
         </a><div class="row"><a href="#">
         </a><div class="tb_inner"><a href="#">
         </a><div class="col-md-9"><a href="#">
         </a><div class="tb_footer"><a href="#">
         </a>
         </div>
         <div class="footer_con">  ©  2016 <a href="https://developer.co.in/" style="text-decoration:none;">Developer Solution</a></div>
         </div>
         <div class="col-md-3">
         <div class="tb_social">
         <ul>
         <li>  <a href="#"><img src="images/facebook.png"></a> </li>
         <li>  <a href="#"> <img src="images/twitter.png"></a></li>
         <li>  <a href="#">  <img src="images/google.png"></a></li>
         </ul>
         </div>
		 <a href="#" id="back-to-top" title="Back to top">↑</a>
         </div>
         </div>
         </div>
         </div>	<script>

	base_url = "http://www.truebus.co.in/";

	</script>
     <!--   custom JavaScript -->
	 <script src="js/angular/angular.js"></script>
	 <script src="js/dirPagination.js"></script>
	  <script src="js/search.js"></script>
	  <script src="js/service.js"></script>
      <script src="js/truebus.js"></script>
	  <script src="js/rating.js"></script>
      <script src="js/bootstrap.js"></script>
	  <script src="js/jquery.form.js"></script>
	  <script src="js/custom.js"></script>

	<script src="js/jquery-datepicker.js"></script>
	<script src="js/parsley.min.js"></script>

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
