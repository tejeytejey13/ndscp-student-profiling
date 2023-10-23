<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebar.php');
include('../db-conn/config.php');

$query = "SELECT * FROM fillup";
$result = mysqli_query($conn, $query);
?>

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Previous Student</li>
                </ol>
                <main>
                    <div class="container-fluid px-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <!-- <th>Student Picture</th> -->
                                            <th>Full Name</th>
                                            <th>Course</th>
                                            <th>Status</th>
                                            <th>Year</th>
                                            <th>Change Status</th>
                                            <th>Shift Course</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <!-- <th>Student Picture</th> -->
                                            <th>Full Name</th>
                                            <th>Course</th>
                                            <th>Change Status</th>
                                            <th>Status</th>
                                            <th>Year</th>
                                            <th>Shift Course</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($result)) {
                                            $id = $row['id'];
                                            $pic = $row['student_pic'];
                                            $fname = $row['fname'];
                                            $mname = $row['mname'];
                                            $lname = $row['lname'];
                                            $course = $row['course_name'];
                                            $lrn = $row['lrn'];
                                            $place = $row['place_of_birth'];
                                            $birth = $row['birth_of_date'];
                                            $gender = $row['gender'];
                                            $address = $row['address'];
                                            $contact = $row['contact_number'];
                                            $religion = $row['religion'];
                                            $father = $row['father_name'];
                                            $fatheroc = $row['foccupation'];
                                            $mother = $row['mother_name'];
                                            $motheroc = $row['moccupation'];
                                            $birth = date('F j, Y', strtotime($birth));
                                            $status = $row['status'];
                                            $year = $row['current_year'];

                                            $current = date("Y");
                                            if($status !== 'Enrolled' &&  $status !== 'Graduate'){
                                                   
                                                
                                        ?>
                                        <tr>
                                            <!-- <td>
                                                <div class="avatar-container">
                                                    <div class="avatar" onclick="openImageModal('<?php echo $pic ?>')">
                                                        <img src="../student_pic/<?php echo $pic ?>" alt="Avatar">
                                                    </div>
                                                </div>
                                            </td> -->
                                            <td><?php echo ucwords($fname . ' ' . $mname . ' ' . $lname )?></td>
                                            <td><?php echo $course ?></td>
                                            <td><?php echo $status ?></td>
                                            <td><?php echo $current?></td>
                                            <td class="select-container">
                                                <select class="form-control-login" name="status" id="statusDropdown"
                                                    required onchange="updateStatus(<?php echo $id ?>)">
                                                    <option value="<?php echo $status ?>" selected disabled>Select
                                                        Status</option>
                                                    <option value="Enrolled">Re - Enroll</option>

                                                </select>
                                            </td>
                                            <td class="select-container">
                                                <?php
                                                    $coursequery = "SELECT course_name FROM course";
                                                    $courseresult = mysqli_query($conn, $coursequery);
                                                    $courseNames = array();
                                                    
                                                    while ($row = mysqli_fetch_assoc($courseresult)) {
                                                        $courseNames[] = $row['course_name'];
                                                    }
                                                ?>
                                                <select class="form-control-login" name="course" id="courseDropdown"
                                                    onchange="updateCourse(<?php echo $id ?>)">
                                                    <option value="" selected disabled>Select Course</option>
                                                    <?php foreach ($courseNames as $courseName): ?>
                                                    <option value="<?php echo $courseName ?>"><?php echo $courseName ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>

                                            <td>

                                                <button class="btn btn-primary"
                                                    onclick="view(<?php echo $id ?>)">View</button>
                                            </td>
                                        </tr>
                                        <?php
                                            } }                     
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div id="imageModal" class="modal">
                                <div class="modal-content">
                                    <span class="close" onclick="closeImageModal()">&times;</span>
                                    <div class="modal-image-container">
                                        <img id="modalImage" src="" alt="Avatar">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </main>
    </div>
</div>

<style>
/* Style for the dropdown container */
.select-container {
    position: relative;
}

/* Style for the dropdown select element */
.form-control-login {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    color: #333;
    cursor: pointer;
}

/* Style for the select arrow */
.select-arrow {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
}

/* Style for the options */
.form-control-login option {
    background: #fff;
    color: #333;
}

/* Style when the dropdown is focused */
.form-control-login:focus {
    outline: none;
    border-color: #007BFF;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}


img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-right: 10px;
}

.modal-image-container {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
}

.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.7);
    align-items: center;
    justify-content: center;
}

.modal-content {
    background-color: white;
    padding: 20px;
    text-align: center;
    position: relative;
    width: 350px;
    height: 350px;
    border-radius: 100%;
}

.modal-image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 100%;
}

.close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 20px;
    color: #555;
    cursor: pointer;
    z-index: 1;
}
</style>

<script>
function updateCourse(studentId) {
    var newCourse = document.getElementById("courseDropdown").value;

    if (confirm("Are you sure you want to update the course to " + newCourse + "?")) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert("Course updated successfully.");
                location.reload();
            }
        };
        xhr.open("POST", "../db-conn/updatecourse.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("studentId=" + studentId + "&newCourse=" + newCourse);
    } else {
        document.getElementById("courseDropdown").value = "";
    }
}


function updateStatus(studentId) {
    var newStatus = document.getElementById("statusDropdown").value;

    if (confirm("Are you sure you want to update the status to " + newStatus + "?")) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert("Status updated successfully.");
                location.reload();
            }
        };
        xhr.open("POST", "../db-conn/updatestatus.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("studentId=" + studentId + "&newStatus=" + newStatus);
    } else {
        document.getElementById("courseDropdown").value = "";
    }
}



function view(id) {
    var url = 'updateForm.php?id=' + id;
    window.location.href = url;
}

function openImageModal(imageSrc) {
    const modal = document.getElementById('imageModal');
    const modalContent = document.querySelector('.modal-content');
    const modalImage = document.getElementById('modalImage');
    modalImage.src = '../student_pic/' + imageSrc;
    modal.style.display = 'block';
}

function closeImageModal() {
    const modal = document.getElementById('imageModal');
    modal.style.display = 'none';
}

// Add an event listener to prevent closing the modal when clicking inside the content
const modalContent = document.querySelector('.modal-content');
modalContent.addEventListener('click', function(e) {
    e.stopPropagation();
});

// Add an event listener to close the modal when clicking on the modal backdrop
const modal = document.getElementById('imageModal');
modal.addEventListener('click', function() {
    closeImageModal();
});
</script>

<?php
require('assets/component/script.php');
?>