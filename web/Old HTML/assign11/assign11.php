<?php
  $table = "";
  $total = 0;
  foreach ($_POST["products"] as $product) {
    $json = json_decode($product);
    $table .= "<tr><td>" . $json->name . "</td><td>$" . $json->price . "</td></tr>";
    $total += $json->price;
  }
  $table .= "<tr><td><b>Total:</b></td><td>$" . $total . "</td></tr>";
?>

<!DOCTYPE html>
<html lang="en-us">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
  <link rel="stylesheet" href="stylesheets/style11.css">
  <link rel="stylesheet" href="stylesheets/style11_2.css">
  <title>AetherNet Shop</title>
</head>

<body>
<header>
  <a href="../index.html" style="margin-left:30px"><b>CS 213 Assignments</b></a>
  <hr/>
</header>

<h2 style="margin-left:50px">Review Order:</h2>

<div>
  <h4>Buyer Information:</h4>
  <div><?=$_POST["first_name"]?> <?=$_POST["last_name"]?></div>
  <div><?=$_POST["phone"]?></div>
  <div><?=$_POST["address"]?></div>
</div>

<div>
  <h4>Card Information:</h4>
  <div>Type: <?=$_POST["card_type"]?></div>
  <div>Expiration: <?=$_POST["exp_date"]?></div>
</div>

<div>
  <h4>Order:</h4>
  <table id="order_table"><?=$table?></table>
</div>

<form action="assign11_a.php" method="POST" style="padding-top:30px">
  <button type="submit" name="submit" value="cancel">Cancel</button>
  <button type="submit" name="submit" value="confirm">Confirm Purchase</button>
</form>

</body>
</html>