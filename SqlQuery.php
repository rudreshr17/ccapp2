<?php
   include('Config.php');
  // session_start();
   
   function getTitle($blog_id) {
    GLOBAL $db;
    $sql = "SELECT blog_title FROM blog WHERE blog_id = '$blog_id'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $title= $row['blog_title'];
    return $title;
  }
  function getDescription($blog_id) {
    GLOBAL $db;
    $sql = "SELECT blog_description FROM blog WHERE blog_id = '$blog_id'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $description=$row['blog_description'];
    return $description;
  }
  function getIdArray(){
    GLOBAL $db;
    $sql = "SELECT blog_id FROM blog";
    $result = mysqli_query($db,$sql);
    return $result;
  }

  function getCategoryIdArray($category){
    GLOBAL $db;
    $sql = "SELECT blog_id FROM tags Where tag_name='$category' ";
    $result = mysqli_query($db,$sql);
    return $result;
  }

  function Login($useremail,$password){
    GLOBAL $db;
    $myuser_email = mysqli_real_escape_string($db,$useremail);
    $mypassword = mysqli_real_escape_string($db,$password);

    $sql = "SELECT user_name FROM user WHERE user_email = '$myuser_email' and user_password = '$mypassword'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    return $count;
  }
  function checkAccount($useremail){
      GLOBAL $db;
      $myuser_email = mysqli_real_escape_string($db,$useremail);
      //$mypassword = mysqli_real_escape_string($db,$_POST['password']);
      $sql = "SELECT user_name FROM user WHERE user_email = '$myuser_email'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      return $count;
  }
  function signUp($useremail,$password){
    GLOBAL $db;
    $myuser_email = mysqli_real_escape_string($db,$useremail);
    $mypassword = mysqli_real_escape_string($db,$password);
    $sql = "Insert into user (user_email,user_password) VALUES ('$useremail','$password')";
    if(mysqli_query($db,$sql)){
        echo "You have Signed up successfully.";
    }
    $_SESSION['login_user_email'] = $myuser_email;
  }
  function getMyBlogs($useremail){
    GLOBAL $db;
    $myuser_email = mysqli_real_escape_string($db,$useremail);
    $sql = "SELECT blog_id FROM blog Where user_email = '$useremail'";
    $result = mysqli_query($db,$sql);
    return $result;
  }
  function getFullBlog($id){
     Global $db;
     $sql = "SELECT blog_title,blog_description,blog_text FROM blog WHERE blog_id = '$id'";
     $result = mysqli_query($db,$sql);
     return $result;
  }
  function writeBlog($blog_title,$blog_description,$blog_text){
    GLOBAL $db;  
    $blog_title = mysqli_real_escape_string($db,$blog_title);
    $blog_description = mysqli_real_escape_string($db,$blog_description);
    $blog_text= mysqli_real_escape_string($db,$blog_text);
    $user_email= mysqli_real_escape_string($db,$_SESSION['login_user_email']);
    $blog_images=null;

    $sql = "Insert into blog (blog_title,blog_description,blog_text,user_email) VALUES ('$blog_title','$blog_description','$blog_text','$user_email')";
   
    if(mysqli_query($db,$sql)){
        return "Blog Posted Successfully.";
    }
  }
    function insertTag($blog_id,$tag_name){
      GLOBAL $db;
      $sql = "Insert into tags (blog_id,tag_name) Values('$blog_id','$tag_name') ";
      if(mysqli_query($db,$sql)){
        return "Blog Posted Successfully.";
    }
    return "Error Posting Blog.";
  }
  function EditBlogs($blog_id,$blog_title,$blog_description,$blog_text){
    GLOBAL $db;
    $blog_title = mysqli_real_escape_string($db,$blog_title);
    $blog_description = mysqli_real_escape_string($db,$blog_description);
    $blog_text= mysqli_real_escape_string($db,$blog_text);
    $sql="UPDATE blog SET blog_title = '$blog_title', blog_description= '$blog_description', blog_text='$blog_text' WHERE blog_id = '$blog_id'";
    if(mysqli_query($db,$sql)){
      return "Blog Edited Successfully.";
    }
    return "Error Editing Blog."; 
  }
 
  function EditProfile($user_email,$user_name,$user_bio){
      GLOBAL $db;
      $user_email = mysqli_real_escape_string($db,$user_email);
      $user_name = mysqli_real_escape_string($db,$user_name);
      $user_bio= mysqli_real_escape_string($db,$user_bio);
      $sql="UPDATE user SET user_email = '$user_email', user_name= '$user_name', user_bio='$user_bio' WHERE user_email = '$user_email'";
      if(mysqli_query($db,$sql)){
        return "Profile Edited Successfully.";
      }
      return "Error Editing Blog."; 
    }
  
  function postComments($id,$comment,$user_email){
     GLOBAL $db;
     $comment=mysqli_real_escape_string($db,$comment);
     $user_email=mysqli_real_escape_string($db,$user_email);
     $sql="Insert into comments (blog_id,comment,user_email) values('$id','$comment','$user_email')";
     if(mysqli_query($db,$sql)){
      
      return 1;
     }return 0;
  }
  function getComments($id){
    GLOBAL $db;
    $sql="Select comment,user_email FROM comments WHERE blog_id= '$id'";
    $result=mysqli_query($db,$sql);
    return $result;
  }
  function getImageArray($id){
    GLOBAL $db;
    $sql = "SELECT blog_images FROM blog_images where blog_id = '$id'";
    $result = mysqli_query($db,$sql);
    
    return $result;
  }
  function getProfile($email){
        GLOBAL $db;
       $sql="Select * from user where user_email ='$email'";
       $result=mysqli_query($db,$sql);
       if (!$result) {
        echo "Error: mysqli_error($db)";
    }
       return $result;
  }
?>