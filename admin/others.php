<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebar.php');
include('../db-conn/config.php');

$query = "SELECT * FROM course";
$result = mysqli_query($conn, $query);
?>

<style>
.loader {
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

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Others</li>
                </ol>
                <main>
                    <div class="container-fluid px-6">
                        <form action="../db-conn/addcourse.php" method="POST">
                            <div class="row">
                                <div class="col">
                                    <label for="">Add Course</label>
                                    <input type="text" name="course" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="">Course Belong</label>
                                    <input type="text" name="coursebelong" class="form-control"
                                        placeholder="e.g Department of Teacher Education">
                                </div>
                                <div class="col mt-4">
                                    <button class="btn btn-success submit-button mb-3 hide-on-print" type="button"
                                        id="updateButton">
                                        <span class="update-label">Add</span>
                                        <div class="loader"></div>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div style="display:none;" id="response"></div>

                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Course Name</th>
                                            <th>Course Belong</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Course Name</th>
                                            <th>Course Belong</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($result)) {
                                            $coursename = $row['course_name'];
                                            $coursebelong = $row['course_belong'];
                                            $course_id = $row['course_id'];
                                        ?>
                                        <tr>
                                            <td><?php echo $coursename ?></td>
                                            <td><?php echo $coursebelong ?></td>
                                            <td>
                                                <input type="hidden" value="<?php echo $course_id ?>">
                                                <button class="btn btn-primary"
                                                    onclick="view('<?php echo $course_id ?>', '<?php echo $coursename ?>')">View</button>
                                            </td>
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
function view(course_id, course_name) {
    var url = 'subjects.php?course_id=' + course_id + '&course_name=' + course_name;
    window.location.href = url;
}

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
                        text: 'New Course Added',
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
</script>

<?php
require('assets/component/script.php');
?>