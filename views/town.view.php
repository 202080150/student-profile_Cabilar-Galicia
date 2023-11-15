<?php
// view_town_city.php

include 'db.php';

$sql = "SELECT * FROM town_city";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . "<br>";
        echo "Name: " . $row['name'] . "<br>";
    }
} else {
    echo "No records found";
}

$conn->close();
?>
