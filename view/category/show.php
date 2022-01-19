<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <?php
    require_once '../../vendor/autoload.php';

    use Pondit\Category;

    $categoryObject = new Category;
    $category = $categoryObject->show($_GET['id']);
   
    ?>

    <div class="container my-4">
        <h1 class="text-center">Product Details</h1>
        <a class="btn btn-primary" href="index.php">Category List</a>
        <p>Title: <?php echo $category['title'] ?></p>
        <p>Description: <?php echo $category['description'] ?></p>
        <img src="../../assets/images/<?php echo $category['picture'] ?>" height="100" alt="">
    </div>




</body>

</html>