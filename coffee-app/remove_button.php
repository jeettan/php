<?php 

$count = $_POST['count'];

for($i=0;$i<$count;$i++){

if (isset($_POST['button' . $i])){

    echo $i . " button was clicked";
    $answer = $i;
}

}

$conn = new mysqli("localhost", 'root', '', 'new_database'); 
$query = "SELECT * FROM `products` ";

$result = mysqli_query($conn, $query);

for($i=0;$i<$count;$i++){

    $row = mysqli_fetch_assoc($result);


    if($i==$answer){

    $answer2 = $row['product_name'];
    break;
}
}


$pattern = "[']";
preg_match($pattern, $answer2, $matches, PREG_OFFSET_CAPTURE);

if($matches){

    $offset = $matches[0][1];

    $originalString = $answer2;
    $insertString = "'";
    $answer2 = substr($originalString, 0, $offset) . $insertString . substr($originalString, $offset);        

}

$secondquery = "DELETE FROM `products` WHERE product_name='$answer2'";

$result2 = mysqli_query($conn, $secondquery);

if($result2){

    echo "Successfully completed action";
    header("Location: all_products.php");
    exit();

} else {

    echo "Failed" . mysqli_error($conn);
}


?>