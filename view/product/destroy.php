<?php
require_once '../../vendor/autoload.php';
use Pondit\Product;

$productObject = new Product;
$productObject->destroy($_GET['id']);
?>