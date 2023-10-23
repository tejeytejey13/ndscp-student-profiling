<?php
require('assets/component/header.php');
require('assets/component/topnavbar.php');
require('assets/component/sidebar.php');
include('../db-conn/config.php');

if(isset($_GET['id']) && isset($_GET['course']) && isset($_GET['name']) && isset($_GET['courseid'])){
    $id = $_GET['id'];
    $course = $_GET['course'];
    $full = $_GET['name'];
    $courseid = $_GET['courseid'];
}

$select = "SELECT * FROM fillup WHERE id = $id";
$result = mysqli_query($conn, $select);


?>

<head>
    <link rel="stylesheet" type="text/css" href="css/viewstudent.css">
</head>


<style>
@media print {

    th.hide,
    td.hide {
        display: none;
    }

    /* Additional styles for the printed version */
    h4 {
        text-align: center;
        font-size: 18px;
        margin: 10px 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 8px;
        text-align: left;
    }

    tbody tr:nth-child(odd) {
        background-color: #f2f2f2;
    }
}
</style>

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <main>
                    <div class="container-fluid px-6">
                        <button class="btn btn-primary" onclick="printContent()">Print</button>

                        <div class="print-content" id="printContent">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <li class="breadcrumb-item active student-name mb-4">
                                        <?php echo $course?> <br>
                                        <?php echo 'Student Name : '.ucwords($full) ?>
                                    </li>

                                    <!-- 1st year 1st sem -->
                                    <?php
                                   
                                    $query2nd = "SELECT * FROM course
                                            INNER JOIN subjects ON course.course_id = subjects.course_id
                                            WHERE year = 1 AND semester = 1";
                                    $queryresult2nd = mysqli_query($conn, $query2nd);

                                    while ($data = mysqli_fetch_assoc($queryresult2nd)) {
                                        $year = $data['year']; 
                                        $semester = $data['semester']; 
                                    }
                                    ?>
                                    <table id="datatablesSimple1">
                                        <h4><?php echo $year.'st Year '.$semester.'st Semester' ?></h4>
                                        <thead>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Course Description</th>
                                                <th>Units</th>
                                                <th>Prerequisite</th>
                                                <th>Grade</th>
                                                <th class="hide">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Course Description</th>
                                                <th>Units</th>
                                                <th>Prerequisite</th>
                                                <th>Grade</th>
                                                <th class="hide">Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                           $query = "SELECT * FROM course
                                           INNER JOIN fillup ON course.course_name = fillup.course_name
                                           -- INNER JOIN  ON fillup.id = grade.id
                                           INNER JOIN subjects ON course.course_id = subjects.course_id
                                           WHERE subjects.year = 1 AND subjects.semester = 1 AND course.course_name = '$course' AND fillup.id = '$id' AND course.course_id = '$courseid'";
                                           $queryresult = mysqli_query($conn, $query);
                                            
                                            while ($data = mysqli_fetch_array($queryresult)) {
                                                $course_code = $data['course_code'];
                                                $course_description = $data['course_description'];
                                                $units = $data['units'];
                                                $preq = $data['prerequisite'];

                                                $query2 = "SELECT * FROM grade WHERE id = '$id' AND course_code = '$course_code'";
                                                $queryresult2 = mysqli_query($conn, $query2);
                                                $grade = "N/A"; // Default grade value
                                            
                                                if ($data1 = mysqli_fetch_array($queryresult2)) {
                                                    $grade = $data1['grade'];
                                                }

                                            ?>

                                            <tr>
                                                <td><?php echo strtoupper($course_code) ?></td>
                                                <td><?php echo ucwords($course_description) ?></td>
                                                <td><?php echo $units ?></td>
                                                <td><?php echo $preq ?></td>
                                                <td><?php echo $grade ?>

                                                </td>
                                                <td class="hide">
                                                    <form action="../db-conn/gradequery.php" method="post">
                                                        <!-- Add form element -->
                                                        <input type="hidden" name="studentId" value="<?php echo $id ?>">
                                                        <input type="hidden" name="course_code"
                                                            value="<?php echo $course_code ?>">
                                                        <input class="mb-3" type="text" name="gradeInput">
                                                        <button class="btn btn-success submit-button mb-3 "
                                                            type="button" id="updateButton">
                                                            <span class="update-label">Add</span>
                                                            <div class="loader"></div>
                                                        </button>

                                                    </form>
                                                    <div style="display:none;" id="response"></div>


                                                </td>
                                            </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>

                                    <!-- 1st year 2nd sem -->
                                    <?php
                                
                                    $query2nd = "SELECT * FROM course
                                    INNER JOIN subjects ON course.course_id = subjects.course_id
                                    WHERE year = 1 AND semester = 2";
                                    $queryresult2nd = mysqli_query($conn, $query2nd);

                                    while ($data = mysqli_fetch_assoc($queryresult2nd)) {
                                        $year = $data['year'];
                                        $semester = $data['semester'];
                                    }
                                    ?>

                                    <table id="datatablesSimple2">
                                        <h4><?php echo $year . 'st Year ' . $semester . 'nd Semester' ?></h4>
                                        <thead>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Course Description</th>
                                                <th>Units</th>
                                                <th>Prerequisite</th>
                                                <th>Grade</th>
                                                <th class="hide">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Course Description</th>
                                                <th>Units</th>
                                                <th>Prerequisite</th>
                                                <th>Grade</th>
                                                <th class="hide">Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                               $query = "SELECT * FROM course
                                               INNER JOIN fillup ON course.course_name = fillup.course_name
                                               -- INNER JOIN  ON fillup.id = grade.id
                                               INNER JOIN subjects ON course.course_id = subjects.course_id
                                               WHERE subjects.year = 1 AND subjects.semester = 2 AND course.course_name = '$course' AND fillup.id = '$id' AND course.course_id = '$courseid'";
                                               $queryresult = mysqli_query($conn, $query);

                                                while ($data = mysqli_fetch_array($queryresult)) {
                                                    $course_code = $data['course_code'];
                                                    $course_description = $data['course_description'];
                                                    $units = $data['units'];
                                                    $preq = $data['prerequisite'];

                                                    $query2 = "SELECT * FROM grade WHERE id = '$id' AND course_code = '$course_code'";
                                                    $queryresult2 = mysqli_query($conn, $query2);
                                                    $grade = "N/A"; // Default grade value
                                                
                                                    if ($data1 = mysqli_fetch_array($queryresult2)) {
                                                        $grade = $data1['grade'];
                                                    }
                                                ?>
                                            <tr>
                                                <td><?php echo strtoupper($course_code) ?></td>
                                                <td><?php echo ucwords($course_description) ?></td>
                                                <td><?php echo $units ?></td>
                                                <td><?php echo $preq ?></td>
                                                <td><?php echo $grade ?> </td>
                                                <td class="hide">
                                                    <form action="../db-conn/gradequery.php" method="post">
                                                        <!-- Add form element -->
                                                        <input type="hidden" name="studentId" value="<?php echo $id ?>">
                                                        <input type="hidden" name="course_code"
                                                            value="<?php echo $course_code ?>">
                                                        <input class="mb-3" type="text" name="gradeInput">
                                                        <button class="btn btn-success submit-button mb-3 hide-on-print"
                                                            type="button" id="updateButton">
                                                            <span class="update-label">Add</span>
                                                            <div class="loader"></div>
                                                        </button>

                                                    </form>
                                                    <div style="display:none;" id="response"></div>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>


                                    <!-- 2nd year 1st sem -->
                                    <?php
                                 
                                    $query2nd = "SELECT * FROM course
                                            INNER JOIN subjects ON course.course_id = subjects.course_id
                                            WHERE year = 2 AND semester = 1";
                                    $queryresult2nd = mysqli_query($conn, $query2nd);

                                    while ($data = mysqli_fetch_assoc($queryresult2nd)) {
                                        $year = $data['year']; 
                                        $semester = $data['semester']; 
                                    }
                                    ?>
                                    <br><br>
                                    <table id="datatablesSimple3">
                                        <h4><?php echo $year.'nd Year '.$semester.'st Semester' ?></h4>
                                        <thead>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Course Description</th>
                                                <th>Units</th>
                                                <th>Prerequisite</th>
                                                <th>Grade</th>
                                                <th class="hide">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Course Description</th>
                                                <th>Units</th>
                                                <th>Prerequisite</th>
                                                <th>Grade</th>
                                                <th class="hide">Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                           $query = "SELECT * FROM course
                                           INNER JOIN fillup ON course.course_name = fillup.course_name
                                           -- INNER JOIN  ON fillup.id = grade.id
                                           INNER JOIN subjects ON course.course_id = subjects.course_id
                                           WHERE subjects.year = 2 AND subjects.semester = 1 AND course.course_name = '$course' AND fillup.id = '$id' AND course.course_id = '$courseid'";
                                           $queryresult = mysqli_query($conn, $query);
                                            
                                            while ($data = mysqli_fetch_array($queryresult)) {
                                                $course_code = $data['course_code'];
                                                $course_description = $data['course_description'];
                                                $units = $data['units'];
                                                $preq = $data['prerequisite'];

                                                $query2 = "SELECT * FROM grade WHERE id = '$id' AND course_code = '$course_code'";
                                                $queryresult2 = mysqli_query($conn, $query2);
                                                $grade = "N/A"; // Default grade value
                                            
                                                if ($data1 = mysqli_fetch_array($queryresult2)) {
                                                    $grade = $data1['grade'];
                                                }

                                            ?>
                                            <tr>
                                                <td><?php echo strtoupper($course_code) ?></td>
                                                <td><?php echo ucwords($course_description) ?></td>
                                                <td><?php echo $units ?></td>
                                                <td><?php echo $preq ?></td>
                                                <td><?php echo $grade ?> </td>
                                                <td class="hide">
                                                    <form action="../db-conn/gradequery.php" method="post">
                                                        <!-- Add form element -->
                                                        <input type="hidden" name="studentId" value="<?php echo $id ?>">
                                                        <input type="hidden" name="course_code"
                                                            value="<?php echo $course_code ?>">
                                                        <input class="mb-3" type="text" name="gradeInput">
                                                        <button class="btn btn-success submit-button mb-3 hide-on-print"
                                                            type="button" id="updateButton">
                                                            <span class="update-label">Add</span>
                                                            <div class="loader"></div>
                                                        </button>

                                                    </form>
                                                    <div style="display:none;" id="response"></div>

                                                </td>
                                            </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>

                                    <!-- 2nd year 2nd sem -->
                                    <?php
                                 
                                    $query2nd = "SELECT * FROM course
                                            INNER JOIN subjects ON course.course_id = subjects.course_id
                                            WHERE year = 2 AND semester = 2";
                                    $queryresult2nd = mysqli_query($conn, $query2nd);

                                    while ($data = mysqli_fetch_assoc($queryresult2nd)) {
                                        $year = $data['year']; 
                                        $semester = $data['semester']; 
                                    }
                                    ?>
                                    <table id="datatablesSimple4">
                                        <h4><?php echo $year.'nd Year '.$semester.'nd Semester' ?></h4>
                                        <thead>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Course Description</th>
                                                <th>Units</th>
                                                <th>Prerequisite</th>
                                                <th>Grade</th>
                                                <th class="hide">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Course Description</th>
                                                <th>Units</th>
                                                <th>Prerequisite</th>
                                                <th>Grade</th>
                                                <th class="hide">Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM course
                                            INNER JOIN fillup ON course.course_name = fillup.course_name
                                            -- INNER JOIN  ON fillup.id = grade.id
                                            INNER JOIN subjects ON course.course_id = subjects.course_id
                                            WHERE subjects.year = 2 AND subjects.semester = 2 AND course.course_name = '$course' AND fillup.id = '$id' AND course.course_id = '$courseid'";
                                            $queryresult = mysqli_query($conn, $query);
                                            
                                            while ($data = mysqli_fetch_array($queryresult)) {
                                                $course_code = $data['course_code'];
                                                $course_description = $data['course_description'];
                                                $units = $data['units'];
                                                $preq = $data['prerequisite'];

                                                $query2 = "SELECT * FROM grade WHERE id = '$id' AND course_code = '$course_code'";
                                                $queryresult2 = mysqli_query($conn, $query2);
                                                $grade = "N/A"; // Default grade value
                                            
                                                if ($data1 = mysqli_fetch_array($queryresult2)) {
                                                    $grade = $data1['grade'];
                                                }
                                            ?>
                                            <tr>
                                                <td><?php echo strtoupper($course_code) ?></td>
                                                <td><?php echo ucwords($course_description) ?></td>
                                                <td><?php echo $units ?></td>
                                                <td><?php echo $preq ?></td>
                                                <td><?php echo $grade ?> </td>
                                                <td class="hide">
                                                    <form action="../db-conn/gradequery.php" method="post">
                                                        <!-- Add form element -->
                                                        <input type="hidden" name="studentId" value="<?php echo $id ?>">
                                                        <input type="hidden" name="course_code"
                                                            value="<?php echo $course_code ?>">
                                                        <input class="mb-3" type="text" name="gradeInput">
                                                        <button class="btn btn-success submit-button mb-3 hide-on-print"
                                                            type="button" id="updateButton">
                                                            <span class="update-label">Add</span>
                                                            <div class="loader"></div>
                                                        </button>

                                                    </form>
                                                    <div style="display:none;" id="response"></div>

                                                </td>
                                            </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>

                                    <!-- Summer -->
                                    <?php
                                  
                                    $query2nd = "SELECT * FROM course
                                            INNER JOIN subjects ON course.course_id = subjects.course_id
                                            WHERE year = 2 AND semester = 3";
                                    $queryresult2nd = mysqli_query($conn, $query2nd);

                                    while ($data = mysqli_fetch_assoc($queryresult2nd)) {
                                        $year = $data['year']; 
                                        $semester = $data['semester']; 
                                    }
                                    ?>
                                    <table id="datatablesSimple5">
                                        <h4><?php echo $year.'nd Year '. 'Summer' ?></h4>
                                        <thead>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Course Description</th>
                                                <th>Units</th>
                                                <th>Prerequisite</th>
                                                <th>Grade</th>
                                                <th class="hide">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Course Description</th>
                                                <th>Units</th>
                                                <th>Prerequisite</th>
                                                <th>Grade</th>
                                                <th class="hide">Action</th>

                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                             $query = "SELECT * FROM course
                                             INNER JOIN fillup ON course.course_name = fillup.course_name
                                             -- INNER JOIN  ON fillup.id = grade.id
                                             INNER JOIN subjects ON course.course_id = subjects.course_id
                                             WHERE subjects.year = 2 AND subjects.semester = 3 AND course.course_name = '$course' AND fillup.id = '$id' AND course.course_id = '$courseid'";
                                             $queryresult = mysqli_query($conn, $query);
        
                                            while ($data = mysqli_fetch_array($queryresult)) {
                                                $course_code = $data['course_code'];
                                                $course_description = $data['course_description'];
                                                $units = $data['units'];
                                                $preq = $data['prerequisite'];

                                                $query2 = "SELECT * FROM grade WHERE id = '$id' AND course_code = '$course_code'";
                                                $queryresult2 = mysqli_query($conn, $query2);
                                                $grade = "N/A"; // Default grade value
                                            
                                                if ($data1 = mysqli_fetch_array($queryresult2)) {
                                                    $grade = $data1['grade'];
                                                }

                                            ?>

                                            <tr>
                                                <td><?php echo strtoupper($course_code) ?></td>
                                                <td><?php echo ucwords($course_description) ?></td>
                                                <td><?php echo $units ?></td>
                                                <td><?php echo $preq ?></td>
                                                <td><?php echo $grade ?>
                                                <td class="hide">
                                                    <form action="../db-conn/gradequery.php" method="post">
                                                        <!-- Add form element -->
                                                        <input type="hidden" name="studentId" value="<?php echo $id ?>">
                                                        <input type="hidden" name="course_code"
                                                            value="<?php echo $course_code ?>">
                                                        <input class="mb-3" type="text" name="gradeInput">
                                                        <button class="btn btn-success submit-button mb-3 hide-on-print"
                                                            type="button" id="updateButton">
                                                            <span class="update-label">Add</span>
                                                            <div class="loader"></div>
                                                        </button>

                                                    </form>
                                                    <div style="display:none;" id="response"></div>
                                                </td>
                                            </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>

                                    <!-- 3rd year 1st sem -->
                                    <?php
                                   
                                    $query2nd = "SELECT * FROM course
                                            INNER JOIN subjects ON course.course_id = subjects.course_id
                                            WHERE year = 3 AND semester = 1";
                                    $queryresult2nd = mysqli_query($conn, $query2nd);

                                    while ($data = mysqli_fetch_assoc($queryresult2nd)) {
                                        $year = $data['year']; 
                                        $semester = $data['semester']; 
                                    }
                                    ?>
                                    <br><br>
                                    <table id="datatablesSimple6">
                                        <h4><?php echo $year.'rd Year '.$semester.'st Semester' ?></h4>
                                        <thead>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Course Description</th>
                                                <th>Units</th>
                                                <th>Prerequisite</th>
                                                <th>Grade</th>
                                                <th class="hide">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Course Description</th>
                                                <th>Units</th>
                                                <th>Prerequisite</th>
                                                <th>Grade</th>
                                                <th class="hide">Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM course
                                            INNER JOIN fillup ON course.course_name = fillup.course_name
                                            -- INNER JOIN  ON fillup.id = grade.id
                                            INNER JOIN subjects ON course.course_id = subjects.course_id
                                            WHERE subjects.year = 3 AND subjects.semester = 1 AND course.course_name = '$course' AND fillup.id = '$id' AND course.course_id = '$courseid'";
                                            $queryresult = mysqli_query($conn, $query);
                                            
                                            while ($data = mysqli_fetch_array($queryresult)) {
                                                $course_code = $data['course_code'];
                                                $course_description = $data['course_description'];
                                                $units = $data['units'];
                                                $preq = $data['prerequisite'];

                                                $query2 = "SELECT * FROM grade WHERE id = '$id' AND course_code = '$course_code'";
                                                $queryresult2 = mysqli_query($conn, $query2);
                                                $grade = "N/A"; // Default grade value
                                            
                                                if ($data1 = mysqli_fetch_array($queryresult2)) {
                                                    $grade = $data1['grade'];
                                                }
                                            ?>
                                            <tr>
                                                <td><?php echo strtoupper($course_code) ?></td>
                                                <td><?php echo ucwords($course_description) ?></td>
                                                <td><?php echo $units ?></td>
                                                <td><?php echo $preq ?></td>
                                                <td><?php echo $grade ?> </td>
                                                <td class="hide">
                                                    <form action="../db-conn/gradequery.php" method="post">
                                                        <!-- Add form element -->
                                                        <input type="hidden" name="studentId" value="<?php echo $id ?>">
                                                        <input type="hidden" name="course_code"
                                                            value="<?php echo $course_code ?>">
                                                        <input class="mb-3" type="text" name="gradeInput">
                                                        <button class="btn btn-success submit-button mb-3 hide-on-print"
                                                            type="button" id="updateButton">
                                                            <span class="update-label">Add</span>
                                                            <div class="loader"></div>
                                                        </button>

                                                    </form>
                                                    <div style="display:none;" id="response"></div>

                                                </td>
                                            </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>

                                    <!-- 3rd year 2nd semd -->


                                    <?php
                            
                            
                                        $query2nd = "SELECT * FROM course
                                            INNER JOIN subjects ON course.course_id = subjects.course_id
                                            WHERE year = 3 AND semester = 2";
                                        $queryresult2nd = mysqli_query($conn, $query2nd);

                                        while ($data = mysqli_fetch_assoc($queryresult2nd)) {
                                        $year = $data['year']; 
                                        $semester = $data['semester']; 
                                        }
                                    ?>
                                    <table id="datatablesSimple7">
                                        <h4><?php echo $year.'rd Year '.$semester.'nd Semester' ?></h4>
                                        <thead>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Course Description</th>
                                                <th>Units</th>
                                                <th>Prerequisite</th>
                                                <th>Grade</th>
                                                <th class="hide">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Course Description</th>
                                                <th>Units</th>
                                                <th>Prerequisite</th>
                                                <th>Grade</th>
                                                <th class="hide">Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM course
                                            INNER JOIN fillup ON course.course_name = fillup.course_name
                                            -- INNER JOIN  ON fillup.id = grade.id
                                            INNER JOIN subjects ON course.course_id = subjects.course_id
                                            WHERE subjects.year = 3 AND subjects.semester = 2 AND course.course_name = '$course' AND fillup.id = '$id' AND course.course_id = '$courseid'";
                                            $queryresult = mysqli_query($conn, $query);
                                            while ($data = mysqli_fetch_array($queryresult)) {
                                                $course_code = $data['course_code'];
                                                $course_description = $data['course_description'];
                                                $units = $data['units'];
                                                $preq = $data['prerequisite'];

                                                $query2 = "SELECT * FROM grade WHERE id = '$id' AND course_code = '$course_code'";
                                                $queryresult2 = mysqli_query($conn, $query2);
                                                $grade = "N/A"; // Default grade value
                                            
                                                if ($data1 = mysqli_fetch_array($queryresult2)) {
                                                    $grade = $data1['grade'];
                                                }

                                            ?>
                                            <tr>
                                                <td><?php echo strtoupper($course_code) ?></td>
                                                <td><?php echo ucwords($course_description) ?></td>
                                                <td><?php echo $units ?></td>
                                                <td><?php echo $preq ?></td>
                                                <td><?php echo $grade ?> </td>
                                                <td class="hide">
                                                    <form action="../db-conn/gradequery.php" method="post">
                                                        <!-- Add form element -->
                                                        <input type="hidden" name="studentId" value="<?php echo $id ?>">
                                                        <input type="hidden" name="course_code"
                                                            value="<?php echo $course_code ?>">
                                                        <input class="mb-3" type="text" name="gradeInput">
                                                        <button class="btn btn-success submit-button mb-3 hide-on-print"
                                                            type="button" id="updateButton">
                                                            <span class="update-label">Add</span>
                                                            <div class="loader"></div>
                                                        </button>

                                                    </form>
                                                    <div style="display:none;" id="response"></div>

                                                </td>
                                            </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>

                                    <!-- 4th year 1st sem -->

                                    <?php
                                   
                                    $query2nd = "SELECT * FROM course
                                            INNER JOIN subjects ON course.course_id = subjects.course_id
                                            WHERE year = 4 AND semester = 1";
                                    $queryresult2nd = mysqli_query($conn, $query2nd);

                                    while ($data = mysqli_fetch_assoc($queryresult2nd)) {
                                        $year = $data['year']; 
                                        $semester = $data['semester']; 
                                    }
                                    ?>
                                    <br><br>
                                    <table id="datatablesSimple8">
                                        <h4><?php echo $year.'th Year '.$semester.'st Semester' ?></h4>
                                        <thead>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Course Description</th>
                                                <th>Units</th>
                                                <th>Prerequisite</th>
                                                <th>Grade</th>
                                                <th class="hide">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Course Description</th>
                                                <th>Units</th>
                                                <th>Prerequisite</th>
                                                <th>Grade</th>
                                                <th class="hide">Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM course
                                            INNER JOIN fillup ON course.course_name = fillup.course_name
                                            -- INNER JOIN  ON fillup.id = grade.id
                                            INNER JOIN subjects ON course.course_id = subjects.course_id
                                            WHERE subjects.year = 4 AND subjects.semester = 1 AND course.course_name = '$course' AND fillup.id = '$id' AND course.course_id = '$courseid'";
                                            $queryresult = mysqli_query($conn, $query);
                                            
                                            while ($data = mysqli_fetch_array($queryresult)) {
                                                $course_code = $data['course_code'];
                                                $course_description = $data['course_description'];
                                                $units = $data['units'];
                                                $preq = $data['prerequisite'];

                                                $query2 = "SELECT * FROM grade WHERE id = '$id' AND course_code = '$course_code'";
                                                $queryresult2 = mysqli_query($conn, $query2);
                                                $grade = "N/A"; // Default grade value
                                            
                                                if ($data1 = mysqli_fetch_array($queryresult2)) {
                                                    $grade = $data1['grade'];
                                                }
                                            ?>
                                            <tr>
                                                <td><?php echo strtoupper($course_code) ?></td>
                                                <td><?php echo ucwords($course_description) ?></td>
                                                <td><?php echo $units ?></td>
                                                <td><?php echo $preq ?></td>
                                                <td><?php echo $grade ?> </td>
                                                <td class="hide">
                                                    <form action="../db-conn/gradequery.php" method="post">
                                                        <!-- Add form element -->
                                                        <input type="hidden" name="studentId" value="<?php echo $id ?>">
                                                        <input type="hidden" name="course_code"
                                                            value="<?php echo $course_code ?>">
                                                        <input class="mb-3" type="text" name="gradeInput">
                                                        <button class="btn btn-success submit-button mb-3 hide-on-print"
                                                            type="button" id="updateButton">
                                                            <span class="update-label">Add</span>
                                                            <div class="loader"></div>
                                                        </button>

                                                    </form>
                                                    <div style="display:none;" id="response"></div>

                                                </td>
                                            </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>

                                    <!-- 4th year 2nd sem -->
                                    <?php
                                   
                                    $query2nd = "SELECT * FROM course
                                            INNER JOIN subjects ON course.course_id = subjects.course_id
                                            WHERE year = 4 AND semester = 2";
                                    $queryresult2nd = mysqli_query($conn, $query2nd);

                                    while ($data = mysqli_fetch_assoc($queryresult2nd)) {
                                        $year = $data['year']; 
                                        $semester = $data['semester']; 
                                    }
                                    ?>
                                    <table id="datatablesSimple9">
                                        <h4><?php echo $year.'th Year '.$semester.'nd Semester' ?></h4>
                                        <thead>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Course Description</th>
                                                <th>Units</th>
                                                <th>Prerequisite</th>
                                                <th>Grade</th>
                                                <th class="hide">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Course Description</th>
                                                <th>Units</th>
                                                <th>Prerequisite</th>
                                                <th>Grade</th>
                                                <th class="hide">Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                           $query = "SELECT * FROM course
                                           INNER JOIN fillup ON course.course_name = fillup.course_name
                                           -- INNER JOIN  ON fillup.id = grade.id
                                           INNER JOIN subjects ON course.course_id = subjects.course_id
                                           WHERE subjects.year = 4 AND subjects.semester = 2 AND course.course_name = '$course' AND fillup.id = '$id' AND course.course_id = '$courseid'";
                                           $queryresult = mysqli_query($conn, $query);
        
                                            while ($data = mysqli_fetch_array($queryresult)) {
                                                $course_code = $data['course_code'];
                                                $course_description = $data['course_description'];
                                                $units = $data['units'];
                                                $preq = $data['prerequisite'];

                                                $query2 = "SELECT * FROM grade WHERE id = '$id' AND course_code = '$course_code'";
                                                $queryresult2 = mysqli_query($conn, $query2);
                                                $grade = "N/A"; // Default grade value
                                            
                                                if ($data1 = mysqli_fetch_array($queryresult2)) {
                                                    $grade = $data1['grade'];
                                                }

                                            ?>
                                            <tr>
                                                <td><?php echo strtoupper($course_code) ?></td>
                                                <td><?php echo ucwords($course_description) ?></td>
                                                <td><?php echo $units ?></td>
                                                <td><?php echo $preq ?></td>
                                                <td><?php echo $grade ?> </td>
                                                <td class="hide">
                                                    <form action="../db-conn/gradequery.php" method="post">
                                                        <!-- Add form element -->
                                                        <input type="hidden" name="studentId" value="<?php echo $id ?>">
                                                        <input type="hidden" name="course_code"
                                                            value="<?php echo $course_code ?>">
                                                        <input class="mb-3" type="text" name="gradeInput">
                                                        <button class="btn btn-success submit-button mb-3 hide-on-print"
                                                            type="button" id="updateButton">
                                                            <span class="update-label">Add</span>
                                                            <div class="loader"></div>
                                                        </button>

                                                    </form>
                                                    <div style="display:none;" id="response"></div>

                                                </td>
                                            </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
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
<script src="js/grade.js"></script>
<script>
function initializeDataTables() {
    const tableIds = ['datatablesSimple1', 'datatablesSimple2', 'datatablesSimple3', 'datatablesSimple4',
        'datatablesSimple5', 'datatablesSimple6', 'datatablesSimple7', 'datatablesSimple8', 'datatablesSimple9'
    ];

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

function printContent() {
    var tables = document.querySelectorAll('.print-content table');
    // Create a new window to print
    var printWindow = window.open("", "", "width=793,height=1122");
    printWindow.document.write("<html><head><title>Student Prospectus</title></head><body>");

    // Style the table for printing
    printWindow.document.write('<style type="text/css">');
    printWindow.document.write('.btn { display: none; }');
    printWindow.document.write('h1 { font-size: 10px; }');


    // Apply styles to tables with IDs datatablesSimple1 to datatablesSimple9
    for (var i = 1; i <= 9; i++) {
        printWindow.document.write('#datatablesSimple' + i +
            ' { background-color: #f5f5f5; border-collapse: collapse; width: 100%; }');
        printWindow.document.write('#datatablesSimple' + i + ' th, #datatablesSimple' + i +
            ' td { padding: 10px; border: 1px solid #000; }');
        printWindow.document.write('#datatablesSimple' + i + ' th { background-color: #f5f5f5; }');
        printWindow.document.write('#datatablesSimple' + i + ' th:last-child, #datatablesSimple' + i +
            ' td:last-child { display: none; }');
    }

    printWindow.document.write('.due-date { font-weight: bold; color: #FF0000; }');
    printWindow.document.write('.due-warning { font-size: 8px; font-weight: bold; color: #FF0000; }');

    printWindow.document.write('</style>');

    // Get the table to print
    var studentNameContent = document.querySelector('.student-name').innerHTML;
    printWindow.document.write(studentNameContent);

    // Define an array of table IDs
    var tableIds = ["datatablesSimple1", "datatablesSimple2", "datatablesSimple3", "datatablesSimple4",
        "datatablesSimple5", "datatablesSimple6", "datatablesSimple7", "datatablesSimple8", "datatablesSimple9"
    ];

    // Print tables with margin-bottom
    for (var i = 0; i < tableIds.length; i++) {
        var tableToPrint = document.getElementById(tableIds[i]);

        if (tableToPrint) {
            printWindow.document.write(tableToPrint.outerHTML);
            printWindow.document.write('<div style="margin-bottom: 20px;"></div>'); // Add margin after each table
        }
    }
    // Close the print window and print
    printWindow.document.write("</body></html>");
    printWindow.document.close();
    printWindow.print();
    printWindow.close();


}
</script>

<?php
require('assets/component/script.php');
?>