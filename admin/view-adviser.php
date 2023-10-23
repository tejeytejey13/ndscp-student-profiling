<?php
   require('assets/component/header.php');
   require('assets/component/topnavbar.php');
   require('assets/component/sidebar.php');

   include('../db-conn/config.php');

   if(isset($_GET['id'])){
    $adviserID  = $_GET['id'];

    $queryAdviser = "SELECT * FROM users WHERE id = '$adviserID'";
    $command = mysqli_query($conn, $queryAdviser);
    while($row = mysqli_fetch_assoc($command)){
        $id = $row['id'];
        $fname = $row['fname'];
        $mname = $row['mname'];
        $lname = $row['lname'];
        $course = $row['course'];
        $role = $row['role'];
        $status = $row['status'];

?>

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Adviser</li>
                </ol>
                <main>
                    <button type="button" class="btn btn-outline-danger" onClick="backMain()"><i
                            class="fa-solid fa-backward"></i></button>
                    <div class="container-fluid px-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <form action="../db-conn/update_status.php" method="post">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <strong>Name</strong>
                                            <p><?php echo $fname." ".$mname." ".$lname; ?></p>
                                        </div>
                                        <div class="col-md-4">
                                            <strong>Course Handled</strong>
                                            <p><?php echo $course; ?></p>
                                        </div>
                                        <div class="col-md-4">
                                            <strong>Role</strong>
                                            <p><?php echo ucfirst($role); ?></p>
                                        </div>
                                    </div>
                                    <strong>Status</strong>
                                    <select name="status" id="status">
                                        <option value="" selected disabled hidden>Select Status</option>
                                        <option value="pending">Pending</option>
                                        <option value="approved">Approved</option>
                                    </select>
                                    <br>
                                    <br>
                                    <input type="hidden" name="adviserID" value="<?php echo $adviserID; ?>"/>
                                    <input class="btn btn-primary" type="submit" value="Submit">
                                </form>

                            </div>
                        </div>
                    </div>
                </main>
                <script>
                function backMain() {
                    var url = 'adviser.php';
                    window.location.href = url;
                }
                </script>
            </div>
        </main>
    </div>
</div>

<?php
    }}

    require('assets/component/script.php');
?>