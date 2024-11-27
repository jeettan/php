<?php 

session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <title> View history</title>
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
<h1> View History</h1>
<?php 

$mysqli = new mysqli("localhost", 'root', '', 'new_database'); 
$query = "SELECT DISTINCT order_id, order_total, date FROM `sales`";

echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <b><font face="Arial">ORDER_ID</font></b></td> 
          <td> <b><font face="Arial">Total Sales</font></b> </td> 
          <td> <b><font face="Arial">Date</font></b> </td> 
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["order_id"];
        $field2name = $row["order_total"];
        $field3name = $row["date"];

        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'. "$" . $field2name.'</td> 
                  <td>'.$field3name.'</td> 
              </tr>';
    }
    $result->free();
} 
?>
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