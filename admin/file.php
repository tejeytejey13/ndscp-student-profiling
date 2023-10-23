<?php
   require('assets/component/header.php');
   require('assets/component/topnavbar.php');
   require('assets/component/sidebar.php');
   include('../db-conn/config.php');
?>

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Files</li>
                </ol>

                <main>
                    <div class="container-fluid px-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Adviser Name</th>
                                            <th>File Name</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $sql = "SELECT * FROM files";
                                        $qry = mysqli_query($conn, $sql);
                                        while($row = mysqli_fetch_assoc($qry)){
                                            $file_id = $row['id'];
                                            $file_name = $row['file_name'];
                                            $category = $row['category'];
                                            $date = $row['date'];

                                            $date = date('Y-m-d', strtotime($date));
                                            
                                    ?>
                                        <tr>
                                            <td><?php echo $file_id; ?></td>
                                            <td><?php echo $file_name; ?></td>
                                            <td><?php echo $category; ?></td>
                                            <td><?php echo $date; ?></td>
                                            <td>
                                                <a href="../db-conn/view_grade.php?file=<?php echo urlencode('../grade_report/'. $category); ?>&filename=<?php echo urlencode($category); ?>" target="_blank">
                                                <button class="btn btn-primary "><i class="fa-solid fa-eye"></i></button>
                                                </a>
                                                <button class="btn btn-danger"
                                                    onclick="openDelete(<?php echo $file_id; ?>)"><i
                                                        class="fa-solid fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <script>
                                        function openGrade($file_id) {
                                            var url = '../db-conn/view_grade.php?id=' + $file_id & 'file=' + $category &
                                                'filename=' + $category;
                                            window.location.href = url;
                                        }
                                        function openDelete($file_id) {
                                            var url = '../db-conn/delete_grade.php?id=' + $file_id;
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