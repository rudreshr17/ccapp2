<?php
   include('CheckSession.php');
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id= $_POST['blog_id'];  
    $comment=$_POST['comment'];
    $message=postComments($id,$comment,$_SESSION['login_user_email']);
    echo $message ."This is just message";
    if($message == 1){
        header("location:ReadBlog.php?blog_id=$id");
    }else{
        echo "Error Posting Comment";
    }
  
   }
?>