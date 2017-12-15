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
          table-layout: fixed;
    width: 100%;

        }
        td{
          vertical-align: top;
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

            <div style="margin-top:11%;">
              <?php
              include('../dbconnect.php');
              $string ="";
              $string1= "";
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
                          $_SESSION['userid'] = $email;
                          $_SESSION['logged'] = true;
                          header('Location:user/usersearchbus.php');
                      }
                      else
                      {
                        sleep(2.5);
                          $message = "Invalid email or password!!";
                      }
                  }
                  else if($_POST['action']=="Search Buses"){
                    $from = $_POST['from'];
                    $_SESSION['from'] = $from;
                    $to = $_POST['to'];
                    $_SESSION['to'] = $to;
                    $doj = $_POST['doj'];
                    $_SESSION['doj'] = $doj;
                    $day = date('N', strtotime($doj));
                    $_SESSION['day'] = $day;
                    $searchq = mysqli_query($connection,"SELECT * FROM bus WHERE bus.routeno in (SELECT route.routeno FROM route WHERE route.source = '".$from."' AND route.destination = '".$to."') AND day = '".$day."'");
                    $results = mysqli_fetch_array($searchq);
                    if(count($results)>=1)
                    {
                      $searchq = mysqli_query($connection,"SELECT * FROM bus WHERE bus.routeno in (SELECT route.routeno FROM route WHERE route.source = '".$from."' AND route.destination = '".$to."') AND day = '".$day."'");

                      while($results = mysqli_fetch_array($searchq)){
                      echo "<div id='bus'>";
                      echo "<table>";
                      echo "<tr>";
                      echo "<td>";
                      echo "<span>"."<img src='../images/bussearch.png' height='30px'>"."</span>";
                      echo "<b style='font-size:15px'>"."&nbsp&nbsp&nbsp&nbsp&nbsp".$results['bustravels']."</b>";
                      echo "<p style='margin-left:16%;'>".$results['bustype']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                      echo "<p style='margin-left:16%;font-size:12px;'>".$results['busno']."</p>";
                      echo "</td>";
                      echo "<td>";
                      echo "<p>"."<b style='font-size:15px;'>"."<img src='../images/time.png' height='15px'>"."&nbsp&nbsp&nbsp".$results['deptime']."</b>"."&nbsp&nbsp&nbsp"."<img src='../images/rightarrow.png' height='15px'>"."&nbsp&nbsp&nbsp"."<b style='font-size:15px'>".$results['arrtime']."</b>"."</p>";
                      $string = $results['arrtime'];
                      $string1 = $results['deptime'];
                      $int = intval(preg_replace('/[^0-9]+/', '', $string), 10);
                      $int1 = intval(preg_replace('/[^0-9]+/', '', $string1), 10);
                      $x = $int-$int1;
                      $y = $x % 100;
                      $z = ((int)($x/100));
                      echo "<style='margin-left:18%;'>".$z."hrs"."&nbsp".$y."&nbsp"."mins"."</p>";
                      echo "</td>";
                      echo "<td >";
                      echo "<b style='font-size:18px; margin-left:12%'>"."<img src='../images/seat.png' height='30px'>"."&nbsp&nbsp&nbsp&nbsp".$results['Seats']."</b>"; //$row['index'] the index here is a field name
                      echo "<b style='font-size:18px; margin-left:18%'>"."<img src='../images/rupee.png' height='20px'>"."&nbsp&nbsp&nbsp&nbsp".$results['fare']."</b>";
                      echo "</td>";
                      echo "<td style='margin-left:0px;'>";

                      echo "<a data-dismiss='modal' href='#myModalc' data-toggle='modal' data-target='#myModalc' style='margin-left:6%;'>"."<input type='submit' value='Show Route' style='position: relative; width:8.6  % '>"."</a>";
                      echo "</td>";
                      echo "</tr>";
                      echo "</table>";
                      echo "</div>";
                      echo "<hr style='border-top: 1px dotted maroon'>";
                      }
                      echo "<a data-dismiss='modal' href='#myModalb' data-toggle='modal' data-target='#myModalb' style='margin-left:43%;'>"."<input type='submit' value='Book Now' style='position: relative;height:8%;width:15%;'>"."</a>";
                    }
                    else{
                      echo "<div style='text-align:center'>"."We are extremely sorry But we have no buses for this route right now"."</div>";
                    }
                  }

                }

                ?>
       </div>



       <div class="modal fade" id="myModalc" role="dialog">
          <div class="modal-dialog">
             <!-- Modal content-->
             <button type="button" class="close_lft" data-dismiss="modal" style="margin-right:-33.0%">×</button>
             <div class="login-block" style="width:150%;margin-left:-25%;">


               <div id="floating-panel">

      <select id="start">
        <option value="<?php echo $_SESSION['from']; ?>"><?php echo $_SESSION['from']; ?></option>
      </select>

      <select id="end">
        <option value="<?php echo $_SESSION['to']; ?>"><?php echo $_SESSION['to']; ?></option>
      </select>
    </div>


  <div id="map" ></div>
  <script>
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom:2,
          center: {lat: 26.8851417, lng: 75.6504713}
        });
        $("#myModalc").on("shown.bs.modal", function () {
          var currentCenter = map.getCenter();  // Get current center before resizing
          google.maps.event.trigger(map, "resize");
          map.setCenter(currentCenter);
          map.setZoom( Math.max(8, map.getZoom()) ); // Re-set previous center
        });
        directionsDisplay.setMap(map);

        // var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        // };
        document.getElementById('start')
        document.getElementById('end')

      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
          origin: document.getElementById('start').value,
          destination: document.getElementById('end').value,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }



    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAyMcjzj2Cx9U6zbveXAMswK5arrRzMt64&callback=initMap">
    </script>

          </div>
       </div>
       </div>




       <div class="modal fade" id="myModalb" role="dialog">
          <div class="modal-dialog">
             <!-- Modal content-->
             <button type="button" class="close_lft" data-dismiss="modal">×</button>
       <form id="signup" data-parsley-validate="" class="ng-pristine ng-valid" novalidate="" action="book.php" method="post">
             <div class="login-block">


                 <h1>Book Ticket</h1>
                 <input type="text" value="" class="username"  placeholder="Enter name" name="name" required="">
                 <input class="mobile" id="signup-username" type="text" name="mob" data-parsley-type="digits" data-parsley-required="true" data-parsley-trigger="change" required="" minlength="3" data-parsley-minlength="3" data-parsley-maxlength="15" placeholder="Mobile">
                 <input type="text" value="" class="username"  placeholder="Age" id="dfdfd" name="age" data-parsley-type="digits"  required="">
                 <select style="width:100%;height:40px;border-radius:6px; margin-bottom:25px;" name="sex">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Transgender</option>
                 </select>
                 <input type="text" data-parsley-maxlength="20" data-parsley-minlength="12" class="mobile" name="uid" required="" placeholder="Enter U-id (eg:- Adhaar Card Number)"><br>
                 <input type="text" value=""  placeholder="Enter Bus Number" name="busnumber" required="">
                 <br>

        <input name="action" type="submit" value="Book Now" style="position: relative;" >
                <br>
         <div class="small_loader" style="text-align:center;display:none"><img src="images/loader-small.gif"></div>
        <div class="signup_res" style="text-align:center;"></div>
                <br>
             </div>

       </form>
          </div>
       </div>
















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
