<?php 
  session_start();
  $index = 0;
  foreach($_SESSION["shoppingCart"] as $key=>$value) {
    if ($value->number == 1) {
      $index = $key;
      break;
    }
  }
  unset($_SESSION["shoppingCart"][$index]);
  session_unset();
?>