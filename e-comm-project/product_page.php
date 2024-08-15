<?php include 'connect.php'?>

<?php $ID = $_GET['id'];

$sql = "SELECT * FROM `product_list` WHERE id=$ID";

$result = $conn->query($sql);

$row = $result->fetch_assoc();

$title = $row['product_name'];
$description = $row['description'];
$price = $row['price'];
   
$displayprice = number_format($price);

$img = $row['image'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $sqlfirst = "SELECT * FROM `cart` WHERE product_id=$ID";
    $sql2 = "INSERT INTO `cart` (product_name, price, image, product_id) VALUES ('$title', '$price', '$img', '$ID')";
    $sql3 = "SELECT quantity FROM `cart` WHERE product_id=$ID";

    $quantity = $conn->query($sqlfirst);
    $row = $quantity->fetch_assoc();

    if($row['quantity']){

        $quantity_update = $row['quantity'];

        $quantity_update += 1;

        $conn->query("UPDATE `cart` SET quantity='$quantity_update' WHERE product_id=$ID");
        $message = "Product quantity added";

    } else{
        $result = $conn->query($sql2);
        $message = "Product successfully added to cart";
    }

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

<div class="container3">

<p id="message" style="color:green">
<?php

echo "$message";

?>

</p>

<div class="product">
    <div class="product-image">
    <img src="images/<?php echo $img;?>" height="300px" width="300px"></img>
</div>

<div class="description-section">

<h2> <input type="hidden" name="title"><?php echo $title; ?></input></h2>

<p> <?php echo $description; ?> </p>

<h3 style="color:green"><p> <?php echo "$" . $displayprice; ?> </p></h3>

<form action="" method="post">
<button onclick="disappear()"> Add to cart</button>
</form>
</div>
</div>

</div>

<script>

setTimeout(()=>{

const sometext = document.getElementById('message');

sometext.style.display='none';

},3000);


</script>

</body>

</html>