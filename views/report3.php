<?php
include_once("../db.php");
include_once("../chart.php");
// include_once("../student.php");
// include_once("../student_details.php");
// include_once("../town_city.php");

$db = new Database();
$chart = new Chart($db);

// Fetch data from the database
$chartData = $chart->report3();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gender Distribution Chart</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <!-- Include the header -->
    <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>

    <div class="content">
        <canvas id="chartGender"></canvas>
        <?php
        include_once("../chart.php");

        $db = new Database();
        $connection = $db->getConnection();
        $chart = new Chart($db);
        $chartData = $chart->report3();
        ?>
    </div>

    <!-- Include the footer -->
    <?php include('../templates/footer.html'); ?>

    <script>
        // Extract data from PHP and create chart
        const chartData = <?php echo json_encode($chartData); ?>;
        const labels = Object.keys(chartData[0]); // ['Male', 'Female']
        const data = Object.values(chartData[0]);

        // Create a pie chart
        var ctx = document.getElementById('chartGender').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: ['blue', 'pink'], // Adjust colors as needed
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
</body>

</html>
