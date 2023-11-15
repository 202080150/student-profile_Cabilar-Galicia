<?php

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];

    // For creating new town/city
    $sql = "INSERT INTO town_city (name) VALUES ('$name')";

    if ($conn->query($sql) === TRUE) {
        echo "Record saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
