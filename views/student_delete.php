<?php
include_once("../db.php"); // Include the Database class file
include_once("../student.php"); // Include the Student class file
include_once("../student_details.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id']; // Retrieve the 'id' from the URL

    // Instantiate the Database and Student classes
    $db = new Database();
    $student = new Student($db);
    $database = new Database();
    $student_details = new StudentDetails($database);


    // Call the delete method to delete the student record
    if ($student->delete($id) && $student_details -> delete($id)) {
        echo "Record deleted successfully.";
        header("Location: students.view.php");
    } else {
        echo "Failed to delete the record.";
    }
}


?>
