<?php 

session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>Sales checkout</title>
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>

<?php include 'header.php'?>

<div class="coffee">

<h1> Sales checkout </h1>

<?php if(isset($_GET['success'])) { ?>
        <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

        <?php if(isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

<div class="additional">

<div class="product_list"> 


<?php 

$mysqli = new mysqli("localhost", 'root', '', 'new_database'); 
$query = "SELECT * FROM `products` ";

$i = 0;

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {

        $field = $row["product_name"];
        $price = $row["price"];

        echo '<div class="oval"><p id="price' . $i . '"style="display:none;">' . $price . '</p><p id="button' . $i . '">' . $field . '</p></div>';

        $i++;

    }

    $result->free();
}
?>
</div>
<div id="whyhellothere">
<form action="checkout.php" method="post">
<div class="checkout"> 
<h2> Items: </h2>

</div>

<div class="buttoning">
<button id = "clearMe" type="button"> Clear </button>
<button type="submit"> Submit </button>
</div>

</div>
</form>
</div>
</div>

<script>

var x = document.getElementsByClassName('oval');
var checkout = document.getElementsByClassName('checkout')[0];

document.addEventListener("DOMContentLoaded", function() {

    var array = {};
    var table = document.createElement('table');
    var object = {}
    var headerRow = table.insertRow();
    headerRow.innerHTML = '<th>Product</th><th>Price</th><th>Quantity</th>'; 

    var clearme = document.getElementById('clearMe');

    clearme.addEventListener('click', function(){

        object = {};

        while (table.rows.length > 0) {
        table.deleteRow(0); 
      }
        
    })

  for (var i = 0; i < x.length; i++) {
    var button = document.getElementById('button' + i);
    var price = document.getElementById('price' + i);
    var item = button.innerHTML;

    array[item] = price.innerHTML;

    button.addEventListener('click', function() {
        
      var lol = this.textContent; 
      var buttonid = this.id.toString()

      var numbers = buttonid.match(/\d+/);

      if(object[lol] >= 1){

            object[lol] += 1;

        } else {
            object[lol] = 1;
        }

    var count = Object.entries(object).length;

    while (table.rows.length > 0) {
        table.deleteRow(0); 
      }

    var headerRow = table.insertRow();
    headerRow.innerHTML = '<th>Product</th><th>Price</th><th>Quantity</th>'; 

    var total = 0;

    for(i=0;i<count;i++){

        var row = table.insertRow();
        var price = Object.values(object)[i] * array[Object.keys(object)[i]];
        total = price + total;
        row.innerHTML = '<td><input type="hidden" name="product' + i + '" value="' + Object.keys(object)[i] + '">' + Object.keys(object)[i] +  '</td><td><input type="hidden" name="price' + i + '" value="' + price + '">' + "$" +  price  + ' </td><td><input type="hidden" name="quantity' + i + '"value="' + Object.values(object)[i] + '">' + Object.values(object)[i] + ' </td>';
        checkout.appendChild(table);
    }

    var newrow = table.insertRow();

    newrow.innerHTML = '<td> <b>Subtotal:</b></td> <td>' + "$" + total + '</td>';
    checkout.appendChild(table);

    var tax = total * 0.1

    var newrow2 = table.insertRow();
    newrow2.innerHTML = '<td> <b>Tax:</b></td> <td>' + "$" + tax + '</td>';

    var realtotal = total + tax

    var newrow3 = table.insertRow();
    newrow3.innerHTML = '<td> <b>Total:</b></td> <td><input type="hidden" name="total" value="' + realtotal + '">' + "$" + realtotal + '</td>';

    var k = document.createElement('input');

    k.type = 'hidden';
    k.name = 'item_count';
    k.value = count;

    checkout.appendChild(k);

    })
  }

});

</script>

</body>

</html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>