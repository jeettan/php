<?php 

session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <title> Logged in</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..
40,100..1000;1,9..40,100..1000&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,
900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

</head>

<body>

<?php include 'header.php'?>


<div class="coffee">

<h1> Logged in success</h1>
<h2> Welcome <?php echo $_SESSION['user_name']?> </h2>
<div class="img-with-text">
    
<figure>
<a href="add_product.php"><img src=images/1.jpg height=200px width=300px></img></a>
<figcaption> Add product </figcaption>
</figure>
<figure>
<a href="all_products.php"><img src=images/2.jpg height=200px width=300px></img></a>
<figcaption> Products Carousel</figcaption>
</figure>
<figure>
<a href="sales_checkout.php"><img src=images/3.jpeg height=200px width=300px></img></a>
<figcaption> Sales checkout  </figcaption>
</figure>
<figure>
<a href="view_history.php"><img src=images/4.jpg height=200px width=300px></img></a>
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