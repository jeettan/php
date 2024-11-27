<?php
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirmpassword'])){
    
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirmpassword = trim($_POST['confirmpassword']);

    if(empty($username) || empty($password) || empty($confirmpassword)){
        header("Location: register.php?error=Please fill in all fields");
        exit();

    } else {
        if($password == $confirmpassword){

            $conn = mysqli_connect('localhost', 'root', '', 'new_database');

            $sql = "SELECT * FROM `password` WHERE username='$username' ";
    
            $result = mysqli_query($conn, $sql);
            $row_count = $result->num_rows;

            if($row_count>0){

                header("Location: register.php?error=Username already exists");
                exit();
            } else{

                $query = "INSERT INTO `password` (username, password) VALUES ('$username', '$password')";

                if(mysqli_query($conn, $query)){

                    header("Location: index.php?success=User registered successfully");
                    exit();
                } else{

                    echo "Failed insert";
                }

                
            }


        } else {

            header("Location: register.php?error=Password not equal");
            exit();
        }
    }

} else {

    echo "No access";

}
?>