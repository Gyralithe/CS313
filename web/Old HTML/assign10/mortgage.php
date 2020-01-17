<?php 
$apr = $_GET['apr'];
$term = $_GET['term'];
$amount = $_GET['amount'];

$r = ($apr / 100 / 12);
$n = ($term * 12);
$result = (($amount * $r * pow((1 + $r), $n)) / (pow((1 + $r), $n) - 1));

/*
  FROM ORIGINAL JAVASCRIPT
  var r = (apr / 100 / 12);
  var n = (term * 12);
  var result = (amount * r * ((1 + r) ** n)) / (((1 + r) ** n) - 1);
*/
?>

<!DOCTYPE html>
<html lang="en-us">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styleM10P.css">
  <title>Mortgage Payment Calculation</title>
</head>

<body>
<a href="assign10.html"><b>Assignment 10</b></a>
<span> || </span>
<a href="../../assignments.html"><b>CS 213 Assignments</b></a>
<h1>Mortgage Payment Calculator</h1>

<div>
  <div>APR: <?php echo $apr; ?></div>
  <br/>
  <div>Loan Term (in years): <?php echo $term; ?></div>
  <br/>
  <div>Loan Amount: <?php echo $amount; ?></div>
  <br/>
  <div>Monthly Payment: <?php echo number_format($result, 2); ?></div>
</div>

<!-- <form onkeypress="checkKey(event)">
  <label for="apr">APR: </label><br/>
  <br/>
  <label for="term">Loan Term (in years): </label><br/>
  <br/>
  <label for="amount">Loan Amount: <br/>$</label>
  <br/>
  <label for="payment">Monthly Payment:<br/>$</label>
  <br/>
</form> -->

</body>
</html>