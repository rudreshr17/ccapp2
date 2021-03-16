<?php
  include('CheckSession.php');
  include('IncludeNav.php');
  
  $blog_id= $_SESSION['last_id'];
  $message="";
?>

<?php

if(isset($_FILES['image'])){

$errors= array();
$file_name = 'image'.$blog_id;

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
    move_uploaded_file($file_tmp,"Images/".$file_name.'.'.$file_ext);
     $message= "Success";
     $blog_images="Images/".$file_name.'.'.$file_ext;
     $sql = "Insert into blog_images(blog_id,blog_images) VALUES ('$blog_id','$blog_images')";
     if(mysqli_query($db,$sql)){
         echo "You have Uploaded image successfully.";
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