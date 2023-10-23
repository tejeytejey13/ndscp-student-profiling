<!DOCTYPE html>
<html lang="en">
<?php
   require('assets/component/header.php');
   require('assets/component/topnavbar.php');
   require('assets/component/sidebar.php');

   $course = $_SESSION['course_belong'];
?>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="container-fluid">

                        <div class="row">
                            <?php

                            $totalStudent = "SELECT * FROM fillup INNER JOIN course ON fillup.course_name = course.course_name  WHERE course.course_belong = '$course'";
                            if ($result = mysqli_query($conn, $totalStudent)) {
                                $countTotal = mysqli_num_rows($result);
                           
                        ?>
                            <div class="col-xl-4 col-md-4 mb-4" onclick="redirectToPage4('student.php')">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="font-weight-bold text-info text-uppercase mb-1"
                                                    id="index-text">
                                                    Total Students </div>


                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php echo $countTotal ?></div>
                                            </div>
                                            <div class="col-auto mt-3">
                                                <i class="fa-solid fa-users fa-2x text-gray-500 fa-bounce"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                function redirectToPage4(url) {
                                    window.location.href = url;
                                }
                                </script>

                            </div>
                            <?php }?>

                            <?php 
                             $totalMale = "SELECT * FROM fillup INNER JOIN course ON fillup.course_name = course.course_name  WHERE course.course_belong = '$course' AND gender = 'Male'";
                             if ($result = mysqli_query($conn, $totalMale)) {
                                 $countTotalMale = mysqli_num_rows($result);
                            ?>
                            <div class="col-xl-4 col-md-4 mb-4" onclick="redirectToPage4('mstudent.php')">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="font-weight-bold text-info text-uppercase mb-1"
                                                    id="index-text">
                                                    Male Students </div>


                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php echo $countTotalMale ?></div>
                                            </div>
                                            <div class="col-auto mt-3">
                                                <i class="fa-solid fa-person fa-bounce fa-2xl text-gray-500"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                function redirectToPage4(url) {
                                    window.location.href = url;
                                }
                                </script>

                            </div>
                            <?php }?>


                            <?php 
                             $totalFemale = "SELECT * FROM fillup INNER JOIN course ON fillup.course_name = course.course_name  WHERE course.course_belong = '$course' AND gender = 'Female'";
                             if ($result = mysqli_query($conn, $totalFemale)) {
                                 $countTotalFemale = mysqli_num_rows($result);
                            ?>
                            <div class="col-xl-4 col-md-4 mb-4" onclick="redirectToPage4('fstudent.php')">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="font-weight-bold text-info text-uppercase mb-1"
                                                    id="index-text">
                                                    Female Students </div>


                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php echo $countTotalFemale ?></div>
                                            </div>
                                            <div class="col-auto mt-3">
                                                <i class="fa-solid fa-person-dress fa-2xl test-gray-500 fa-bounce"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                function redirectToPage4(url) {
                                    window.location.href = url;
                                }
                                </script>

                            </div>
                            <?php }?>

                            <?php
                                $course = $_SESSION['course_belong'];
                                 $totalCourse = "SELECT course_name FROM fillup WHERE course_name = '$course' ";
                                 if ($result = mysqli_query($conn, $totalCourse)) {
                                     $countTotalCourse = mysqli_num_rows($result);
                            ?>
                            <!-- <div class="col-xl-4 col-md-4 mb-4" onclick="redirectToPage4('course.php')">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="font-weight-bold text-info text-uppercase mb-1"
                                                    id="index-text">
                                                    Course </div>


                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php echo $countTotalCourse ?></div>
                                            </div>
                                            <div class="col-auto mt-3">
                                                <i
                                                    class="fa-solid fa-book-open-reader fa-2x text-gray-500 fa-bounce"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                                <script>
                                function redirectToPage4(url) {
                                    window.location.href = url;
                                }
                                </script>

                            </div>
                            <?php }?>


                        </div>
                    </div>
                </div>
        </div>

        </main>
    </div>
    </div>


    <?php
        require('assets/component/script.php');
    ?>


    <style>
    #index-text {
        color: maroon !important;
    }

    .card {
        transition: transform 0.3s;
    }

    .card:hover {
        transform: scale(1.1);
    }
    </style>
</body>

</html>