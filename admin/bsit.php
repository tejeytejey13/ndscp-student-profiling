<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebar.php');
include('../db-conn/config.php');

$query = "SELECT * FROM fillup INNER JOIN course ON fillup.course_name = course.course_name  WHERE course.course_name = 'Bachelor of Science in Information Technology'";
$result = mysqli_query($conn, $query);
// $num = mysqli_num_rows($result);

if($result == $course){
    
}
?>

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Bachelor of Science in Information Techonology</li>
                </ol>
                <main>
                    <div class="container-fluid px-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Student Picture</th>
                                            <th>Full Name</th>
                                            <th>Course</th>
                                            <th>Gender</th>
                                            <th>Date of Birth</th>
                                            <th>Place of Birth</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Student Picture</th>
                                            <th>Full Name</th>
                                            <th>Course</th>
                                            <th>Gender</th>
                                            <th>Date of Birth</th>
                                            <th>Place of Birth</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($result)) {
                                            $coursename = $row['course_name'];
                                            $id = $row['id'];
                                            $pic = $row['student_pic'];
                                            $fname = $row['fname'];
                                            $mname = $row['mname'];
                                            $lname = $row['lname'];
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

                                            $full = $fname . ' ' . $mname . ' ' . $lname;
                                            $date = date('F j, Y', strtotime($birth));

                                        ?>
                                        <tr>
                                            <td>
                                                <div class="avatar-container">
                                                    <div class="avatar" onclick="openImageModal('<?php echo $pic ?>')">
                                                        <img src="../student_pic/<?php echo $pic ?>" alt="Avatar">
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo $full ?></td>
                                            <td><?php echo $coursename ?></td>
                                            <td><?php echo $gender ?></td>
                                            <td><?php echo $date ?></td>
                                            <td><?php echo $place ?></td>
                                            <td><button class="btn btn-primary"
                                                    onclick="view(<?php echo $id ?>)">View</button></td>

                                        </tr>
                                        <?php } ?>
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



function initializeDataTables() {
    const tableIds = ['datatablesSimple'];


    tableIds.forEach(tableId => {
        const datatablesSimple = document.getElementById(tableId);
        if (datatablesSimple) {
            new simpleDatatables.DataTable(datatablesSimple);
        }
    });
}


window.addEventListener('DOMContentLoaded', initializeDataTables);
$(document).ready(function() {
    $('.datatable-input').DataTable({
        searching: false
    });
});
</script>

<?php
require('assets/component/script.php');
?>