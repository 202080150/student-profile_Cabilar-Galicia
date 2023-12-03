<?php
include_once("../db.php");
include_once("../province.php");

$db = new Database();
$connection = $db->getConnection();
$province = new Province($db);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Province Records</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    



</head>

<body>
    <!-- Include the header -->
    <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>

    <div class="content">
        <canvas id="chartProvince"></canvas>
        <?php
        include_once("../chart.php");

        $db = new Database();
        $connection = $db->getConnection();
        $chart1 = new Chart($db);
        $chartData = $chart1->report1();
        ?>
        
    </div>

    <a class="button-link" href="province_add.php">Add New Record</a>
    </div>

    <!-- Include the footer -->
    <?php include('../templates/footer.html'); ?>
    <script>
        const Count_province = <?php echo json_encode(array_column($chartData, 'Student Population')); ?>;
        const label_province = <?php echo json_encode(array_column($chartData, 'Province Name')); ?>;
        const data = {
            labels: label_province,
            datasets: [{
                label: 'Student Population',
                data: Count_province,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        const chartProvince = new Chart(
            document.getElementById('chartProvince').getContext('2d'),
            config
        );
    </script>
</body>

</html>