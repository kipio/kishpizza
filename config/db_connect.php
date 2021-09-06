<?php
    // connect to database
    $conn = mysqli_connect('localhost','kish','test1234','kish_pizza');

    if(!$conn) {
        echo 'Connection error: '.mysqli_connect_error();
    }
?>