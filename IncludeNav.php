<?php
    if (!isset($_SESSION['login_user_email'])){
        //echo "You are logged in!!!";
       include('nav.html');
    }else{
        //echo $_SESSION['login_user_email'];
       // echo "You are logged in!!";
        include('nav2.html');
    }
?>


