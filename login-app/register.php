<!DOCTYPE HTML>
<html lang="en">

<head>
    <title> Register</title>
        <link rel="stylesheet" href="css/styles.css">

</head>

<body>

<?php 
include 'header.php';
?>

<h1> Register your account</h1>

<div class="center-object">

<form action="signup.php" method="post" class="register-form"> 

<?php if(isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

<label> Desired Username</label>
<input type="text" name="username" placeholder="Enter your username">

<label> Password</label>
<input type="password" name="password" placeholder="Enter your password">

<label> Confirm password</label>
<input type="password" name="confirmpassword" placeholder="Enter your password again">

<button type="submit"> Submit </button>

</form>

</div>

</body>
</html>