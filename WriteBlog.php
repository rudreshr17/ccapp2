<?php
   include('CheckSession.php');
   include('IncludeNav.php');
   $error="";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $message=writeBlog($_POST['blog_title'],$_POST['blog_description'],$_POST['blog_text']); 
      $last_id = mysqli_insert_id($db);
      $tag_name=$_POST['tag_name'];
      $_SESSION['last_id']=$last_id;
      //echo $tag_name;
      $message=insertTag($last_id,$_POST['tag_name']);
       header("location:UploadFiles.php");
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write Blog</title>
</head>
<body bgcolor = "#FFFFFF" >
   <div style="text-align:center; border:1px solid black;margin:0 auto;">
   <h3>Write Blogs</h3>
     <form action = "" method = "post">
        <table style="margin:0 auto">
         <tr>
         <td>
              <label for="blog_title">Blog Title: </label>
            </td>
            <td>
            <textarea name="blog_title" id="blog_title" cols="50%" rows="2" required></textarea>
            </td>

            
         </tr>
         <tr>
            <td>
              <label for="blog_description">Blog Description: </label>
            </td>
            <td>
            <textarea name="blog_description" id="blog_description" cols="50%" rows="10" ></textarea>
            </td>
         </tr>
         <tr>
            <td>

            </td>
         </tr>
         <tr>
            <td>
              <label for="blog_text">Blog Text: </label>
            </td>
            <td>
            <textarea name="blog_text" id="blog_text" cols="50%" rows="10" ></textarea>
            </td>
         </tr>
         <tr>
            <td>
              <label for="tag_name">Select Tag Name: </label>
            </td>
            <td>
            
              <select id="tag_name" name="tag_name">
               <option value="Travel">Travel</option>
               <option value="Technology">Technology</option>
               <option value="Sports">Sports</option>
               <option value="Food">Food</option>
               <option value="Education">Education</option>
               </select>
           
            </td>
         </tr>

            <tr>
             <td></td>
             <td> <input type = "submit" value = "Next"/></td>

            </tr>
      
        </table>
      </form>
   
   </div>
     
   </body>
</html>