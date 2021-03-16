<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>

</head>



<body >
    <div style="text-align:center;">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="margin:0 auto;width: 60%; ">

        <div class="carousel-inner">
                 <?php
                     STATIC $check=1;
                    $result=getImageArray($id);
                    while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){  
                    $images=$row['blog_images'];
                    $count = mysqli_num_rows($result);
                    if($check == 1){
                 ?>
                    <div class="carousel-item active">
                    <img class="d-block  mx-auto" width="100%" height="400" src="<?php echo $images?>" alt="No images Present">
                    </div>
                <?php
                   $check++;
                   }
                if($check != 1){
                ?>
             <div class="carousel-item ">
                <img class="d-block  mx-auto" width="100%" height="400" src="<?php echo $images?>" alt="No images Present">
            </div>
            <?php
                }}
            ?>
            
           

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</html>