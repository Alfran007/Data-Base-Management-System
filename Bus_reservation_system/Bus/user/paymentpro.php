<?php
session_start();
include('../dbconnect.php');
if(isset($_POST['action']))
{
    if($_POST['action']=="SUBMIT")
    {
      echo "<div id='header'>";
      echo "<h1 style='margin-left:33%;color:maroon'>"."Your Transaction is Being Processed"."</h1>";
      echo "<p style='margin-left:33%;color:maroon'>"."Please don't close the browser"."</p>";
        $content = "<img src='../images/loader.gif' style='margin-left:44%' id='loader'>";
        echo $content;
        ob_flush();
        flush();
        sleep(5);
        echo "<br>";
        echo "<br>";
        echo "<div style='color:green;text-align:center; font-weight:bold;border: 1px solid green; height:3%; width:28%; padding:1%; background-color:lightgreen;margin-left:33%;'>"."Transaction Successful"."</div>";
        echo "</div>";
        echo "<script>document.getElementById('loader').style.display = 'none'</script>";
        ob_flush();
        flush();
        sleep(2);
        $busno = $_SESSION['busno'];
        $userid = $_SESSION['userid'];
        $name = $_SESSION['name'];
        $mob = $_SESSION['mob'];
        $age = $_SESSION['age'];
        $sex = $_SESSION['sex'];
        $uid = $_SESSION['uid'];
        $fare = $_SESSION['fare'];
        date_default_timezone_set("Asia/Kolkata");
        $date = date("Y/m/d");
        $time = date("h:i:sa");
        mysqli_query($connection,"INSERT INTO `book` (`busno`, `userid`, `name`, `mobileno`, `age`, `sex`, `date`, `time`, `uid`) VALUES ('".$busno."','".$userid."','".$name."','".$mob."','".$age."','".$sex."','".$date."','".$time."','".$uid."')");
        mysqli_query($connection,"UPDATE bus SET Seats = Seats - 1 WHERE busno = '".$busno."'");

        $searchq = mysqli_query($connection,"SELECT TicketNo FROM book ORDER BY TicketNo DESC LIMIT 1");
        while($results = mysqli_fetch_array($searchq)){
          $ticketno = $results['TicketNo'];
        }
        $searchq1 = mysqli_query($connection,"SELECT Seats FROM bus WHERE busno = '".$busno."'");
        while($results1 = mysqli_fetch_array($searchq1)){
          $seats = $results1['Seats'];
        }
        mysqli_query($connection,"INSERT INTO `Transactions` (`TicketNo`, `userid`, `date`, `time`, `fare`) VALUES ('".$ticketno."', '".$userid."', '".$date."', '".$time."','".$fare."')");
        echo "<br>";
        echo "<br>";
        echo "<div style='border: 2px solid black; padding-left:20%; id='ticket'>";
        echo "<h1>"."Go Bus : e-Ticket"."</h1>"."<br>";
        echo "<table margin-left:20%;>";
        echo "<tr>";
        echo "<td>";
        echo "<b>"."Ticket-No:"."</b>"."  ".$ticketno."<br>"."<br>";
        echo "<b>"."Name:"."</b>"."  ".$name."<br>"."<br>";
        echo "<b>"."Age:"."</b>"."  ".$age."<br>"."<br>";
        echo "<b>"."Sex:"."</b>"."  ".$sex."<br>"."<br>";
        echo "<b>"."Mobile No.:"."</b>"."  ".$mob."<br>"."<br>";
        echo "<b>"."U-ID:"."</b>"."  ".$uid."<br>"."<br>";
        echo "<b>"."Boarding point.:"."</b>"."  ".$_SESSION['from']." Roadways Bus Stand"."<br>"."<br>";
        echo "</td>";
        echo "<td style='padding-left:170px'>";
        echo "<b>"."Bus No.:"."</b>"."  ".$busno."<br>"."<br>";
        $seat = 46 - $seats;
        echo "<b>"."Seat No.:"."</b>"."  ".$seat."<br>"."<br>";
        echo "<b>"."From:"."</b>"."  ".$_SESSION['from']."<br>"."<br>";
        echo "<b>"."To:"."</b>"."  ".$_SESSION['to']."<br>"."<br>";
        echo "<b>"."Fare:"."</b>"."  ".$_SESSION['fare']."   INR"."<br>"."<br>";
        echo "<b>"."Date of Journey:"."</b>"."  ".$_SESSION['doj']."<br>"."<br>";
        echo "<b>"."Lodging point.:"."</b>"."  ".$_SESSION['to']." Roadways Bus Stand"."<br>"."<br>";
        echo "</td>";
        echo "</tr>";
        echo "<table>";
        echo "</div>";
        echo "<script>document.getElementById('header').style.display = 'none'</script>";
        echo "<span style='float:right;'>"."<a href='javascript:window.print()' type='button'>"."PRINT TICKET"."</a>"."</span>";

  }
  else if($_POST['action']=="SUBMIT...")
  {
    echo "<div id='header1'>";
    echo "<h1 style='margin-left:33%;color:maroon'>"."Your Transaction is Being Processed"."</h1>";
    echo "<p style='margin-left:33%;color:maroon'>"."Please don't close the browser"."</p>";
      $content = "<img src='../images/loader.gif' style='margin-left:44%' id='loader'>";
      echo $content;
      ob_flush();
      flush();
      sleep(5);
      echo "<br>";
      echo "<br>";
      echo "<div style='color:green;text-align:center; font-weight:bold;border: 1px solid green; height:3%; width:28%; padding:1%; background-color:lightgreen;margin-left:33%;'>"."Transaction Successful"."</div>";
      echo "</div>";
      echo "<script>document.getElementById('loader').style.display = 'none'</script>";
      ob_flush();
      flush();
      sleep(2);
      $busno = $_SESSION['busno'];
      $userid = $_SESSION['userid'];
      $name = $_SESSION['name'];
      $mob = $_SESSION['mob'];
      $age = $_SESSION['age'];
      $sex = $_SESSION['sex'];
      $uid = $_SESSION['uid'];
      $fare = $_SESSION['fare'];
      date_default_timezone_set("Asia/Kolkata");
      $date = date("Y/m/d");
      $time = date("h:i:sa");
      mysqli_query($connection,"INSERT INTO `book` (`busno`, `userid`, `name`, `mobileno`, `age`, `sex`, `date`, `time`, `uid`) VALUES ('".$busno."','".$userid."','".$name."','".$mob."','".$age."','".$sex."','".$date."','".$time."','".$uid."')");
      $searchq = mysqli_query($connection,"SELECT TicketNo FROM book ORDER BY TicketNo DESC LIMIT 1");
      mysqli_query($connection,"UPDATE bus SET Seats = Seats - 1 WHERE busno = '".$busno."'");

      while($results = mysqli_fetch_array($searchq)){
        $ticketno = $results['TicketNo'];
      }
      $searchq1 = mysqli_query($connection,"SELECT Seats FROM bus WHERE busno = '".$busno."'");
      while($results1 = mysqli_fetch_array($searchq1)){
        $seats = $results1['Seats'];
      }
      mysqli_query($connection,"INSERT INTO `Transactions` (`TicketNo`, `userid`, `date`, `time`, `fare`) VALUES ('".$ticketno."', '".$userid."', '".$date."', '".$time."','".$fare."')");
      echo "<br>";
      echo "<br>";
      echo "<div style='border: 2px solid black; padding-left:20%; id='ticket'>";
      echo "<h1>"."Go Bus : e-Ticket"."</h1>"."<br>";
      echo "<table margin-left:20%;>";
      echo "<tr>";
      echo "<td>";
      echo "<b>"."Ticket-No:"."</b>"."  ".$ticketno."<br>"."<br>";
      echo "<b>"."Name:"."</b>"."  ".$name."<br>"."<br>";
      echo "<b>"."Age:"."</b>"."  ".$age."<br>"."<br>";
      echo "<b>"."Sex:"."</b>"."  ".$sex."<br>"."<br>";
      echo "<b>"."Mobile No.:"."</b>"."  ".$mob."<br>"."<br>";
      echo "<b>"."U-ID:"."</b>"."  ".$uid."<br>"."<br>";
      echo "<b>"."Boarding point.:"."</b>"."  ".$_SESSION['from']." Roadways Bus Stand"."<br>"."<br>";
      echo "</td>";
      echo "<td style='padding-left:170px'>";
      echo "<b>"."Bus No.:"."</b>"."  ".$busno."<br>"."<br>";
      $seat = 46 - $seats;
      echo "<b>"."Seat No.:"."</b>"."  ".$seat."<br>"."<br>";
      echo "<b>"."From:"."</b>"."  ".$_SESSION['from']."<br>"."<br>";
      echo "<b>"."To:"."</b>"."  ".$_SESSION['to']."<br>"."<br>";
      echo "<b>"."Fare:"."</b>"."  ".$_SESSION['fare']."   INR"."<br>"."<br>";
      echo "<b>"."Date of Journey:"."</b>"."  ".$_SESSION['doj']."<br>"."<br>";
      echo "<b>"."Lodging point.:"."</b>"."  ".$_SESSION['to']." Roadways Bus Stand"."<br>"."<br>";
      echo "</td>";
      echo "</tr>";
      echo "<table>";
      echo "</div>";
      echo "<script>document.getElementById('header1').style.display = 'none'</script>";
      echo "<span style='float:right;'>"."<a href='javascript:window.print()' type='button'>"."PRINT TICKET"."</a>"."</span>";
      echo "<br>";

}
  else if($_post['action']=='LOGIN'){
    $busno = $_SESSION['busno'];
    $userid = $_SESSION['userid'];
    $name = $_SESSION['name'];
    $mob = $_SESSION['mob'];
    $age = $_SESSION['age'];
    $sex = $_SESSION['sex'];
    $uid = $_SESSION['uid'];
    $fare = $_SESSION['fare'];
    date_default_timezone_set("Asia/Kolkata");
    $date = date("Y/m/d");
    $time = date("h:i:sa");
    mysqli_query($connection,"INSERT INTO `book` (`busno`, `userid`, `name`, `mobileno`, `age`, `sex`, `date`, `time`, `uid`) VALUES ('".$busno."','".$userid."','".$name."','".$mob."','".$age."','".$sex."','".$date."','".$time."','".$uid."')");
    $searchq = mysqli_query($connection,"SELECT TicketNo FROM book ORDER BY TicketNo DESC LIMIT 1");
    mysqli_query($connection,"UPDATE bus SET Seats = Seats - 1 WHERE busno = '".$busno."'");

    while($results = mysqli_fetch_array($searchq)){
      $ticketno = $results['TicketNo'];
    }
    mysqli_query($connection,"INSERT INTO `Transactions` (`TicketNo`, `userid`, `date`, `time`, `fare`) VALUES ('".$ticketno."', '".$userid."', '".$date."', '".$time."','".$fare."')");
    header('Location: https://www.paypal.com/signin?country.x=IN&locale.x=en_IN');
  }
  else {
    $busno = $_SESSION['busno'];
    $userid = $_SESSION['userid'];
    $name = $_SESSION['name'];
    $mob = $_SESSION['mob'];
    $age = $_SESSION['age'];
    $sex = $_SESSION['sex'];
    $uid = $_SESSION['uid'];
    $fare = $_SESSION['fare'];
    date_default_timezone_set("Asia/Kolkata");
    $date = date("Y/m/d");
    $time = date("h:i:sa");
    mysqli_query($connection,"INSERT INTO `book` (`busno`, `userid`, `name`, `mobileno`, `age`, `sex`, `date`, `time`, `uid`) VALUES ('".$busno."','".$userid."','".$name."','".$mob."','".$age."','".$sex."','".$date."','".$time."','".$uid."')");
    $searchq = mysqli_query($connection,"SELECT TicketNo FROM book ORDER BY TicketNo DESC LIMIT 1");
    mysqli_query($connection,"UPDATE bus SET Seats = Seats - 1 WHERE busno = '".$busno."'");

    while($results = mysqli_fetch_array($searchq)){
      $ticketno = $results['TicketNo'];
    }
    mysqli_query($connection,"INSERT INTO `Transactions` (`TicketNo`, `userid`, `date`, `time`, `fare`) VALUES ('".$ticketno."', '".$userid."', '".$date."', '".$time."','".$fare."')");
    if($_POST['radio'] == 'apb'){
      header('Location: https://www.onlineandhrabank.net.in/');
    }
    else if($_POST['radio'] == 'ab'){
      header('Location: https://www.allbankonline.in/jsp/disclaimer.jsp');
    }
    else if($_POST['radio'] == 'bob'){
      header('Location: https://www.bobibanking.com/');
    }
    else if($_POST['radio'] == 'cb'){
      header('Location: https://netbanking.canarabank.in/entry/ENULogin.jsp#');
    }
    else if($_POST['radio'] == 'idbi'){
      header('Location: https://inet.idbibank.co.in/corp/BANKAWAY?Action.RetUser.Init.001=Y&AppSignonBankId=IBKL&AppType=corporate');
    }
    else if($_POST['radio'] == 'icici'){
      header('Location: https://www.icicibank.com/Personal-Banking/insta-banking/internet-banking/index.page');
    }
    else if($_POST['radio'] == 'iob'){
      header('Location: https://www.iobnet.co.in/ibanking/login.do');
    }
    else if($_POST['radio'] == 'pnb'){
      header('Location: https://www.netpnb.com/');
    }
    else if($_POST['radio'] == 'sib'){
      header('Location: https://sibernet.southindianbank.com/corp/AuthenticationController?FORMSGROUP_ID__=AuthenticationFG&__START_TRAN_FLAG__=Y&FG_BUTTONS__=LOAD&ACTION.LOAD=Y&AuthenticationFG.LOGIN_FLAG=1&BANK_ID=059');
    }
    else if($_POST['radio'] == 'sbi'){
      header('Location: https://retail.onlinesbi.com/retail/login.htm');
    }
    else if($_POST['radio'] == 'cub'){
      header('Location: https://www.onlinecub.net/');
    }
    else if($_POST['radio'] == 'hdfc'){
      header('Location: https://netbanking.hdfcbank.com/');
    }
    else if($_POST['radio'] == 'iib'){
      header('Location: https://indusnet.indusind.com/corp/BANKAWAY?Action.RetUser.Init.001=Y&AppSignonBankId=234&AppType=corporate&CorporateSignonLangId=001');
    }
    else if($_POST['radio'] == 'sb'){
      header('Location: https://www.syndicatebank.in/english/netbanking_retail.aspx');
    }
    else if($_POST['radio'] == 'db'){
      header('Location: https://login.deutschebank.co.in/');
    }
    else if($_POST['radio'] == 'cb'){
      header('Location: https://www.corpretail.com/');
    }
    else if($_POST['radio'] == 'ub'){
      header('Location: https://www.ucoebanking.com/');
    }
    else if($_POST['radio'] == 'ib'){
      header('Location: https://www.indianbank.net.in/');
    }
    else if($_POST['radio'] == 'fb'){
      header('Location: http://www.federalbank.co.in/internet-banking');
    }
    else{
      header('Location: https://www.kotak.com/j1001mp/netapp/MainPage.jsp');
    }


  }

  }

  echo "<a style='float:right;margin-right:50%; text-decoration:none' href='http://localhost/Bus/user/user.php' type='button'>"."Go Home"."</a>";
 ?>
