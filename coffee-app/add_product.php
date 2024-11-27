<?php 

session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <title> Add product</title>
    <link rel="stylesheet" href="css/styles.css">
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

<h1> Add product</h1>

<form action="submit_product.php" method="post" id="add_product">
    <h2> Enter your product </h2>

    <?php if(isset($_GET['success'])) { ?>
        <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

        <?php if(isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

<label> Product Name </label>
<input type="text" placeholder="Input your product" name="product_name" required>

<label> Price ($)</label>
<input type="number" placeholder="Input your price" name="product_price" required>

<button type="submit">Submit </button>



</form>

</div>

</body>
</html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>