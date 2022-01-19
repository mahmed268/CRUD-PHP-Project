<?php
require_once '../../vendor/autoload.php';
use Pondit\Category;

$studentObject = new Category;
$studentObject->delete($_GET['id']);
?>