<?php   
   session_start();
   include("SqlQuery.php");
   include("IncludeNav.php");

  
   $error="";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
     
      $count=Login($_POST['useremail'],$_POST['password']);
      if($count == 1) {
         $_SESSION['login_user_email'] = $_POST['useremail'];
        // $_SESSION['login_user_name'] =$row['user_name'];
         header("location: Home.php");
      }else { 
         $error = "Your Login Name or Password is invalid";
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
      <title>Login Page</title>
   </head>

   <body bgcolor = "#FFFFFF" >
   <div style="text-align:center; border:1px solid black;margin:0 30%;padding:2px;">
   <h3>Login</h3>
     <form action = "" method = "post">
        <table style="margin:0 auto">
         <tr>
            <td>
              <label for="useremail">User Email</label>
            </td>
            <td>
              <input type = "email" name = "useremail" id="useremail"  required/>
            </td>
         </tr>
         <tr>
            <td>
              <label for="password">Password</label>
            </td>
            <td>
            <input type = "password" name = "password" id="password" required/>
            </td>
         </tr>
        <tr>
           <td>
             <input type = "submit" value = "Login"/>
           </td>
           <td>
            <a href="SignUp.php">Don't have an account?</a>
           </td>
        </tr>
      
        </table>
      </form>
   
     <?php echo $error; ?>
   </div>
     
   </body>

</html>
