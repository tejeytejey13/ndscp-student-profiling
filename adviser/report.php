<?php
   require('assets/component/header.php');
   require('assets/component/topnavbar.php');
   require('assets/component/sidebar.php');
?>

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Add Incident Report</li>
                </ol>

                <div class="container-fluid px-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="../db-conn/addreport.php" method="POST">
                                <div class="row">

                                    <div class="col-md-6 mb-4">
                                        <h4>Place, Date & Time of Incident</h4>
                                        <hr>
                                        <h6>
                                            <label for="place">Place</label>
                                            <input type="text" name="place" class="form-control" >
                                        </h6>
                                        <hr>
                                        <h6>
                                            <label for="date">Date</label>
                                            <input type="date" name="date" class="form-control" >
                                        </h6>
                                        <hr>
                                        <h6>
                                            <label for="time">Time</label>
                                            <input type="time" name="time" class="form-control" >
                                        </h6>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <h4>Brief Description of the Incident/Offense</h4>
                                        <hr>
                                        <textarea class="form-control" name="reason" id="emInformation" cols="30"
                                            rows="10" placeholder="Type here" ></textarea>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <h4>Person Involved</h4>
                                        <hr>
                                        <h6>
                                            <label for="name">Name</label>
                                            <input type="text" name="pername" class="form-control" >
                                        </h6>

                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <h4>Witness</h4>
                                        <hr>
                                        <h6>
                                            <label for="name">Name</label>
                                            <input type="text" name="witname" class="form-control" >
                                        </h6>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                   
                                    <h4>Report By</h4>
                                    <hr>
                                    <h6>
                                        <label for="name">Name</label>
                                        <input type="text" name="reportby" class="form-control" >
                                    </h6>
                                   
                                </div>

                                <hr>
                                <button class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>

<?php
    require('assets/component/script.php');
?>