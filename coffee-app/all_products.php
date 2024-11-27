<?php 

session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <title> All products</title>
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

<div class="inside">

<form action="remove_button.php" method="post" id="all_products">
<h1> All products</h1>
<?php 

$mysqli = new mysqli("localhost", 'root', '', 'new_database'); 
$query = "SELECT * FROM `products` ";

echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <b>ID</font></b></td> 
          <td> <b>Product Name</font></b> </td> 
          <td> <b>Price</font></b> </td> 
      </tr>';

$i=0;

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["id"];
        $field2name = $row["product_name"];
        $field3name = $row["price"];

        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name. "$" .'</td> 
                  <td><button name="button' . $i . '" value="' . $i . '"> DELETE </button> </td>
              </tr>';

        
        $i++;

    }
    $result->free();
}

echo '<input type="hidden" name="count" value=' . $i . '>';

?>

</form>

</div>

</div>
</body>

</html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>