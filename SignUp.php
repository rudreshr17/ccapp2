<?php
  
   session_start();
   include('SqlQuery.php');
   include("IncludeNav.php");
    $error="";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $count=checkAccount($_POST['useremail']);
   // echo "count is $count";
    if($count == 1) {
        $error = "You already have an account, please Login.";
        
    }else {
        signUp($_POST['useremail'],$_POST['password']);
        /*$sql = "Insert into user (user_email,user_password) VALUES ('$myuser_email','$mypassword')";
        if(mysqli_query($db,$sql)){
            echo "You have Signed up successfully.";
        }
        $_SESSION['login_user_email'] = $myuser_email;
        */
         header("location: Home.php");
      
    }
    }

     
     


?>

<html>

   <head>
   <style>
    table, th, td {
      padding: 5px;
    }
    table {
      border-spacing: 15px;
    }
</style>
      <title>SignUp Page</title>
   </head>
   <body>
   <div style="text-align:center; border:1px solid black;margin:0 30%;padding:2px;">
   <h3>New Account</h3>
     <form action = "" method = "post">
        <table style="margin:0 auto" cellspacing="30">
         <tr>
            <td>
              <label for="useremail">User Email</label>
            </td>
            <td>
              <input type = "email" name = "useremail" id="useremail" required/>
            </td>
         </tr>
         <tr>
            <td>
              <label for="password">Password</label>
            </td>
            <td>
            <input type = "password" name = "password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required/>
            </td>
         </tr>
        <tr>
           <td>
             <input type = "submit" value = "SignUp"/>
           </td>
           <td>
              <a href="Login.php">Already have an account?</a>
            </td>
        </tr>
      
        </table>
      </form>
   
     <?php echo $error; ?>
   </div>
     
   </body>

</html>