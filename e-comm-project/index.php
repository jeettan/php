<?php include 'connect.php'?>

<!DOCTYPE HTML>

<html lang="en" dir="ltr">

<head>
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

<?php include "header.php" ?>

<div class="container">

<div class="image_carousel">

<?php

$sql = "SELECT * FROM `product_list`";
$result = $conn->query($sql);

if($result->num_rows>0){

    while($row = $result->fetch_assoc()){

        echo "<div class='item'><img src='images/{$row['image']}' height='150' width='auto'></img><b><p> {$row['product_name']}</p> </b><a href='product_page.php?id={$row['id']}'><button> Learn more </button></a></div>";
    }
}

?>

</div>
</div>

</body>

</html>