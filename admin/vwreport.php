<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebar.php');

include('../db-conn/config.php');

if (isset($_GET['id'])) {
    $vwreportid = $_GET['id'];

    // Modify the SQL query to fetch the specific report based on the ID
    $query = "SELECT * FROM report WHERE id = $vwreportid";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the report details
        $reportres = mysqli_fetch_assoc($result);
        
        $report_id = $reportres['id'];
        $curdate = $reportres['date'];
        $curtime = $reportres['time'];
        $reportplace = $reportres['place'];
        $reportdate = $reportres['date'];
        $reporttime = $reportres['time'];
        $reportinvolved = $reportres['person_name'];
        $personwitness = $reportres['witness_name'];
        $reportby = $reportres['reportby'];
        $reportreason = $reportres['reason'];
        $reportsolve = $reportres['solve'];
        $reporttime = date('H:i:s'); // You can adjust the format as needed
        $curtime = date('H:i:s'); // You can adjust the format as needed

?>

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">View Incident Report</li>
                </ol>

                <div class="container-fluid px-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <h4>Date & Time Reported</h4>
                                    <hr>
                                    <h6>Date: <?php echo $curdate ?></h6>
                                    <hr>
                                    <h6>Time: <?php echo $curtime ?></h6>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h4>Place, Date & Time of Incident</h4>
                                    <hr>
                                    <h6>Place: <?php echo $reportplace ?></h6>
                                    <hr>
                                    <h6>Date: <?php echo $reportdate ?></h6>
                                    <hr>
                                    <h6>Time: <?php echo $reporttime ?></h6>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <h4>Person Involved</h4>
                                    <hr>
                                    <h6>Name: <?php echo $reportinvolved ?></h6>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <h4>Witness</h4>
                                    <hr>
                                    <h6>Name: <?php echo $personwitness ?></h6>
                                </div>
                            </div>

                            <div class="col-md-15 mb-4 text-align-center">
                                <h4>Brief Description of the Incident/Offense</h4>
                                <hr>
                                <p><?php echo $reportreason ?></p>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <h4>Reported By</h4>
                                    <hr>
                                    <h6>Name: <?php echo $reportby ?></h6>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <form action="../db-conn/marksolve.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $vwreportid; ?>"/>
                                        <h4>Actions that we can help you</h4>
                                        <hr>
                                        <input type="text" class="form-control" name="solve"
                                            placeholder="Enter your action towards the student">
                                </div>
                            </div>

                            <hr>
                            <button class="btn btn-primary" onclick="window.location.href='report.php';">Back</button>
                            <button class="btn btn-success" type="submit">Mark as
                                Solved</button>


                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>
<script>
function masrkAsSolved($report_id) {
    var url = '../db-conn/marksolve.php?id=' + $report_id;
    window.location.href = url;
}
</script>

<?php
    } else {
        // Report with the given ID was not found
        echo "Report not found.";
    }
}

require('assets/component/script.php');
?>