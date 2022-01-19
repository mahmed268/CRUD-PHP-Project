<?php
require_once '../../vendor/autoload.php';
use Pondit\Category;

$studentObject = new Category;
$studentObject->destroy($_GET['id']);
?>