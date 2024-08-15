<?php

session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

    header("Location: home.php");
}

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <title> PHP login system</title>
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>

<?php include "header.php"?>

<h1> Hello, welcome to the coffee app</h1>

<h2> Please log in</h2>


<div class="center-object">
<form action="login.php" method="post">

    <?php if(isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <?php if(isset($_GET['success'])) { ?>
        <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

    <label> User name</label>
    <input type="text" name="uname" placeholder="User Name">

    <label> Password</label>
    <input type="password" name="password" placeholder="Password">

    <button type="submit">Login </button>

</form>
</div>

</body>


