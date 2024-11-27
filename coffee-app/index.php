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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..
40,100..1000;1,9..40,100..1000&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,
900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

</head>

<body>

<?php include "header.php"?>

<div class="mainbody">

<div class="centerh">
<h1> Hello, welcome to the coffee app</h1>

<h2> Please log in</h2>

</div>


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

 </div>

</body>


