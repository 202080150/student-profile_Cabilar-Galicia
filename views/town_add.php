<?php
include_once("../db.php"); // Include the Database class file
include_once("../town_city.php");




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [    
    'name' => $_POST['name']
    ];

    // Instantiate the Database and Town classes
    $database = new Database();
    $town = new Town($database);
    $town_id = $town->create($data);
    
        if ($town_id) {
            // Town record successfully created
            
            // Retrieve town details from the form
            $townDetails = [
                'id' => $town_id, // Use the obtained town ID
                'name' => $_POST['name'],
            ];
        }
    }
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">

    <title>Add Student Data</title>
</head>
<body>
    <!-- Include the header and navbar -->
    <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>

    <div class="content">
    <h1>Add Town Data</h1>
    <form action="" method="post" class="centered-form">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        
        

        <input type="submit" value="Add Town">
    </form>
    </div>
    
    <?php include('../templates/footer.html'); ?>
</body>
</html>
