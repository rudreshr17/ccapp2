<?php
  include('CheckSession.php');
  include('IncludeNav.php');
  $id=$_POST['blog_id'];
  $_SESSION['Edit_Blog_id']=$id;
  header("location:EditBlogs.php");
?>