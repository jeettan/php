<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $grandtotal = $_POST['grandtotal'];

    $displaytotal = number_format($grandtotal);

?>

<?php include 'connect.php'?>

<!DOCTYPE HTML>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title> E-commerce Project </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/1f3f07eb1e.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
</head>

<body>

<?php include "header.php" ?>

<div class="container3">
    
<div class="payments">
<form action="thank-you.php"  method="post">
<input type="hidden" name="grandtotal" value=<?php echo $grandtotal; ?>></input>
<h2> Checkout </h2>
<h3><u> GRAND TOTAL: $<?php echo $displaytotal; ?></u></h3>

<label> Full Name </label><br>
<input type="text" name="full_name" required></input><br>

<label> Credit card number </label><br>
<input type="text" required pattern="[0-9]{16}" title="16 digit code" maxlength=16 name="credit-card"></input><br>
<label> Security number (CVV) </label><br>
<input type="text" name="cvv" maxlength=3 required pattern="[0-9]{3}"></input><br>
<label> Expiry Date </label><br>
<input type="date" name="date" required></input><br>

<input type="submit" value="Confirm Purchase" onclick="return confirm('Are you sure you want to continue with your purchase?')">  </input>
</form>
</div>
</div>

</body>

</html>

<?php 


} else {

    echo "Submit from your shopping cart";
}

?>