<?php

if(isset($_POST['product_name']) && isset($_POST['product_price'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    $pattern = "[']";

    preg_match($pattern, $product_name, $matches, PREG_OFFSET_CAPTURE);

    if($matches){

        $offset = $matches[0][1];

        $originalString = $product_name;
        $insertString = "'";
        $product_name = substr($originalString, 0, $offset) . $insertString . substr($originalString, $offset);        

    }

    $conn = mysqli_connect('localhost', 'root', '', 'new_database');
    $sql = "SELECT * FROM `products` WHERE product_name='$product_name' ";

    $result = mysqli_query($conn, $sql);
    $row_count = $result->num_rows;

    if($row_count>0){

        header("Location: add_product.php?error=Product already exists");
        exit();
    } else{

        $sql2 = "INSERT INTO `products` (product_name, price) VALUES ('$product_name', '$product_price')";

        if(mysqli_query($conn, $sql2)){

            header("Location: add_product.php?success=Product added!");
            exit();

        } else{

            echo "Something went wrong";
        }
    }

} else{

    header("Location: add_product.php");
    exit();
}

?>
