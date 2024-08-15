<?php
// Enable error reporting and display errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $price = $_POST['price'];
    $file_name = $_FILES['file_upload']['name'];
    $file_temp = $_FILES['file_upload']['tmp_name'];
    $destination_path = getcwd() . DIRECTORY_SEPARATOR;
    $target_path = $destination_path . 'images/' . basename($file_name);

    echo "Hello world<br>";

    echo "Uploaded File Name: ";
    print_r($file_name);
    echo "<br>";

    echo "Temporary File Name: ";
    print_r($file_temp);
    echo "<br>";

    echo "Target Path: ";
    print_r($target_path);
    echo "<br>";

    if (move_uploaded_file($file_temp, $target_path)) {
        echo "File uploaded successfully.";
    } else {
        echo "File upload failed. Check permissions and path.";
     }

    }
?>