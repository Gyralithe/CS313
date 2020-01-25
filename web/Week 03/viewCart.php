<?php
  session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="stylesheets/style_master.css">
  <title>AetherNet Shop</title>
</head>

<body onload="displayCart()">

<header>
  <h1>AetherNet Shop</h1>
  <hr/>
</header>

<ul id="cartDisplay">
  </hr>
</ul>


<script>
  function displayCart() {
    cart = JSON.parse(<?php echo json_encode($_SESSION["shoppingCart"])?>);
    cart.forEach(displayItem);
  }

  function displayItem(item) {
    insert = "<li><span>" + item.name + " | " + item.price + "</span>";
    insert += "<button onclick='removeItem(" + item.number + ")'>Remove</button><hr/></li>";
    document.getElementById("cartDisplay").innerHTML += insert;
  }

  function removeItem(number) {
  var request = "items/rm_item" + number + ".php";
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      displayCart();
    }
  };
  xhttp.open("POST", request, true);
  xhttp.send();
}
</script>

</body>
</html>