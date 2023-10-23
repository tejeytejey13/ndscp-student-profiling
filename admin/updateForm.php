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
    $fullname = $fname.' '.$mname.' '.$lname;
    $course = $row['course_name'];
    $lrn = $row['lrn'];
    $place = $row['place_of_birth'];
    $birth = $row['birth_of_date'];
    $gender = $row['gender'];
    $address = $row['address'];
    $contact = $row['contact_number'];
    $religion = $row['religion'];
    $nationality = $row['nationality'];
    $baptized = $row['baptized'];
    $confirmed = $row['confirmed'];
    $communion = $row['communion'];
    $famposition = $row['familyposition'];
    $numofbro = $row['numofbro'];
    $numofis = $row['numofsis'];
    $areapplicant = $row['areapplicant'];
    $coe = $row['coe'];
    $emergency = $row['emergencynumber'];
    $fathername = $row['father_name'];
    $foccupation = $row['foccupation'];
    $feducattain = $row['feducattain'];
    $fschool = $row['fschool'];
    $fbirth = $row['fbirth'];
    $fbusiness = $row['fbusiness'];
    $fcontact = $row['fcontact'];
    $mothername = $row['mother_name'];
    $moccupation = $row['moccupation'];
    $meducattain = $row['meducattain'];
    $mschool = $row['mschool'];
    $mbirth = $row['mbirth'];
    $mbusiness = $row['mbusiness'];
    $mcontact = $row['mcontact'];
    $married = $row['married'];
    $parents = $row['parents'];
    $income = $row['income'];
    $nameofbroandsis = $row['nameofbroandsis'];
    $gradeschool = $row['gradeschool'];
    $highschool = $row['highschool'];
    $college = $row['college'];

    $honor = $row['honor'];
    $posheld = $row['posheld'];
    $club = $row['club'];
    $famothers = $row['famothers'];
    $areaothers = $row['areaothers'];
    $marriedothers = $row['marriedothers'];

    $birthDate = new DateTime($birth);
    $currentDate = new DateTime();
    $age = $currentDate->diff($birthDate)->y;
   }
?>
<link href="css/studentinfo.css" rel="stylesheet" />
<link href="css/studinfo.css" rel="stylesheet" />

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-6">
                <h1 class="mt" id="printContent">Dashboard</h1>
                <ol class="breadcrumb mb" id="printContent">
                    <li class="breadcrumb-item active"><?php echo ucFirst($fname) ?> | Information</li>
                </ol>
                <button class="btn btn-primary print" id="printButton">Print Information</button>

                <?php require "cumulative.php" ?>
                <br><br><br><br><br><br><br>
                <div class="container-info">
                    <br><br><br>
                    <div class="info-div">
                        <h5>I. PERSONAL</h5>
                        <div class="form-group-info-lrn" id="lrn">
                            <label for="">LRN </label>
                            <input type="text" value="<?php echo $lrn ?>" readonly class="form-control-info">
                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Name </label>
                                    <input type="text" value="<?php echo $fullname ?>" readonly
                                        class="form-control-info">
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Course </label>
                                    <input type="text" value="<?php echo $course ?>" readonly class="form-control-info">
                                </div>
                            </div>
                            <!-- <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Semester  </label>
                                    <input type="text" value="" class="form-control-info">
                                </div>
                            </div> -->
                        </div>

                        <div class="row flex">
                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Date of Birth </label>
                                    <input type="text" value="<?php echo date('F j, Y', strtotime($birth)) ?>" readonly
                                        class="form-control-info">
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Age </label>
                                    <input type="text" value="<?php echo $age ?>" readonly class="form-control-info">
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Gender </label>
                                    <input type="text" value="<?php echo $gender ?>" readonly class="form-control-info">
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Contact No </label>
                                    <input type="text" value="<?php echo $contact ?>" readonly
                                        class="form-control-info">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Place of Birth </label>
                                    <input type="text" value="<?php echo $place ?>" readonly class="form-control-info">
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Address </label>
                                    <input type="text" value="<?php echo $address ?>" readonly
                                        class="form-control-info">
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group-info">
                                    <label for="">Nationality </label>
                                    <input type="text" value="<?php echo $nationality ?>" readonly
                                        class="form-control-info">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group-info">
                                    <label for="">Religion </label>
                                    <input type="text" value="<?php echo $religion ?>" readonly
                                        class="form-control-info">
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group-info">
                                    <label for="">Baptized </label>
                                    <input type="text" value="<?php echo $baptized ?>" readonly
                                        class="form-control-info">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group-info">
                                    <label for="">Confirmed </label>
                                    <input type="text" value="<?php echo $confirmed ?>" readonly
                                        class="form-control-info">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group-info">
                                    <label for="">Communion </label>
                                    <input type="text" value="<?php echo $communion ?>" readonly
                                        class="form-control-info">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Family Position </label>
                                    <input type="text" value="<?php echo $famposition ?> <?php echo $famothers ?>"
                                        readonly class="form-control-info">
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">No. of Brother </label>
                                    <input type="text" value="<?php echo $numofbro?>" readonly
                                        class="form-control-info">
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">No. of Sister </label>
                                    <input type="text" value="<?php echo $numofis ?>" readonly
                                        class="form-control-info">
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Area Applicant </label>
                                    <input type="text" value="<?php echo $areapplicant ?> <?php echo $areaothers ?>"
                                        readonly class="form-control-info">
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Contact for Emergency </label>
                                    <input type="text" value="<?php echo $coe ?>" readonly class="form-control-info">
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Contact No. of Emergency </label>
                                    <input type="text" value="<?php echo $emergency ?>" readonly
                                        class="form-control-info">
                                </div>
                            </div>
                        </div>
                        <h5>II. FAMILY</h5>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Father Name </label>
                                    <input type="text" value="<?php echo $fathername ?>" readonly
                                        class="form-control-info">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Father Education Attainment </label>
                                    <input type="text" value="<?php echo $feducattain ?>" readonly
                                        class="form-control-info">
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Father School Attainment </label>
                                    <input type="text" value="<?php echo $fschool ?>" readonly
                                        class="form-control-info">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Father Birth </label>
                                    <input type="text" value="<?php echo $fbirth ?>" readonly class="form-control-info">
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Father Business </label>
                                    <input type="text" value="<?php echo $fbusiness ?>" readonly
                                        class="form-control-info">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Father Occupation </label>
                                    <input type="text" value="<?php echo $foccupation ?>" readonly
                                        class="form-control-info">
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Father Contact </label>
                                    <input type="text" value="<?php echo $fcontact ?>" readonly
                                        class="form-control-info">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Mother Name </label>
                                    <input type="text" value="<?php echo $mname ?>" readonly class="form-control-info">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Mother Occupation </label>
                                    <input type="text" value="<?php echo $moccupation ?>" readonly
                                        class="form-control-info">
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Mother Education Attainment </label>
                                    <input type="text" value="<?php echo $meducattain ?>" readonly
                                        class="form-control-info">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Mother School Attainment </label>
                                    <input type="text" value="<?php echo $mschool ?>" readonly
                                        class="form-control-info">
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Mother Birth </label>
                                    <input type="text" value="<?php echo $mbirth ?>" readonly class="form-control-info">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Mother Business </label>
                                    <input type="text" value="<?php echo $mbusiness ?>" readonly
                                        class="form-control-info">
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Mother Contact </label>
                                    <input type="text" value="<?php echo $mcontact ?>" readonly
                                        class="form-control-info">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Married </label>
                                    <input type="text" value="<?php echo $married ?> <?php echo $marriedothers ?>"
                                        readonly class="form-control-info">
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Parents </label>
                                    <input type="text" value="<?php echo $parents ?>" readonly
                                        class="form-control-info">
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Income </label>
                                    <input type="text" value="<?php echo $income ?>" readonly class="form-control-info">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Name of Siblings </label>
                                    <input type="text" value="<?php echo $nameofbroandsis ?>" readonly
                                        class="form-control-info">
                                </div>
                            </div>
                        </div>
                        <h5>III. EDUCATIONAL </h5>
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">Grade School </label>
                                    <input type="text" value="<?php echo $gradeschool ?>" readonly
                                        class="form-control-info">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group-info">
                                    <label for="">High School </label>
                                    <input type="text" value="<?php echo $highschool ?>" readonly
                                        class="form-control-info">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="form-group-info">
                                <label for="">College </label>
                                <input type="text" value="<?php echo $college ?>" readonly class="form-control-info">
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="form-group-info">
                                <label for="">Honor or Prizes and for what? </label>
                                <input type="text" value="<?php echo $honor ?>" readonly class="form-control-info">
                            </div>
                        </div>


                        <div class="col-sm">
                            <div class="form-group-info">
                                <label for="">Organizational / Club in or out school </label>
                                <input type="text" value="<?php echo $club ?>" readonly class="form-control-info">
                            </div>
                        </div>


                        <div class="col-sm">
                            <div class="form-group-info">
                                <label for="">Position/s Held </label>
                                <input type="text" value="<?php echo $posheld ?>" readonly class="form-control-info">
                            </div>
                        </div>
                    </div>
                </div>
                <br><br><br><br><br><br><br>

                <?php require "bottomform.php" ?>
            </div>
        </main>

    </div>
</div>

<script>
// JavaScript to handle the print button click event
document.getElementById("printButton").addEventListener("click", function() {
    window.print(); // Opens the browser's print dialog
});
</script>

<?php
    require('assets/component/script.php');
?>