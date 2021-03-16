

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Post Comments</title>
</head>
<body>
<form action="helperphp.php" method="post">
            <div class="form-group">
             <label for="comment"></label>
             <textarea class="form-control" rows="5" id="comment" name="comment" style="border:1px solid black"></textarea>
           </div>
             <input type="text" id='blog_id' name='blog_id' value=<?php echo $id?> hidden>
            <input type="submit" class="btn btn-primary"  value="Post comment">
            </form>
</body>
</html>