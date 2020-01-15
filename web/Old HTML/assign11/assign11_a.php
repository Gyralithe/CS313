<!DOCTYPE html>
<html lang="en-us">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
  <link rel="stylesheet" href="stylesheets/style11.css">
  <link rel="stylesheet" href="stylesheets/style11_3.css">
  <title>AetherNet Shop</title>
</head>

<body>
<header>
  <a href="../index.html" style="margin-left:30px"><b>CS 213 Assignments</b></a>
  <hr/>
</header>

<h2 id="text" style="margin-left:50px"><?php echo $_POST["confirm"]?></h2>

<script>
  if ("<?php echo $_POST["submit"]?>" == "confirm")
    document.getElementById("text").innerHTML = "Your order has been placed.";
  else if ("<?php echo $_POST["submit"]?>" == "cancel")
    document.getElementById("text").innerHTML = "Your order has been cancelled.";
</script>

</body>
</html>