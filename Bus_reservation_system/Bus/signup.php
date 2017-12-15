<?php
include('dbconnect.php');
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
            $message = "Invalid email or password!!";
            echo "Invalid Email or Password";
        }
    }
    elseif($_POST['action']=="Sign up")
    {
        $mob       = mysqli_real_escape_string($connection,$_POST['mob']);
        $email      = mysqli_real_escape_string($connection,$_POST['username']);
        $password   = mysqli_real_escape_string($connection,$_POST['password']);
        $query = "SELECT Email FROM user where Email='".$email."'";
        $result = mysqli_query($connection,$query);
        $numResults = mysqli_num_rows($result);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
        {
            $message =  "Invalid email address please type a valid email!!";
        }
        elseif($numResults>=1)
        {
            $message = $email." Email already exist!!";
            echo "$email. Email already exist!!";
        }
        else
        {
            mysqli_query($connection,"insert into user(Email,Mobile,Password) values('".$email."','".$mob."','".md5($password)."')");
            $message = "Signup Sucessfully!!";
            session_start();
            $_SESSION['userid'] = $email;
            $_SESSION['logged'] = true;

            // echo "Signup successfully";
            header('Location: user/user.php');
        }
    }
}
?>
