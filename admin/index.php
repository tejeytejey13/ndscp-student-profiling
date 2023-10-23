<!DOCTYPE html>
<html lang="en">
<?php
   require('assets/component/header.php');
   require('assets/component/topnavbar.php');
   require('assets/component/sidebar.php');
?>

<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">

                    <div class="container-logo">
                        <img src="logoo.jpg" alt="">
                        <h5>Be who God meant you to be and you will set the world on fire. - St. Catherine of Siena</h5>

                    </div>
                    <h1 class="mt-2">Dashboard</h1>
                    <ol class="breadcrumb mb-2">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="container-fluid">
                        <?php
                        $course = "SELECT course_name FROM fillup";
                        if ($result = mysqli_query($conn, $course)) {
                            $countPercent = mysqli_num_rows($result);

                            $dynamicDataPoints = array();

                            if ($countPercent > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $courseName = $row['course_name'];
                                    $yValue = 100 * (1 / $countPercent);

                                    $existingCourseIndex = -1;
                                    foreach ($dynamicDataPoints as $index => $dataPoint) {
                                        if ($dataPoint['label'] === $courseName) {
                                            $existingCourseIndex = $index;
                                            break;
                                        }
                                    }

                                    if ($existingCourseIndex !== -1) {
                                        $dynamicDataPoints[$existingCourseIndex]['y'] += $yValue;
                                    } else {
                                        // Otherwise, add a new entry for the course name
                                        $dynamicDataPoints[] = array("label" => $courseName, "y" => $yValue);
                                    }
                                }
                            } else {
                                $dynamicDataPoints[] = array("label" => "No course enrolled", "y" => 0);
                            }

                            $totalStudent = "SELECT * FROM fillup";
                            $countTotal = mysqli_num_rows(mysqli_query($conn, $totalStudent));
                            $dynamicDataPoints[] = array("label" => "Total Student", "y" => $countTotal);

                            $dataPoints = $dynamicDataPoints;
                        }

                        ?>
                        <div class="pie-container">
                            <div class="pie" style="width: 900px; margin: 0 auto;">
                                <Strong>
                                    Student Enrolled in Notre Dame Siena College of Polomolok
                                </Strong>
                                <canvas id="pieChart"></canvas>
                            </div>
                        </div>

                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        <div class="row">
                            <?php
                                    $totalGrade = "SELECT * FROM files";
                                    if ($result = mysqli_query($conn, $totalGrade)) {
                                        $countTotalGrade = mysqli_num_rows($result);                     
                            ?>
                            <div class="col-xl-4 col-md-6 mb-4" onclick="redirectToPage4('file.php')">
                                <div class="card border-left-info shadow h-100 py-3 px-4">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="font-weight-bold text-info text-uppercase mb-1" id="index-text">
                                                Grade Report
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $countTotalGrade ?>
                                            </div>
                                        </div>
                                        <i class="fa-regular fa-bell-exclamation fa-2x text-gray-500"></i>
                                    </div>
                                </div>
                                <script>
                                function redirectToPage4(url) {
                                    window.location.href = url;
                                }
                                </script>
                                <?php } ?>
                            </div>

                            <!-- ... Other cards ... -->
                        </div>

                        <div class="row">
                            <?php
                                 $totalAdviser = "SELECT role FROM users WHERE role = 'adviser' ";
                                 if ($result = mysqli_query($conn, $totalAdviser)) {
                                     $countTotalAdviser = mysqli_num_rows($result);
                            ?>
                            <div class="col-xl-4 col-md-6 mb-4" onclick="redirectToPage4('adviser.php')">
                                <div class="card border-left-info shadow h-100 py-3 px-4">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="font-weight-bold text-info text-uppercase mb-1" id="index-text">
                                                Adviser
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $countTotalAdviser ?>
                                            </div>
                                        </div>
                                        <i class="fa-solid fa-users fa-2x text-gray-500 fa-bounce"></i>
                                    </div>
                                </div>
                                <script>
                                function redirectToPage4(url) {
                                    window.location.href = url;
                                }
                                </script>
                                <?php } ?>
                            </div>

                        </div>

                        <!-- <div class="bg-container">
                            <img src="assets/bgdesign.jpg" alt="" srcset="">
                        </div> -->

                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php
        require('assets/component/script.php');
    ?>

    <style>
    #index-text {
        color: maroon !important;
    }

    .card {
        transition: transform 0.3s;

    }

    .card:hover {
        transform: scale(1.1);
    }

    .pie strong {
        text-transform: uppercase;
        font-size: 1.2rem;
    }

    .pie-container {
        position: absolute;
        right: 1;
        margin-top: 1.5%;
    }

    .container-fluid {
        max-width: 100%;
        max-height: 100%;
    }

    .container-fluid img {
        position: absolute;
        top: -50px;
        right: 0;
        height: 120%;
        width: 50%;
        /* Adjust this width as needed */
        object-fit: fill;
        z-index: -1;

    }

    .container-logo h5 {
        color: gold;
        font-size: 35px;
        font-weight: bold;
        font-family: "Playfair";
        padding-right: 5%;
        padding-left: 55%;
        position: absolute;
        top: 2.5%;
        right: 0;
        /* left: 100; */
        justify-content: center;
        text-align: center;
    }

    @media (max-width: 768px) {
        .container-fluid {
            padding-top: 80px;
        }
    }

    @media (max-width: 576px) {
        .container-fluid {
            padding-top: 100px;
        }
    }
    </style>
    <script>
    var ctx = document.getElementById('pieChart').getContext('2d');

    var dynamicDataPoints = <?php echo json_encode($dynamicDataPoints); ?>;

    var labels = [];
    var dataValues = [];

    dynamicDataPoints.forEach(function(dataPoint) {
        labels.push(dataPoint.label);
        dataValues.push(dataPoint.y);
    });

    var percentages = [];
    var sum = dataValues.reduce((a, b) => a + b, 0);
    dataValues.forEach(function(value) {
        percentages.push(((value / sum) * 100).toFixed(2) + "%");
    });

    var formattedLabels = labels.map(function(label, index) {
        return `${label} (${percentages[index]})`;
    });
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: dataValues,
                backgroundColor: getRandomColors(dataValues.length)
            }]
        },
        options: {
            legend: {
                display: true,
                position: 'right',
                labels: {
                    generateLabels: function(chart) {
                        var labels = chart.data.labels;
                        var values = chart.data.datasets[0].data;
                        var legendLabels = [];
                        for (var i = 0; i < labels.length; i++) {
                            legendLabels.push({
                                text: formattedLabels[i],
                                fillStyle: getRandomColors(1)[0],
                                lineWidth: 1,

                            });
                        }
                        return legendLabels;
                    },
                    padding: 35,
                    fontColor: 'black',
                    fontSize: 15,
                    fontWeight: 'bold',
                }
            },
            plugins: {
                datalabels: {
                    formatter: (value, ctx) => {
                        return null; // Disable default data labels
                    }
                }
            }
        }
    });



    function getRandomColors(count) {
        var colors = [];
        for (var i = 0; i < count; i++) {
            var color = '#' + Math.floor(Math.random() * 16777215).toString(16);
            colors.push(color);
        }
        return colors;
    }
    </script>

</body>

</html>