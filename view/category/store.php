<?php
require_once '../../vendor/autoload.php';

use Pondit\Category;

$studentObject = new Category;
$studentObject->setData($_POST)->store();
?>