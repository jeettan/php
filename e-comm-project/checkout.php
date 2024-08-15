<?php include 'connect.php'?>

<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $id = $_POST['open_mid'];

    $sql = "DELETE FROM `cart` WHERE product_id=$id";

    $result = $conn->query($sql);

}


?>

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

<div class="container">

<h1>Your Shopping Cart:</h1>

<div class="cart">

<table>
<tr>
<th> PRODUCT ID </th>
<th> Name </th>
<th> Quantity</th>
<th> Total Price </th>
<th>Image </th>
<th>Remove </th>
</tr>

<form action="" method="post">

<?php 

$sql = "SELECT * FROM `cart`";  
$result = $conn->query($sql);

$grandtotal =0;

while($row = $result->fetch_assoc()) {

    $ID = $row['product_id'];
    $name = $row['product_name'];
    $quantity = $row['quantity'];
    $price = $row['price'];
    $totalprice = $quantity * $price;
    $grandtotal +=$totalprice;
    $totalprice = number_format($totalprice);
    $img = $row['image'];

    echo "<tr><td> $ID </td> <td> $name</td> <td>$quantity</td> <td> $$totalprice  </td> <td>  <img src='images/{$img}' height=100px;></img></td> <td><button name='open_mid' value='{$ID}'><i class='fa-solid fa-trash'></i></button></td></tr>";

}

$grandtotaldisplay = number_format($grandtotal);

?>

</form>
</table>
</div>

<div class="sell">
<p><b>Grand total:</b>$<?php echo $grandtotaldisplay; ?></p>
<form action = "finalize.php" method = "post">
<input type="hidden" name="grandtotal" value=<?php echo $grandtotal; ?>></input> 
<button>Checkout</button>
</form>
</div>

</div>

</body>

</html>