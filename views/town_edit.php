<?php
// town_city.php

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $state = $_POST['state'];

    // For updating existing town/city
    $id = $_POST['id'];
    $sql = "UPDATE town_city SET name='$name', state='$state' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
