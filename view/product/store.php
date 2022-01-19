<?php
require_once '../../vendor/autoload.php';

use Pondit\Product;

$productObject = new Product;
$productObject->setData($_POST)->store();

?>