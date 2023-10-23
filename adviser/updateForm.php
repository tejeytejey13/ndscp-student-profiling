<?php
   require('assets/component/header.php');
   require('assets/component/topnavbar.php');
   require('assets/component/sidebar.php');
   include('../db-conn/config.php');

   if(isset($_GET['id'])) {
    $formID = $_GET['id'];
    $query = "SELECT * FROM fillup WHERE id = $formID";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $pic = $row['student_pic'];
    $fname = $row['fname'];
    $mname = $row['mname'];
    $lname = $row['lname'];
    $section = $row['section'];
    $course = $row['course'];
    $school = $row['school_year'];
    $lrn = $row['lrn'];
    $place = $row['place_of_birth'];
    $birth = $row['birth_of_date'];
    $age = $row['age'];
    $gender = $row['gender'];
    $address = $row['address'];
    $contact = $row['contact_number'];
    $tongue = $row['mother_tongue'];
    $religion = $row['religion'];
    $father = $row['father_name'];
    $fatheroc = $row['foccupation'];
    $mother = $row['mother_name'];
    $motheroc = $row['moccupation'];
    $personalities = $row['personalities'];
    $status = $row['status'];
    $emergency = $row['emergency'];

?>

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Update Student Form</li>
                </ol>

                <main>
                    <button type="button" class="btn btn-outline-danger" onClick="backMain()"><i
                            class="fa-solid fa-backward"></i></button>
                    <script>
                    function backMain() {
                        var url = 'student.php';
                        window.location.href = url;
                    }
                    </script>
                    <section class="h-100 background">
                        <div class="container-fluid px-20">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <form action="../db-conn/upForm-adviser.php" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="col">
                                            <div class="form-outline">
                                                <input type="hidden" name="id" value="<?php echo $formID; ?>" />
                                                <input type="file" id="pic" class="form-control" name="profile"
                                                    value="<?php echo $pic ?>" required />
                                                <label class="form-label" for="pic">Attach Formal
                                                    Picture</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <input type="text" name="lname" id="form8Example1"
                                                        class="form-control" value="<?php echo $lname ?>" required />
                                                    <label class="form-label" for="form8Example1">Last
                                                        Name</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <input type="text" name="fname" id="form8Example2"
                                                        class="form-control" value="<?php echo $fname ?>" required />
                                                    <label class="form-label" for="form8Example2">First
                                                        Name</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <input type="text" name="mname" id="form8Example2"
                                                        class="form-control" value="<?php echo $mname ?>" required />
                                                    <label class="form-label" for="form8Example2">Middle
                                                        Name</label>
                                                </div>
                                            </div>
                                        </div>

                                        <hr />

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <select class="form-select" name="course" id="form8Example3"
                                                        required>
                                                        <option value="<?php echo $course ?>">
                                                            <?php echo $course ?>
                                                        </option>
                                                        <option value="Bachelor of Science in Information Technology">
                                                            Bachelor of Science in Information Technology
                                                        </option>
                                                        <option value="Bachelor of Science in Computer Science">
                                                            Bachelor of
                                                            Science in Computer Science</option>
                                                        <option value="Bachelor of Science in Business Administration">
                                                            Bachelor of Science in Business Administration
                                                        </option>
                                                        <option value="Bachelor of Elementary Education">
                                                            Bachelor of
                                                            Elementary Education</option>
                                                        <option value="Bachelor of Secondary Education">Bachelor
                                                            of
                                                            Secondary Education</option>
                                                    </select>
                                                    <label class="form-label" for="form8Example3">Course</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <input type="text" id="form8Example5" name="schoolyear"
                                                        class="form-control" value="<?php echo $school ?>" required />
                                                    <label class="form-label" for="form8Example5">School
                                                        Year</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <input type="text" id="form8Example5" name="lrn"
                                                        class="form-control" value="<?php echo $lrn ?>" required />
                                                    <label class="form-label" for="form8Example5">LRN</label>
                                                </div>
                                            </div>
                                        </div>

                                        <hr />
                                        <div class="col">
                                            <div class="form-outline">
                                                <input type="text" id="form8Example5" name="placeofbirth"
                                                    class="form-control" value="<?php echo $place ?>" required />
                                                <label class="form-label" for="form8Example5">Place of
                                                    Birth</label>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col">
                                                <div class="form-outline">
                                                    <input type="date" id="form8Example4" name="birthofdate"
                                                        class="form-control" value="<?php echo $birth ?>" required />
                                                    <label class="form-label" for="form8Example4">Birth of
                                                        Date</label>
                                                </div>
                                            </div>


                                            <div class="col">
                                                <div class="form-outline">
                                                    <input type="text" id="form8Example5" name="age"
                                                        class="form-control" value="<?php echo $age ?>" />
                                                    <label class="form-label" for="form8Example5">Age</label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-outline">
                                                    <select class="form-select" name="gender" id="form8Example3"
                                                        required>
                                                        <option value="<?php echo $gender ?>">
                                                            <?php echo $gender ?>
                                                        </option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                    <label class="form-label" for="form8Example3">Gender</label>
                                                </div>
                                            </div>
                                        </div>

                                        <hr />
                                        <div class="col">
                                            <div class="form-outline">
                                                <input type="text" name="address" id="form8Example5"
                                                    class="form-control" value="<?php echo $address ?>" required />
                                                <label class="form-label" for="form8Example5">Home
                                                    Address</label>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col">
                                                <div class="form-outline">
                                                    <input type="text" name="cnumber" id="form8Example4"
                                                        class="form-control" value="<?php echo $contact ?>" required />
                                                    <label class="form-label" for="form8Example4">Contact
                                                        Number</label>
                                                </div>
                                            </div>


                                            <div class="col">
                                                <div class="form-outline">
                                                    <input type="text" id="form8Example5" name="tongue"
                                                        class="form-control" value="<?php echo $tongue ?>" required />
                                                    <label class="form-label" for="form8Example5">Mother
                                                        Tongue</label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-outline">
                                                    <select class="form-select" name="religion" id="form8Example3"
                                                        required>
                                                        <option value="<?php echo $religion?>">
                                                            <?php echo $religion?>
                                                        </option>
                                                        <option value="" selected disabled>Choose your religion</option>
                                                        <option value="Catholic">Roman Catholic</option>
                                                        <option value="Muslims">Muslims</option>
                                                        <option value="Seven Day Adventist">Seven Day Adventist</option>
                                                        <option value="Baptist">Baptist</option>
                                                        <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                                                        <option value="Born Again">Born Again</option>
                                                        <option value="Kingdom of Jesus Christ">Kingdom of Jesus Christ
                                                        </option>
                                                        <option value="Apostles' Creed">Apostles' Creed</option>
                                                        <option value="Jehovah Witnesses">Jehovah Witnesses</option>
                                                        <option value="Apostolic Catholic">Apostolic Catholic</option>
                                                        <option value="Penti Costal">Penti Costal</option>
                                                    </select>
                                                    <label class="form-label" for="form8Example3">Religion</label>
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="row">

                                                <div class="col">
                                                    <div class="form-outline">
                                                        <input type="text" id="form8Example4" name="fatname"
                                                            class="form-control" value="<?php echo $father ?>"
                                                            required />
                                                        <label class="form-label" for="form8Example4">Father
                                                            Name</label>
                                                    </div>
                                                </div>


                                                <div class="col">
                                                    <div class="form-outline">
                                                        <input type="text" id="form8Example5" name="foccupation"
                                                            class="form-control" value="<?php echo $fatheroc ?>"
                                                            required />
                                                        <label class="form-label" for="form8Example5">Father
                                                            Occupation</label>
                                                    </div>
                                                </div>


                                                <div class="col">
                                                    <div class="form-outline">
                                                        <input type="text" id="form8Example5" name="motname"
                                                            class="form-control" value="<?php echo $mother ?>"
                                                            required />
                                                        <label class="form-label" for="form8Example5">Mother
                                                            Name</label>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-outline">
                                                        <input type="text" id="form8Example5" name="moccupation"
                                                            class="form-control" value="<?php echo $motheroc ?>"
                                                            required />
                                                        <label class="form-label" for="form8Example5">Mother
                                                            Occupation</label>
                                                    </div>
                                                </div>

                                            </div>

                                            <hr>

                                            <div class="row">

                                                <div class="col">
                                                    <div class="form-outline">
                                                        <input type="text" id="form8Example4" name="personalities"
                                                            class="form-control" value="<?php echo $personalities ?>"
                                                            required />
                                                        <label class="form-label"
                                                            for="form8Example4">Personalities</label>
                                                    </div>
                                                </div>


                                                <div class="col">
                                                    <div class="form-outline">
                                                        <input type="text" id="form8Example4" name="status"
                                                            class="form-control" value="<?php echo $status ?>"
                                                            required />
                                                        <label class="form-label" for="form8Example4">Status</label>
                                                    </div>
                                                </div>


                                                <div class="col">
                                                    <div class="form-outline">
                                                        <input type="text" id="form8Example5" name="coe"
                                                            class="form-control" value="<?php echo $emergency ?>"
                                                            required />
                                                        <label class="form-label" for="form8Example5">Contact
                                                            Incase of
                                                            Emergency</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>
                                            <div>
                                                <!-- <button class="btn btn-primary" id="backButton">Back</button> -->
                                                <button class="btn btn-success">Submit</button>
                                            </div>

                                        </div>
                                    </form>
                                    <?php }  ?>
                                </div>
                            </div>

                    </section>
            </div>
        </main>

        </main>
    </div>
</div>

<?php
    require('assets/component/script.php');
?>