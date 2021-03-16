<?php
    session_start();
    include('IncludeNav.php');
    include('SqlQuery.php');
    $id= $_GET['blog_id'];
    $result=getFullBlog($id); 
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['blog_title'] ?></title>
</head>
<body>

    <h3 style="text-align:center;"><?php echo $row['blog_title'] ?></h3>
    <?php include('ImageDisplay.php');?>
    <br>
    <div>
    <p><?php 
        $result=getFullBlog($id); 
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        echo $row['blog_text'];
        ?>
                                   
    </p>
    </div>
   
    <hr>
    <h4>Comments:</h4>
    <hr>
    <?php 

        include('ReadComments.php');
        if (!isset($_SESSION['login_user_email'])){
    
        }else{
            
            include('PostComment.php');
        }
    ?>
    <div style="text-align:center;">
    <?php
     include('SocialMedia.html');
     ?>
    </div>

</body>
</html>