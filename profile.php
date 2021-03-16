<?php
     include('CheckSession.php');
     include('IncludeNav.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>profile</title>
  </head>
  <body style="text-align:center;">
    <?php
      $email=$_SESSION['login_user_email'];
      $result=getProfile($email);
      $cookie_name = "user";
      $cookie_value = $_SESSION['login_user_email'];
      setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
      while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
      ?> 
      <table  style="margin:0 auto; ">
        <tr>
          <td>
          <img src="<?php echo $row['user_profile_picture']?>" alt="image 1"  style="width:250px; height:250px;" hidden>
          </td>
          <td>
          <table class="table">
           <tr>
             <td>
               <p>UserName:</p>
             </td>
             <td>
               <p>
               <?php 
                if($row['user_name']==""){
                      echo "NULL";
                }else{
                  echo $row['user_name'];
                }
                ?>
               </p>

             </td>
           </tr>
           <tr>
             <td>
               <p>UserEmail: </p>
             </td>
             <td>
               <p>  
               <?php echo $row['user_email'];?>   
               </p>

             </td>
           </tr>
           <tr>
             <td>
               <p>Bio:</p>
             </td>
             <td>
               <p>
               <?php 
                if($row['user_bio']==""){
                      echo "NULL";
                }else{
                  echo $row['user_bio'];
                }
                ?>
               </p>

             </td>
           </tr>
           <tr>
             <td></td>
             <td><a href="EditInformation.php" class="btn btn-primary" style="float:right; margin:3px ">Edit Information</a></td>
           </tr>

       </table> 
        
          </td>
        </tr>
      </table>
     

    
      <?php
          }
      ?>

  

  </body>
</html>
