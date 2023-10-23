<?php
   require('assets/component/header.php');
   require('assets/component/topnavbar.php');
   require('assets/component/sidebar.php');

   include('../db-conn/config.php');

//    $course = $_SESSION['course_belong'];
//    $query = "SELECT * FROM fillup WHERE course_name = '$course' AND gender = 'Male'";
$course = $_SESSION['course_belong'];
$query = "SELECT * FROM fillup INNER JOIN course ON fillup.course_name = course.course_name  WHERE course.course_belong = '$course' AND gender = 'Female'";
   $result = mysqli_query($conn, $query);
   $num = mysqli_num_rows($result);
?>

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Female Students</li>
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

                                            <!-- <th>Action</th> -->
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

                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            while($row = mysqli_fetch_array($result)) {
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
                                                $status = $row['status'];

                                                $full = $fname . ' ' . $mname . ' ' . $lname;
                                           
                                                $date = date('F j, Y', strtotime($birth));


                                            if($gender !== 'Male' && $status == 'Enrolled'){
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

                                            <!-- <td><button class="btn btn-primary">View</button><button
                                                    class="btn btn-danger">Delete</button></td> -->
                                        </tr>
                                        <?php
                                    }
                                        }
                                    ?>

                                    </tbody>
                                </table>
                            </div>
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

.avatar-container {
    display: flex;
    align-items: center;
    justify-content: center;
}

.avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
    cursor: pointer;
    transition: transform 0.3s;
}

.avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
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
    left: 300;
    right: 0;
    width: 100%;
    height: 100%;
    /* background-color: rgba(0, 0, 0, 0.7); */
    align-items: center;
    justify-content: center;
    border-radius: 100%;
    overflow: hidden;
}

.modal-content {
    background-color: white;
    padding: 20px;
    text-align: center;
    position: relative;
    width: 350px;
    height: 350px;
    border-radius: 100%;
    overflow: hidden;

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
function openImageModal(imageSrc) {
    const modal = document.getElementById('imageModal');
    const modalContent = document.querySelector('.modal-content');
    const modalImage = document.getElementById('modalImage');

    modalImage.src = '../student_pic/' + imageSrc;
    modal.style.display = 'block';

    // Center modal content vertically
    const windowHeight = window.innerHeight;
    const modalHeight = modalContent.clientHeight;
    const topMargin = (windowHeight - modalHeight) / 2;
    modalContent.style.marginTop = topMargin + 'px';
}

function closeImageModal() {
    const modal = document.getElementById('imageModal');
    modal.style.display = 'none';
}

// Add an event listener to the modal backdrop
const modalBackdrop = document.querySelector('.modal');
modalBackdrop.addEventListener('click', closeImageModal);
</script>
<?php
    require('assets/component/script.php');
?>