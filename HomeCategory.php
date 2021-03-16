<?php
  include('CheckSession.php');
  include('IncludeNav.php');
  $category=$_GET['category'];
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Based On Category</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

<?php
  
  $result=getCategoryIdArray($category);
  while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){  
   $id=$row['blog_id'];
?>
  <div class="card">
  <div class="card-body">
    <h5 class="card-title"><?php echo getTitle($id);?></h5>
    <p class="card-text"> <?php echo getDescription($id);?></p>
    <a href="ReadBlog.php?blog_id=<?php echo $id?>" class="btn btn-primary" style="float:right; margin:1px">Read the full blog</a>
  </div>
  </div>
<?php
}
?>
 
</body>
</html>

