<?php
   //include('Config.php');
   include('SqlQuery.php');
   session_start();

   $check_user_email = $_SESSION['login_user_email'];

   $result = mysqli_query($db,"select user_name from user where user_email = '$check_user_email' ");
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   $login_session_user_name = $row['user_name'];

   //$sql = "SELECT user_name FROM user WHERE user_name = '$myusername' and user_password = '$mypassword'";
   //$result = mysqli_query($db,$sql);
   //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   //$count = mysqli_num_rows($result);

   if(!isset($_SESSION['login_user_email'])){
      header("location:Login.php");
      die();
   }
?>
