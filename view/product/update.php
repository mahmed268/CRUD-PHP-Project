<?php
require_once '../../vendor/autoload.php';

use Pondit\Product;

$productObject = new Product;
$productObject->setData($_POST)->update($_POST['product_id']);

?>