<?php
require_once '../../vendor/autoload.php';
use Pondit\Product;

$productObject = new Product;
echo "<pre>";


$list = $productObject->getProductsByCategoryId($_GET['id']);
// header("Location:../../product_list.php?data=$list");
?>