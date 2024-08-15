<?php

session_start();

if(isset($_POST['uname']) && isset($_POST['password'])) {

    $uname = $_POST['uname'];
    $password = $_POST['password'];

    if(empty($uname)) {

        header("Location: index.php?error=User Name is required");
        exit();

    } else if(empty($password)) {

        header("Location: index.php?error=Password is required");
        exit();

    } else {
        $conn = mysqli_connect('localhost', 'root', '', 'new_database');

        $sql = "SELECT * FROM `password` WHERE username='$uname' AND password='$password' ";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            print_r($row);

            $_SESSION['user_name'] = $row['username'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['password'] = $row['password'];

            header("Location: home.php");
            exit();

        }  else{

            header("Location: index.php?error=Incorrect user name or password");
            exit();
        }


}} else{

    header("Location: index.php");
    exit();
}

?>