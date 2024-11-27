<!DOCTYPE HTML>
<html lang="en">

<head>
    <title> Register</title>
        <link rel="stylesheet" href="css/styles.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..
40,100..1000;1,9..40,100..1000&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,
900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

</head>

<body>

<?php 
include 'header.php';
?>

<div class="mainbody">
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

</div>

</body>
</html>