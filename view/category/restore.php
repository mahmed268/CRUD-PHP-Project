<?php
require_once '../../vendor/autoload.php';
use Pondit\Category;

$studentObject = new Category;
$studentObject->restore($_GET['id']);
?>