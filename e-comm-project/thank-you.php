<?php include "connect.php"; ?>

<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['credit-card']) && isset($_POST['cvv']) && isset($_POST['date']) && isset($_POST['full_name'])){

    $credit_card = $_POST['credit-card'];
    $cvv = $_POST['cvv'];
    $date = $_POST['date'];
    $full_name = $_POST['full_name'];
    $grandtotal = $_POST['grandtotal'];

    $sql = "SELECT * FROM `credit_card` WHERE full_name='$full_name' AND credit_card_number='$credit_card' AND cvv='$cvv' AND expiry_date='$date'";

    $result = $conn->query($sql);

    if($result){

        if($result->num_rows == 1){

    $row = mysqli_fetch_assoc($result);

        $current_cash = $row['cash'];
        $new_cash = $current_cash - $grandtotal;

        if($new_cash>0){

        $sql = "UPDATE `credit_card` SET cash=$new_cash WHERE full_name='$full_name' AND credit_card_number='$credit_card' AND cvv='$cvv' AND expiry_date='$date'";

        $conn->query($sql);

        $message = "Success! $" . $grandtotal . " deducted from your account";
        $message2 = "Have a jolly good day";

        $sql = "DELETE FROM `cart`";

        $conn->query($sql);

        } else {

            $message = "Not enough cash in your bank account";
            $message2 = "Make more money first";
        }

        } else{
            
            $message = "You entered incorrect information";
            $message2 = "Please try again";

        }

    }
}
}

?>

<!DOCTYPE HTML>
<html>

<head> 

<title>THANK YOU </title> 

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

<h1> <?php echo $message; ?></h1>

<div style="width:480px"><iframe allow="fullscreen" frameBorder="0" height="270" src="https://giphy.com/embed/oqU8Xp3tdnBCJj7yJ7/video" width="480"></iframe></div>

<p> <?php echo $message2; ?> </p>

<a href="index.php"><button> Return home</button>

</body>

</html>

