<?php

$conn = mysqli_connect('localhost','root', '', 'ecomm');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

?>