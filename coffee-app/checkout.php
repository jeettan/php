<?php

session_start();

sleep(3);

if(empty($_POST['product0'])){

    header("Location: sales_checkout.php?error=Error. You submitted nothing.");
    exit();
}

$item_count = $_POST['item_count']; 

$date = date("Y-m-d");
$uniqueid = uniqid();
$owner = $_SESSION['user_name'];

$total = $_POST['total'];

$conn = mysqli_connect('localhost', 'root', '', 'new_database');

if(!$conn) {

    die("Connection failed: " . mysqli_connect_error());
}

for ($i = 0; $i < $item_count; $i++) {

    $product = $_POST['product' . $i];
    $price =  $_POST['price' . $i];
    $quantity = $_POST['quantity' . $i];

    $sql = "INSERT INTO `sales` (product, price, quantity, date, order_id, owner, order_total) VALUES ('$product', '$price', '$quantity', '$date', '$uniqueid', '$owner', $total)";

    $result = mysqli_query($conn, $sql);

    if(!$result){

        echo "Failed: " . mysqli_error($conn) . "<br>";
    }

}

header("Location: sales_checkout.php?success=Sales added");
exit();

?>