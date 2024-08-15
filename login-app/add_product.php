<?php 

session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <title> Add product</title>
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>

<?php include 'header.php'?>

<div class="coffee">

<h1> Add product</h1>

<form action="submit_product.php" method="post">
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