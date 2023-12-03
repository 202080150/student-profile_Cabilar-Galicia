<?php
include_once("../db.php");
include_once("../town_city.php");

$db = new Database();
$connection = $db->getConnection();
$town = new Town($db);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Town Records</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    



</head>

<body>
    <!-- Include the header -->
    <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>

    <div class="content">
        <canvas id="chartStudents"></canvas>
        <?php
        include_once("../chart.php");

        $db = new Database();
        $connection = $db->getConnection();
        $chart = new Chart($db);
        $chartData = $chart->report2();
        ?>
        
    </div>

    <a class="button-link" href="town_add.php">Add New Record</a>
    </div>

    <!-- Include the footer -->
    <?php include('../templates/footer.html'); ?>
    <script>
        // Extract data from PHP and create chart
        const chartData = <?php echo json_encode($chartData); ?>;
        const labels = chartData.map(entry => entry.town_city);
        const data = chartData.map(entry => entry.student_count);

        // Create a bar chart
        var ctx = document.getElementById('chartStudents').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Number of Students',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>