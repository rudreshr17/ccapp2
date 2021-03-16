<?php
   include('CheckSession.php');
   include('IncludeNav.php');
   $error="";
   $user_email=$_SESSION['login_user_email'];

   if($_SERVER["REQUEST_METHOD"] == "POST") {
    $message=EditProfile($user_email,$_POST['user_name'],$_POST['user_bio']); 
    echo $message;
    //header("location:UploadProfile.php");
   }
   $result=getProfile($user_email); 
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Information</title>
</head>
<body bgcolor = "#FFFFFF" >
   <div style="text-align:center; border:0px solid black;margin:0 auto;">
   <h3>Edit Profile</h3>
   
     <form action = "" method = "post">
        <table style="margin:0 auto">
         <tr>
            <td>
              <label for="user_email">User Email: </label>
            </td>
            <td>
              <p id="user_email"><?php echo $user_email?></p>
            </td>
           
         </tr>
         <tr>
            <td>
              <label for="user_name">User Name: </label>
            </td>
            <td>
            <textarea name="user_name" id="user_name" cols="40%" rows="1" ><?php echo $row['user_name'] ?></textarea>
            </td>
         </tr>
         <tr>
            <td>
              <label for="user_bio">User Bio: </label>
            </td>
            <td>
            <textarea name="user_bio" id="user_bio" cols="40%" rows="1" ><?php echo $row['user_bio'] ?></textarea>
            </td>
         </tr>
            <tr>
             <td></td>
             <td> <input type = "submit" value = "Save Changes"/></td>

            </tr>
      
        </table>
      </form>
   
   </div>
     
   </body>
</html>











