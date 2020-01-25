<?php

session_start();
class item {
public $name;
public $price;
public $number;
}

$item = new item();
$item->name = "One (1) egg";
$item->price = "1.99";
$item->number = 1;

array_push($_SESSION["shoppingCart"], $item)

?>