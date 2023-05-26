<?php
    $conn = mysqli_connect('localhost', 'root', '', 'coffeenote');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>