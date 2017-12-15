<?php include('../signup.php');
session_start();
$name = $_SESSION['userid'];
include('../dbconnect.php');
if(isset($_POST['action']))

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
     #map {
       height: 400px;
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
      <style media="screen">
        #bus{
          padding: 1%;
          padding-left:10%;
          /*margin-top: -1%;*/

        }
        #bus:hover{
          background-color: #f1f1f1;
        }
        table{
          border: 1px solid black;
          width:100%;
          margin-top:11%;
          padding:1%;
          table-layout: fixed;
        }
        tr,td,th{
          border: 1px solid black;
          text-align: center;
          padding:5px;
        }
        th{
          background-color: lightgrey;
        }

      </style>
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
 <a href="#"> <i class="fa fa-bookmark"></i>&nbsp;
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

         <?php
           include ('../dbconnect.php');
           $searchq = mysqli_query($connection,"SELECT route.source,route.destination,date from route JOIN (SELECT routeno,date from bus,book where bus.busno = book.busno AND book.userid = 'krrish091996@gmail.com') AS r1 ON route.routeno = r1.routeno");
           $results = mysqli_fetch_array($searchq);
           if(count($results)>=1)
           {
             $searchq = mysqli_query($connection,"SELECT route.source,route.destination,date from route JOIN (SELECT routeno,date from bus,book where bus.busno = book.busno AND book.userid = 'krrish091996@gmail.com') AS r1 ON route.routeno = r1.routeno");


             echo "<table>";
             echo "<tr>"."<th>"."Source"."</th>"."<th>"."Destination"."</th>"."<th>"."Date"."</th>"."</tr>";
             while($results = mysqli_fetch_array($searchq)){
               echo "<tr>"."<td>".$results['source']."</td>"."<td>".$results['destination']."</td>"."<td>".$results['date']."</td>"."</tr>";

           }
           echo "</table>";
         }
           else {
             echo "<div style='text-align:center'>"."<b>"."No Rides has been taken till now"."</b>"."</div>";
           }

          ?>

















         <!--footer-BAR-->
       <div style="position:fixed; bottom:0;">
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
         <li>  <a href="#"><img src="../images/facebook.png"></a> </li>
         <li>  <a href="#"> <img src="../images/twitter.png"></a></li>
         <li>  <a href="#">  <img src="../images/google.png"></a></li>
         </ul>
         </div>
		 <a href="#" id="back-to-top" title="Back to top">↑</a>
         </div>
         </div>
         </div>
         </div>
       </div>

         <script>

	base_url = "http://www.truebus.co.in/";

	</script>
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
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});
</script>
</body>
</html>
