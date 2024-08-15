<?php 

session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <title> All products</title>
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>

<?php include 'header.php'?>

<div class="coffee">


<div class="inside">
<h1> All products</h1>

<form action="remove_button.php" method="post">
<?php 

$mysqli = new mysqli("localhost", 'root', '', 'new_database'); 
$query = "SELECT * FROM `products` ";

echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <b><font face="Arial">ID</font></b></td> 
          <td> <b><font face="Arial">Product Name</font></b> </td> 
          <td> <b><font face="Arial">Price</font></b> </td> 
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