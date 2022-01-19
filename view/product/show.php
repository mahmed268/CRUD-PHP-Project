<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Product</title>
</head>
<body>

<?php
require_once '../../vendor/autoload.php';

use Pondit\Product;

$productObject = new Product;
$product = $productObject->show($_GET['id']);
   
?>

<a href="index.php">List</a>

<p>Title: <?php echo $product['title'] ?></p>
<p>Description: <?php echo $product['description'] ?></p>
<p>Price: <?php echo $product['price'] ?></p>
<img src="../../assets/images/<?php echo $product['picture']?>" height="150px" width="200px" alt="">

</body>
</html>