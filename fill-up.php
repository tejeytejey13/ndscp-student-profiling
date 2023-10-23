<!DOCTYPE HTML>

<html>

<head>
    <title>NDSCP - Student Profilling System</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/fill-up.css">
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" />
    </noscript>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<style>
body {
    background: maroon;
    color: black;
}

header p {
    color: black;
}


.black-label {
    color: black;
}

label {
    color: black;
}

.form-check input[type="radio"] {
    background-color: black;
}

.warning-bro {
    color: red;
    font-size: 15px;
}
</style>
<?php
include('db-conn/config.php');

    $coursequery = "SELECT course_name FROM course";
    $courseresult = mysqli_query($conn, $coursequery);
    $courseNames = array();
    
    while ($row = mysqli_fetch_assoc($courseresult)) {
        $courseNames[] = $row['course_name'];
    }
?>

<body class="is-preload">
    <div id="page-wrapper">

        <div id="main" class="">
            <div class="container">
                <div style="height: auto; overflow-y: auto;">
                    <section class="background">
                        <div class="container-fluid">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <header class="major">
                                        <h2 class="text-black">Student Fill - Up</h2><br>
                                        <p>
                                            <b>DIRECTIONS:</b> Fill in all information needed and attach an ID photo.
                                            Submit this form together
                                            with other documents outlined in the application procedure.
                                        </p>
                                    </header>
                                    <form action="db-conn/fill.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col">
                                                <h4>COLLEGE</h4>
                                            </div>

                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example3">Course</label>

                                                    <select class="form-control-login" name="course" id="courseDropdown"
                                                        onchange="updateCourse(<?php echo $id ?>)">
                                                        <option value="" selected disabled>Select Course</option>
                                                        <?php foreach ($courseNames as $courseName): ?>
                                                        <option value="<?php echo $courseName ?>">
                                                            <?php echo $courseName ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example3">Semester</label>

                                                    <select class="form-select" name="semester" id="form8Example3"
                                                        required>
                                                        <option value="" selected disabled>Select Semester</option>
                                                        <option value="1st Semester">
                                                            1st Semester
                                                        </option>
                                                        <option value="2nd Semester">
                                                            2nd Semester
                                                        </option>

                                                    </select>
                                                </div>
                                            </div> -->
                                            <div class="form-outline">
                                                <label class="form-label" for="form8Example5">STUDENT ID / LRN</label>

                                                <input type="text" id="form8Example5" name="lrn" class="form-control"
                                                    required />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <h4>I. PERSONAL</h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="pic">Attach Formal Picture</label>

                                                <input type="file" id="pic" class="form-control" name="profile"
                                                    required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example1">Family Name</label>

                                                    <input type="text" name="lname" id="form8Example1"
                                                        class="form-control" required />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example2">First Name</label>

                                                    <input type="text" name="fname" id="form8Example2"
                                                        class="form-control" required />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example2">Middle
                                                        Name</label>
                                                    <input type="text" name="mname" id="form8Example2"
                                                        class="form-control" />

                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example3">Gender</label>
                                                    <select class="form-select" name="gender" id="form8Example3"
                                                        required>
                                                        <option value="" selected disabled>Choose your gender
                                                        </option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>

                                                    </select>

                                                </div>
                                            </div>
                                        </div>

                                        <hr />
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example5">Address</label>

                                                    <input type="text" name="address" id="form8Example5"
                                                        class="form-control" required />
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example5">Provincial
                                                        Address</label>
                                                    <input type="text" name="provaddress" id="form8Example5"
                                                        class="form-control" />

                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example4">
                                                        Tel.No. / Mobile No.
                                                    </label>
                                                    <input type="text" name="cnumber" id="form8Example4"
                                                        class="form-control" required />

                                                </div>
                                            </div>
                                        </div>

                                        <hr>


                                        <div class="row">

                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example4">Birth of
                                                        Date</label>
                                                    <input type="date" id="form8Example4" name="birthofdate"
                                                        class="form-control" required />

                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example5">Place of Birth</label>

                                                    <input type="text" id="form8Example5" name="placeofbirth"
                                                        class="form-control" required />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example5">Nationality</label>

                                                    <input type="text" id="form8Example5" name="nationality"
                                                        class="form-control" required />
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example3">Religion</label>

                                                    <select class="form-select" name="religion" id="form8Example3"
                                                        required>
                                                        <option value="" selected disabled>Choose your religion
                                                        </option>
                                                        <option value="Catholic">Roman Catholic</option>
                                                        <option value="Muslims">Muslims</option>
                                                        <option value="Seven Day Adventist">Seven Day Adventist
                                                        </option>
                                                        <option value="Baptist">Baptist</option>
                                                        <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                                                        <option value="Born Again">Born Again</option>
                                                        <option value="Kingdom of Jesus Christ">Kingdom of Jesus
                                                            Christ
                                                        </option>
                                                        <option value="Apostles' Creed">Apostles' Creed</option>
                                                        <option value="Jehovah Witnesses">Jehovah Witnesses</option>
                                                        <option value="Apostolic Catholic">Apostolic Catholic
                                                        </option>
                                                        <option value="Penti Costal">Penti Costal</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example2">Where and When
                                                        Baptized</label>
                                                    <input type="text" name="baptized" id="form8Example2"
                                                        class="form-control" />

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example3">Confirmed</label>

                                                    <select class="form-select" name="confirmed" id="form8Example3"
                                                        required>
                                                        <option value="" selected disabled>Choose your answer
                                                        </option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example3">First
                                                        Communion</label>
                                                    <select class="form-select" name="communion" id="form8Example3"
                                                        required>
                                                        <option value="" selected disabled>Choose your answer
                                                        </option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>

                                                    </select>

                                                </div>
                                            </div>

                                        </div>

                                        <hr>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example3">Child Position in the
                                                        Family</label>
                                                    <select class="form-select" name="familyposition" id="famposition"
                                                        onchange="toggleOtherInput()" required>
                                                        <option value="" selected disabled>Choose your position
                                                        </option>
                                                        <option value="Eldest">Eldest</option>
                                                        <option value="Youngest">Youngest</option>
                                                        <option value="Only Child">Only Child</option>
                                                        <option value="Others">Others</option>

                                                    </select>

                                                </div>

                                            </div>
                                            <div class="col">

                                                <div class="form-outline" id="otherPositionInput">
                                                    <label class="form-label" for="form8Example2">Others </label>
                                                    <label class="warning-bro">* Please specify</label>
                                                    <input type="text" name="famothers" id="otherPosition"
                                                        class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="number">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-outline" id="otherPositionInputNumber">
                                                        <label class="form-label" for="form8Example2">Number of
                                                            Brother/s</label>
                                                        <input type="text" name="numofbro" id="otherPositionNumber"
                                                            class="form-control" />

                                                    </div>

                                                </div>
                                                <div class="col">
                                                    <div class="form-outline" id="otherPositionInputNumberSis">
                                                        <label class="form-label" for="form8Example2">Number of
                                                            Sister/s</label>
                                                        <input type="text" name="numofsis" id="otherPositionNumber"
                                                            class="form-control" />

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example3">Area where the
                                                        applicant’s grew up</label>
                                                    <select class="form-select" name="areapplicant" id="area"
                                                        onchange="toggleOtherInputArea()" required>
                                                        <option value="" selected disabled>Choose your position
                                                        </option>
                                                        <option value="Metro Manila">Metro Manila</option>
                                                        <option value="Province">Province</option>
                                                        <option value="Others">Others</option>

                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline" id="areaInput">
                                                    <label class="form-label" for="form8Example2">Others</label>
                                                    <label class="warning-bro">* Please specify</label>

                                                    <input type="text" name="areaothers" id="otherAreaInput"
                                                        class="form-control" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example5">
                                                        In case of Emergency, Person to be contacted
                                                    </label>
                                                    <input type="text" id="form8Example5" name="coe"
                                                        class="form-control" required />

                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example5">
                                                        Tel no. / Mobile No.
                                                    </label>
                                                    <input type="text" id="form8Example5" name="emergencynumber"
                                                        class="form-control" required />

                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col">
                                                <h4>II. FAMILY</h4>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="row">
                                            <div class="col">
                                                <h5>FATHER INFORMATION</h5>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example4">Father's
                                                        Name</label>
                                                    <input type="text" id="form8Example4" name="fatname"
                                                        class="form-control" required />

                                                </div>
                                            </div>


                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example5">Father's
                                                        Occupation</label>
                                                    <input type="text" id="form8Example5" name="foccupation"
                                                        class="form-control" required />

                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example5">Educational
                                                        Attainment</label>
                                                    <input type="text" id="form8Example5" name="feducattain"
                                                        class="form-control" required />

                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example5">School</label>

                                                    <input type="text" id="form8Example5" name="fschool"
                                                        class="form-control" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example5">Place of Birth</label>

                                                    <input type="text" id="form8Example5" name="fbirth"
                                                        class="form-control" required />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example5">Business
                                                        Address</label>
                                                    <input type="text" id="form8Example5" name="fbusiness"
                                                        class="form-control" required />

                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example5">Contact No</label>

                                                    <input type="text" id="form8Example5" name="fcontact"
                                                        class="form-control" required />
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="col">
                                                <h5>MOTHER INFORMATION</h5>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example4">Mother's
                                                        Name</label>
                                                    <input type="text" id="form8Example4" name="motname"
                                                        class="form-control" required />

                                                </div>
                                            </div>


                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example5">Mother's
                                                        Occupation</label>
                                                    <input type="text" id="form8Example5" name="moccupation"
                                                        class="form-control" required />

                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example5">Educational
                                                        Attainment</label>
                                                    <input type="text" id="form8Example5" name="meducattain"
                                                        class="form-control" required />

                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example5">School</label>

                                                    <input type="text" id="form8Example5" name="mschool"
                                                        class="form-control" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example5">Place of Birth</label>

                                                    <input type="text" id="form8Example5" name="mbirth"
                                                        class="form-control" required />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example5">Business
                                                        Address</label>
                                                    <input type="text" id="form8Example5" name="mbusiness"
                                                        class="form-control" required />

                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example5">Contact No</label>

                                                    <input type="text" id="form8Example5" name="mcontact"
                                                        class="form-control" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example3">Parents Married
                                                        in</label>
                                                    <select class="form-select" name="married" id="fammarried"
                                                        onchange="toggleOtherInputMarried()" required>
                                                        <option value="" selected disabled>Choose status
                                                        </option>
                                                        <option value="Catholic Church">Catholic Church</option>
                                                        <option value="Civil Wedding">Civil Wedding</option>
                                                        <option value="Living-in">Living-in</option>
                                                        <option value="Others">Others</option>

                                                    </select>

                                                </div>

                                            </div>
                                            <div class="col">
                                                <div class="form-outline" id="married">
                                                    <label class="form-label" for="form8Example2">Others</label>
                                                    <label class="warning-bro">* Please specify</label>

                                                    <input type="text" name="marriedothers" id="married"
                                                        class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example3">Parents</label>

                                                    <select class="form-select" name="parents" required>
                                                        <option value="" selected disabled>Choose status
                                                        </option>
                                                        <option value="Living Together">Living Together</option>
                                                        <option
                                                            value="Still together but due to occupation one lives in another place/abroad">
                                                            Still together but due to occupation one lives in another
                                                            place/abroad</option>
                                                        <option value="Seperated">Seperated</option>
                                                        <option value="Father remarried">Father remarried</option>
                                                        <option value="Mother remarried">Mother remarried</option>
                                                        <option value="Widow (Father Deceased)">Widow (Father Deceased)
                                                        </option>
                                                        <option value="Widower (Mother Deceased)">Widower (Mother
                                                            Deceased)
                                                        </option>


                                                    </select>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-outline">
                                                <label class="form-label" for="form8Example3">Socio - economic Level of
                                                    the Family: (Estimated Annual Income of Parents)</label>
                                                <select class="form-select" name="income" required>
                                                    <option value="" selected disabled>Choose Income
                                                    </option>
                                                    <option value="Bellow 100,000">Bellow 100,000</option>
                                                    <option value="100,000 - 250,000">
                                                        100,000 - 250,000
                                                    </option>
                                                    <option value="251,000 - 350,000">251,000 - 350,000</option>
                                                    <option value="351,000 - 451,000">351,000 - 451,000</option>
                                                    <option value="451,000 - 550,000">451,000 - 550,000</option>
                                                    <option value="551,000 - 750,000">551,000 - 750,000
                                                    </option>
                                                    <option value="751,000 - 1,000,000">751,000 - 1,000,000
                                                    </option>
                                                    <option value="1,000,000 and above">1,000,000 and above
                                                    </option>


                                                </select>

                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label">Name of Brother/s Sister/s (Oldest to
                                                        youngest)
                                                    </label>
                                                    <label class="warning-bro">* Name, Age, Grade/Year
                                                        Occupation, and School/Company</label>
                                                    <textarea name="nameofbroandsis" class="form-control"
                                                        rows="10"></textarea>

                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label">Grade School
                                                    </label>
                                                    <label class="warning-bro">* School Attended, Address, and School
                                                        Year</label>
                                                    <textarea name="gradeschool" class="form-control"
                                                        rows="10"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label">High School
                                                    </label>
                                                    <label class="warning-bro">* School Attended, Address, and School
                                                        Year</label>
                                                    <textarea name="highschool" class="form-control"
                                                        rows="10"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label">College
                                                    </label>
                                                    <label class="warning-bro">* School Attended, Address, and School
                                                        Year</label>
                                                    <textarea name="college" class="form-control" rows="10"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label">Honors or Prizes received and for what?
                                                    </label>
                                                    <!-- <label class="warning-bro">* School Attended, Address, and School
                                                        Year</label> -->
                                                    <textarea name="honor" class="form-control" rows="10"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example5">Organizational / Club
                                                        in or out of school</label>
                                                    <input type="text" id="form8Example5" name="club"
                                                        class="form-control" />

                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form8Example5">Position/s
                                                        Held</label>
                                                    <input type="text" id="form8Example5" name="posheld"
                                                        class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <div>
                                            <button class="btn btn-primary" id="backButton">Back</button>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                    </section>

                </div>


            </div>
        </div>



    </div>

    <script>
    window.onload = function() {
        var selectElement = document.getElementById("famposition");
        var otherInput = document.getElementById("otherPositionInput");
        var selectElementNumber = document.getElementById("famposition");
        var otherInputNumber = document.getElementById("otherPositionInputNumber");
        var otherInputNumberSis = document.getElementById("otherPositionInputNumberSis");

        var selectElementArea = document.getElementById("area");
        var otherInputArea = document.getElementById("areaInput");

        var selectElementMarried = document.getElementById("fammarried");
        var otherInputMarried = document.getElementById("married");

        // Toggle "otherInput" based on the value of "selectElement"
        selectElement.addEventListener("change", toggleOtherInput);
        toggleOtherInput(); // Call it initially to set the correct display
        function toggleOtherInput() {
            if (selectElement.value === "Others") {
                otherInput.style.display = "block";
            } else {
                otherInput.style.display = "none";
            }

            // Toggle "otherInputNumber" based on the value of "selectElementNumber"
            if (selectElementNumber.value === "Only Child") {
                otherInputNumber.style.display = "none";
            } else {
                otherInputNumber.style.display = "block";
            }

            if (selectElementNumber.value === "Only Child") {
                otherInputNumberSis.style.display = "none";
            } else {
                otherInputNumberSis.style.display = "block";
            }
        }


        selectElementArea.addEventListener("change", toggleOtherInputArea);
        toggleOtherInputArea();

        function toggleOtherInputArea() {
            if (selectElementArea.value === "Others") {
                otherInputArea.style.display = "block";
            } else {
                otherInputArea.style.display = "none";
            }
        }

        selectElementMarried.addEventListener("change", toggleOtherInputMarried);
        toggleOtherInputMarried();

        function toggleOtherInputMarried() {
            if (selectElementMarried.value === "Others") {
                otherInputMarried.style.display = "block";
            } else {
                otherInputMarried.style.display = "none";
            }
        }
    }




    var backButton = document.getElementById('backButton');

    backButton.addEventListener('click', function() {
        window.history.back();
    });
    </script>
    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.dropotron.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>