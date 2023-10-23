<?php
   require('assets/component/header.php');
   require('assets/component/topnavbar.php');
   require('assets/component/sidebar.php');

   include('../db-conn/config.php');

   $query = "SELECT * FROM report";
   $result = mysqli_query($conn, $query);
?>

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Student Disciplinary Incident Report</li>
                </ol>
                <main>
                    <div class="container-fluid px-6">
                        <div class="card mb-4">

                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Case ID</th>
                                            <th>Date Reported</th>
                                            <th>Person Reporting</th>
                                            <th>Person Reported</th>
                                            <th>Brief Description of the Incident/Offense</th>
                                            <th>Solved</th>
                                            <th>Action </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Case ID</th>
                                            <th>Date Reported</th>
                                            <th>Place Reported</th>
                                            <th>Person Involved</th>
                                            <th>Brief Description of the Incident/Offense</th>
                                            <th>Solved</th>
                                            <th>Action </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            while ($row = mysqli_fetch_array($result)) {
                                                $reportid = $row['id'];
                                                $reportdate = $row['date'];
                                                $reportplace = $row['place'];
                                                $reportinvolved = $row['person_name'];
                                                $reportreason = $row['reason'];
                                                $reportsolve = $row['solve'];
                                        ?>

                                        <tr>

                                            <td><?php echo $reportid ?></td>
                                            <td><?php echo $reportdate ?></td>
                                            <td><?php echo $reportplace ?></td>
                                            <td><?php echo $reportinvolved ?></td>
                                            <td><?php echo $reportreason ?></td>
                                            <td><?php echo $reportsolve ?></td>
                                            <td>
                                                <button class="btn btn-primary "
                                                    onclick="openReport(<?php echo $reportid; ?>)"><i class="fa-solid fa-eye"></i></button>
                                                <button class="btn btn-danger"
                                                    onclick="openDelete(<?php echo $reportid; ?>)"><i class="fa-solid fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                        <script>
                                        function openDelete($reportid) {
                                            var url = '../db-conn/del_report.php?id=' + $reportid;
                                            window.location.href = url;
                                        }

                                        function openReport($reportid) {
                                            var url = 'vwreport.php?id=' + $reportid;
                                            window.location.href = url;
                                        }
                                        </script>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
            </div>

        </main>
    </div>
</div>

<?php
    require('assets/component/script.php');
?>