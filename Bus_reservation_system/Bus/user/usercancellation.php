<?php include('../signup.php');
session_start();
$name = $_SESSION['userid'];

?>
<html ng-app="myFrontend" class="ng-scope"><head><style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\:form{display:block;}.ng-animate-shim{visibility:hidden;}.ng-anchor{position:absolute;}</style>
      <meta http-equiv="content-type" content="text/html; charset=UTF-8">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
         <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta name="description" content="">
      <meta name="author" content="">

	  <!-- <link rel="shortcut icon" type="image/png" href="http://www.truebus.co.in/admin-panel/assets/uploads/favicons/1472116690_1469446049_TrueBus.png"> -->
      <title>GO BUS :Cancel your Bus Tickets  | Online Bus Ticket Booking, Book Volvo AC Bus Tickets, Reservation</title>
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
         <div class="tb_header">
            <div class="container">
               <div class="col-md-6" style="padding:0;">
                  <div class="tb_logo"> <a href="http://www.truebus.co.in/home"><img src="../images/bus logo.png"> </a> </div>
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



				     <!------logged in---------------->

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
                             <!------logged end---------------->
              <div class="shadow" style="height:20px;"><img src="../images/shadow.png"></div>
               </div>
            </div>
         </div>
         <!--HEADER-BAR-END-->
           <div class="container">
            <div class="row" style="min-height:400px;margin-top:120px;">
      <div class="col-md-2"></div>
			 <div class="col-md-8">
				 <div class="cancellation_tb">
					 <h4 class="ticket_cancel">Ticket cancellation and refund</h4>
					 <p class="ticket_des">Follow our simple and hassle-free 2 step process to cancel your ticket. Once your ticket is cancelled, stay <br>constantly informed on the status of your refund. Get going with it right away! </p>
				 </div>



				   <div class="card"> Enter your details below </div>
  <div class="card">


    <form class="ng-pristine ng-valid" action="" method="post">
      <div class="input-container">
        <input type="text" id="Username" name="ticketno" required="required">
        <label for="Ticket Number">Ticket Number</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" id="email" name='busno' required="required">
        <label for="Password">Bus Number</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <input name="action" type="submit" value="Cancel" style="position: relative;" >
      </div>

    </form>
  </div>




  <?php
  include('../dbconnect.php');

  if(isset($_POST['action']))
  {
    if($_POST['action']=="Cancel"){
      $ticketno = $_POST['ticketno'];
      $busno = $_POST['busno'];
      $searchq=mysqli_query($connection,"SELECT * FROM `book` WHERE TicketNo = '".$ticketno."' AND userid = '".$_SESSION['userid']."'");
      $results = mysqli_fetch_array($searchq);
      if(count($results)>=1)
      {
        mysqli_query($connection,"DELETE FROM `book` WHERE TicketNo = '".$ticketno."' AND userid = '".$_SESSION['userid']."'");
        mysqli_query($connection,"UPDATE bus SET Seats = Seats + 1 WHERE busno = '".$busno."'");
        echo "<br>";
        echo "<div id='success'  style='color:green;text-align:center; font-weight:bold;border: 1px solid green; height:8%; width:100%; padding:1%; background-color:lightgreen;margin-left:20%;'>"."Your Booking is cancelled and your money will be refunded within one day"."</div>";
        ob_flush();
        flush();
        sleep(4);
        echo "<script>document.getElementById('success').style.display = 'none'</script>";
      }
      else {
        echo "<br>";
        echo "<div id='success'  style='color:green;text-align:center; font-weight:bold;border: 1px solid green; height:8%; width:100%; padding:1%; background-color:lightgreen;margin-left:20%;'>"."Sorry, No Such Ticket is Booked"."</div>";
        ob_flush();
        flush();
        sleep(4);
        echo "<script>document.getElementById('success').style.display = 'none'</script>";
      }

    }
  }
    ?>




				</div>
				 <div class="col-md-2"></div>

            </div>
         </div>
         <!--footer-BAR-->
         </a><div class="container"><a href="#">
         </a><div class="row"><a href="#">
         </a><div class="tb_inner"><a href="#">
         </a><div class="col-md-9"><a href="#">
         </a><div class="tb_footer"><a href="#">
         </a><ul><a href="#">
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
		 <a href="#" id="back-to-top" title="Back to top" class="">↑</a>
         </div>
         </div>
         </div>
         </div>	<script>

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



</body></html>
