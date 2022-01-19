<?php
require_once '../../vendor/autoload.php';
use Pondit\Product;

$productObject = new Product;
$productObject->delete($_GET['id']);
?>