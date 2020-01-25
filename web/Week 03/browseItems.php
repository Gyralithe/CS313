<?php
  session_start();
  if(!isset($_SESSION["shoppingCart"])) {
    $_SESSION["shoppingCart"] = array();
  }
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="stylesheets/style_master.css">
  <title>AetherNet Shop</title>
</head>

<body>

<header>
  <span><h1>AetherNet Shop</h1></span>
  <span style="margin-right:50px;"><button id="cartButton" onclick="window.location.href = 'viewCart.php';">
    View Cart</button></span>
  <hr/>
</header>

<ul>
  <hr/>
  <li>
    <span>One (1) egg | $1.99</span>
    <button onclick="addItem(1)">Add to Cart</button>
    <hr/>
  </li>
</ul>


<script>
cartQuantity = <?php echo count($_SESSION["shoppingCart"])?>;

function addItem(number) {
  var request = "items/add_item" + number + ".php";
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        cartQuantity++;
        document.getElementById("cartButton").innerHTML = "View Cart (" + cartQuantity + ")";
    }
  };
  xhttp.open("POST", request, true);
  xhttp.send();
}

</script>

<!-- 
  Ideas:
  Each item listed will be an item in a <ul> with a button at the end that says "Add to Cart"
  Once pressed, that button will make an AJAX call through the JS function addItem()
  The function will pass a number....
  Am I going to have to call a different PHP to add each item?
  Or can I make each button "submit a form" to one PHP file without shifting pages?
-->

</body>
</html>