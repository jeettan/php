<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST') {

$mysqli = new mysqli("localhost","root","","ecomm");

$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$file_upload = $_FILES['file_upload']['name'];
$file_upload_temp_name = $_FILES['file_upload']['tmp_name'];
$product_image_folder = 'images/'. $file_upload;

$sql = "INSERT INTO `product_list` (product_name, description, price, image) VALUES ( '$title', '$description', '$price', '$file_upload')";

move_uploaded_file($file_upload_temp_name, $product_image_folder);

$result = $mysqli->query($sql);

if($result){

    $message = "Product added successfully";
} else {

    $message = "Product failed to be added";
}


}

?>

<!DOCTYPE HTML>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title> Add Products </title>
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


<div class="container2">

<?php echo $message; ?>

<div class="form-container">
<form action="" method="post" enctype="multipart/form-data"> 

<div class="row">
<h2> Add new product here </h2>
</div>

<div class="row">
<div class="col-25">
<label> Product Title</label>
</div>
<div class="col-75">
<input type ="text" placeholder="Insert your product title" name="title" minlength="3" required> </input><br>
</div>
</div>

<div class="row">
<div class="col-25">
<label> Description</label>
</div>
<div class="col-75">
<textarea rows="4" style="width:230px; max-width: none;" placeholder="Insert your description here" name="description"></textarea><br>
</div>
</div>

<div class="row">
<div class="col-25">
<label> Price ($)</label>
</div>
<div class="col-75">
<input type ="number" placeholder="Insert your price" name="price" required> </input><br>
</div>
</div>

<div class="row">
<div class="col-25">
<label> Image</label>
</div>
<div class="col-75">
<input type ="file" name="file_upload" required> </input><br>
</div>
</div>

<div class="special-row">
<input type="submit" value="Add Product"></input>
</div>

</form>

</div>


</div>

</body>

</html>