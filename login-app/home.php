<?php 

session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <title> Logged in</title>
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>

<?php include 'header.php'?>

<div class="coffee">

<h1> Logged in success</h1>

<h2> Welcome <?php echo $_SESSION['user_name']?> </h2>
<div class="img-with-text">
<figure>
<a href="add_product.php"><img src=images/1.jpg height=150px width=200px></img></a>
<figcaption> Add product </figcaption>
</figure>
<figure>
<a href="all_products.php"><img src=images/2.jpg height=150px width=200px></img></a>
<figcaption> Products Carousel</figcaption>
</figure>
<figure>
<a href="sales_checkout.php"><img src=images/3.jpeg height=150px width=200px></img></a>
<figcaption> Sales checkout  </figcaption>
</figure>
<figure>
<a href="view_history.php"><img src=images/4.jpg height=150px width=200px></img></a>
<figcaption> View history </figcaption>
</figure>
</div>

</div>

</body>
</html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>