<?php include 'connect.php'?>

<?php 

$sql = "SELECT quantity FROM `cart`";

$result = $conn->query($sql);

$quantity =0;

while($row = $result->fetch_assoc()){

    $quantity = $quantity +$row['quantity'];

}

?>

<nav> 
<ul>
<li class="sticky"> <a href="index.php"><img src="header.png" height="25px" width="auto" style="margin-left: 10px"></img></a></li>
<li style="float:right"><a href="checkout.php"><i class="fa-solid fa-cart-shopping"></i></a><?php echo " " . $quantity; ?></li>
<li style="float:right"><a href="add_products.php">Add Products </a></li>
</ul>
</nav>