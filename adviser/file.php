<?php
   require('assets/component/header.php');
   require('assets/component/topnavbar.php');
   require('assets/component/sidebar.php');
   include('../db-conn/config.php');

   if(isset($_GET['adviserID'])){
    $adviser_ID = $_GET['adviserID'];

    $queryallUsers = "SELECT * FROM users WHERE id = $adviser_ID";
    $queryUsers = mysqli_query($conn, $queryallUsers);
    while($userRow = mysqli_fetch_assoc($queryUsers)){
        $userID = $userRow['id'];
    }
?>

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Files</li>
                </ol>
                <form id="uploadForm">
                    <div class="container-file">
                        <h4>Upload</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="category">Student Name</label>
                                <input type="text" name="category" id="category" class="form-control" required>
                                <input type="hidden" name="adviserID" id="adviserID" value="<?php echo $userID; ?>" />
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="file">File</label>
                                <input type="file" name="file" id="file" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <button class="btn btn-success" type="button" id="uploadButton">Upload</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div style="display:none;" id="responseMessage"></div>

                <main>
                    <div class="container-fluid px-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="col-md-6">
                                    <label for="search">Search</label>
                                    <input type="text" id="search" class="form-control" placeholder="Enter search term">
                                </div>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Student Name</th>
                                            <th>File Name</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Student Name</th>
                                            <th>File Name</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        $queryallFiles = "SELECT * FROM files";
                                        $queryFiles = mysqli_query($conn, $queryallFiles);
                                        while($fileRow = mysqli_fetch_assoc($queryFiles)){
                                            $fileID = $fileRow['id'];
                                        }

                                        $sql = "SELECT * FROM files LEFT JOIN users on users.id = files.adviser_id WHERE files.adviser_id = '$userID' ORDER BY date DESC";
                                        $qry = mysqli_query($conn, $sql);
                                        while($row = mysqli_fetch_assoc($qry)){
                                            $file_id = $row['id'];
                                            $file_name = $row['file_name'];
                                            $category = $row['category'];
                                            $date = $row['date'];

                                            $date = date('F j, Y', strtotime($date));

                                    ?>
                                        <tr>
                                            <td><?php echo $file_name; ?></td>
                                            <td><?php echo $category; ?></td>
                                            <td><?php echo $date; ?></td>
                                            <td><button class="btn btn-danger"
                                                    onclick="deleteFile(<?php echo $fileID; ?>)">Delete</button></td>

                                        </tr>
                                        <?php }} ?>
                                    </tbody>
                                </table>
                                <script>
                                function deleteFile(fileID) {
                                    var url = '../db-conn/delete_grade_adviser.php?fileid=' + fileID;

                                    if (confirm("Are you sure you want to delete this file?")) {
                                        fetch(url, {
                                                method: 'DELETE',
                                                headers: {
                                                    'Content-Type': 'application/json',
                                                },
                                            })
                                            .then(response => response.json())
                                            .then(data => {
                                                if (data.success) {
                                                    alert('File deleted successfully');
                                                    location.reload();
                                                } else {
                                                    alert('Failed to delete the file. Please try again.');
                                                }
                                            })
                                            .catch(error => {
                                                console.error('Error:', error);
                                            });
                                    }
                                }
                                </script>
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

                                <script>
                                $(document).ready(function() {
                                    $("#uploadButton").click(function() {
                                        var result = confirm(
                                            "Are you sure you want to upload this file?");
                                        if (result) {
                                            var formData = new FormData(document.getElementById(
                                                "uploadForm"));

                                            $.ajax({
                                                type: "POST",
                                                url: "../db-conn/files.php",
                                                data: formData,
                                                processData: false,
                                                contentType: false,
                                                success: function(response) {
                                                    if (response.trim() === "success") {
                                                        Swal.fire({
                                                            title: 'Success',
                                                            text: 'File uploaded successfully!',
                                                            icon: 'success'
                                                        }).then(function() {
                                                            $("#responseMessage")
                                                                .html(response);
                                                            location.reload();
                                                        });
                                                    } else {
                                                        Swal.fire({
                                                            title: 'Error',
                                                            text: 'File upload failed. Please try again.',
                                                            icon: 'error'
                                                        });
                                                    }
                                                },
                                            });
                                        } else {}
                                    });
                                });
                                </script>


                            </div>
                        </div>
                    </div>
                </main>
            </div>

        </main>
    </div>
</div>
<script>
document.getElementById("search").addEventListener("input", function() {
    var searchTerm = this.value.toLowerCase();

    var tableRows = document.querySelectorAll("#datatablesSimple tbody tr");

    tableRows.forEach(function(row) {
        var studentName = row.cells[0].textContent
    .toLowerCase(); // Adjust the cell index based on your table structure
        var fileName = row.cells[1].textContent.toLowerCase(); // Adjust the cell index
        var dateCell = row.cells[2].textContent.toLowerCase(); // Adjust the cell index

        if (studentName.includes(searchTerm) || fileName.includes(searchTerm) || dateCell.includes(
                searchTerm)) {
            row.style.display = ""; // Show matching rows
        } else {
            row.style.display = "none"; // Hide non-matching rows
        }
    });
});
</script>

<?php
    require('assets/component/script.php');
?>