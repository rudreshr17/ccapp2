<?php
   include('CheckSession.php');
   include('IncludeNav.php');
   $error="";
   $id= $_SESSION['Edit_Blog_id'];
  // $id=$_POST['blog_id'];
   //$id=$_GET['blog_id'];
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    $message=EditBlogs($id,$_POST['blog_title'],$_POST['blog_description'],$_POST['blog_text']); 
    echo $message;
   }
   $result=getFullBlog($id); 
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   
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
   <h3>Edit Blog</h3>
   
     <form action = "" method = "post">
        <table style="margin:0 auto">
         <tr>
            <td>
              <label for="blog_title">Blog title</label>
            </td>
            <td>
             <textarea name="blog_title" id="blog_title" cols="50%" rows="2" ><?php echo $row['blog_title'] ?></textarea>
            </td>
           
         </tr>
         <tr>
            <td>
              <label for="blog_description">Blog Description</label>
            </td>
            <td>
            <textarea name="blog_description" id="blog_description" cols="50%" rows="10" ><?php echo $row['blog_description'] ?></textarea>
            </td>
         </tr>
         <tr>
            <td>
              <label for="blog_text">Blog Text</label>
            </td>
            <td>
            <textarea name="blog_text" id="blog_text" cols="50%" rows="10" ><?php echo $row['blog_text'] ?></textarea>
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











