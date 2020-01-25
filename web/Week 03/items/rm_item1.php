<?php 
  session_start();
  $index = 0;
  foreach($_SESSION["shoppingCart"] as $item) {
    if ($item["number"] == 1) {
      break;
    }
    $index++;
  }
  // unset($_SESSION["shoppingCart"][$index])
?>