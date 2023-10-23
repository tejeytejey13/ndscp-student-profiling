<?php
   require('assets/component/header.php');
   require('assets/component/topnavbar.php');
   require('assets/component/sidebar.php');

   include('../db-conn/config.php');

   $query = "SELECT * FROM users";
   $result = mysqli_query($conn, $query);
?>

<style>
 .hidden-column{
    display: none;
 }
</style>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Adviser</li>
                </ol>
                <main>
                    <div class="container-fluid px-6">
                        <div class="card mb-4">

                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Course Handle </th>
                                            <th>Title</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Course Handle </th>
                                            <th>Title</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            while ($row = mysqli_fetch_array($result)) {
                                    
                                            $id = $row['id'];
                                            $fname = $row['fname'];
                                            $mname = $row['mname'];
                                            $lname = $row['lname'];
                                            $course = $row['course_belong'];
                                            $role = $row['role'];
                                            $status = $row['status'];
                                            $title = $row['title'];
                                            
                                            if ($role !== 'admin') {
                                          ?>
                                        <tr>

                                            <td><?php echo $fname .' '. $mname .' '. $lname ?></td>
                                            <td><?php echo $course ?></td>
                                            <td><?php echo $title ?></td>
                                            <td><?php echo ucfirst($role) ?></td>
                                            <td><?php echo ucfirst($status) ?></td>
                                            <td>
                                            <button class="btn btn-primary"
                                                onclick="openView(<?php echo $id; ?>)"><i class="fa-solid fa-eye"></i></button>
                                            <button class="btn btn-danger"
                                                onclick="openDelete(<?php echo $id; ?>)"><i class="fa-solid fa-trash"></i></button>
                                            </td>
                                        </tr>

                                        <?php
                                        }
                                            }
                                        ?>
                                        <script>
                                        function openDelete($id) {
                                            var url = '../db-conn/delete.php?id=' + $id;
                                            window.location.href = url;
                                        }
                                        function openView($id) {
                                            var url = 'view-adviser.php?id=' + $id;
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