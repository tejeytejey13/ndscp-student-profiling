<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebar.php');
include('../db-conn/config.php');

if(isset($_GET['course_id']) && isset($_GET['course_name'])){
    $course_id = $_GET['course_id'];
    $course_name = $_GET['course_name'];
}
$query = "SELECT * FROM subjects WHERE course_id = '$course_id'";
$result = mysqli_query($conn, $query);
?>

<style>
<style>.loader {
    border: 4px solid rgba(255, 255, 255, 0.3);
    border-top: 4px solid #3498db;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    animation: spin 2s linear infinite;
    display: none;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}

.update-label {
    display: inline-block;
    margin-right: 10px;
}

.add-appointment {
    box-shadow: 0px 10px 14px -7px #276873;
    background: linear-gradient(to bottom, #4169e1 5%, #408c99 100%);
    background-color: #4169e1;
    border-radius: 8px;
    display: inline-block;
    cursor: pointer;
    color: #ffffff;
    font-family: Courier New;
    font-size: 20px;
    font-weight: bold;
    padding: 13px 32px;
    text-decoration: none;
    text-shadow: 0px 1px 0px #3d768a;
}

.add-appointment:hover {
    background: linear-gradient(to bottom, #4169e1 5%, #599bb3 100%);
    background-color: #4169e1;
}

.add-appointment:active {
    position: relative;
    top: 1px;
}
</style>
</style>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"><?php echo ucwords($course_name)?> | Subjects</li>
                </ol>
                <main>
                    <div class="container-fluid px-6">
                        <div class="btn btn-warning mb-5" onclick='back()'>Back</div>

                        <form action="../db-conn/addsubjects.php" method="POST">
                            <input type="hidden" name="course_id" value="<?php echo $course_id ?>">
                            <div class="row">
                                <div class="col">
                                    <label for="">Course Code</label>
                                    <input type="text" name="course_code" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="">Course Description</label>
                                    <input type="text" name="course_description" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="">Prerequisite</label>
                                    <input type="text" name="prereq" class="form-control">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="">Units</label>
                                    <input type="number" name="units" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="">Semester</label>
                                    <select class="form-control" name="semester" id="">
                                        <option value="" selected disabled>Select Semester</option>
                                        <option value="1">1st Semester</option>
                                        <option value="2">2nd Semester</option>
                                        <option value="3">Summer</option>

                                    </select>
                                    <!-- <input type="number" name="semester" class="form-control"> -->
                                </div>
                                <div class="col">
                                    <label for="">Year</label>
                                    <select class="form-control" name="year" id="">
                                        <option value="" selected disabled>Select Year</option>
                                        <option value="1">1st Year</option>
                                        <option value="2">2nd Year</option>
                                        <option value="3">3rd Year</option>
                                        <option value="4">4th Year</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col mt-4">
                                <button class="btn btn-success submit-button mb-3 hide-on-print" type="button"
                                    id="updateButton">
                                    <span class="update-label">Add</span>
                                    <div class="loader"></div>
                                </button>
                            </div>
                        </form>
                        <div class="card mb-4">

                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Course Code</th>
                                            <th>Course Description</th>
                                            <th>Units</th>
                                            <th>Prerequisite</th>
                                            <th>Semester</th>
                                            <th>Year</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Course Code</th>
                                            <th>Course Description</th>
                                            <th>Units</th>
                                            <th>Prerequisite</th>
                                            <th>Semester</th>
                                            <th>Year</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($result)) {
                                          $course_code = $row['course_code'];
                                          $course_description = $row['course_description'];
                                          $units = $row['units'];
                                          $semester = $row['semester'];
                                          $year = $row['year'];
                                          $prereq = $row['prerequisite']
                                        ?>
                                        <tr>
                                            <td><?php echo  strtoupper($course_code) ?></td>
                                            <td><?php echo ucwords($course_description) ?></td>
                                            <td><?php echo $units ?></td>
                                            <td><?php echo $prereq ?></td>
                                            <td><?php echo $semester ?></td>
                                            <td><?php echo $year ?></td>
                                        </tr>
                                        <?php
                                            }                     
                                        ?>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $(".submit-button").click(function() {
        var form = $(this).closest('form');
        var formData = form.serialize();
        var updateButton = $("#updateButton");
        var loader = updateButton.find('.loader');

        updateButton.prop("disabled", true);
        updateButton.find(".update-label").hide();
        loader.show();

        $.ajax({
            type: "POST",
            url: form.attr("action"),
            data: formData,
            success: function(response) {
                var trimmedResponse = $.trim(response);

                updateButton.prop("disabled", false);
                loader.hide();
                updateButton.find(".update-label").show();

                if (trimmedResponse === "success") {
                    Swal.fire({
                        title: 'Success',
                        text: 'New Subject Added',
                        icon: 'success'
                    }).then(function() {
                        // Refresh the page
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: response,
                        icon: 'error'
                    });
                }
                $("#response").html(response);
            }
        });
    });
});

function back() {
    history.back();
}

function view(course_id) {
    var url = 'subjects.php?course_id=' + course_id;
    window.location.href = url;
}
</script>

<?php
require('assets/component/script.php');
?>