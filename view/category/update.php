<?php
require_once '../../vendor/autoload.php';

use Pondit\Category;

$categoryObject = new Category;
$categoryObject->setData($_POST)->update($_POST['category_id']);

?>