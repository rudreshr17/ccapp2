<?php
  include('CheckSession.php');
  include('IncludeNav.php');
  
  $user_email=$_SESSION['login_user_email'];
  $message="";
?>

<?php

if(isset($_FILES['image'])){

$errors= array();
$file_name = $user_email;

$file_size =$_FILES['image']['size'];

$file_tmp =$_FILES['image']['tmp_name'];

$file_type=$_FILES['image']['type'];


$arrayVar = (explode(".", $_FILES['image']['name']));
$file_ext = strtolower(end($arrayVar));

$extensions= array("","jpeg","jpg","png");

if(in_array($file_ext,$extensions)=== false){
       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
}
if($file_size > (2097152*10)){
    $errors[]='File size must be less than 20 MB';
}
if(empty($errors)==true){
    move_uploaded_file($file_tmp,"ProfileImages/".$file_name.'.'.$file_ext);
     $message= "Success";
     $user_profile="ProfileImages/".$file_name.'.'.$file_ext;
     $user_email=$_SESSION['login_user_email'];
     $sql = "Insert into user(user_profile_picture) VALUES ('$user_profile') WHERE user_email ='$user_email' ";
     if(mysqli_query($db,$sql)){
         echo "You have Uploaded Profile image successfully.";
     }
     
}
else{
    print_r($errors);
}
    
}
    
?>
    
    <html>
    
    <body>
    
    <form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="image" />
    <input type="submit"/>
    
    </form>
    <?php echo $message;?>
    </body>
    
    </html>