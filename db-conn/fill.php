<?php
include('config.php');

$profile = $_FILES['profile']['name'];
$image = $_FILES['profile']['tmp_name'];
move_uploaded_file($image, "../student_pic/$profile");

$course = $_POST['course'];
// $semester = $_POST['semester'];
$lrn = $_POST['lrn'];
$lname = $_POST['lname'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$address = $_POST['address'];
$provaddress = $_POST['provaddress'];
$cnumber = $_POST['cnumber'];
$birthofdate = $_POST['birthofdate'];
$placeofbirth = $_POST['placeofbirth'];
$nationality = $_POST['nationality'];
$religion = $_POST['religion'];
$baptized = $_POST['baptized'];
$confirmed = $_POST['confirmed'];
$communion = $_POST['communion'];
$familyposition = $_POST['familyposition'];
$numofbro = $_POST['numofbro'];
$numofsis = $_POST['numofsis'];
$areapplicant = $_POST['areapplicant'];
$coe = $_POST['coe'];
$emergencynumber = $_POST['emergencynumber'];
$fatname = $_POST['fatname'];
$foccupation = $_POST['foccupation'];
$feducattain = $_POST['feducattain'];
$fschool = $_POST['fschool'];
$fbirth = $_POST['fbirth'];
$fbusiness = $_POST['fbusiness'];
$fcontact = $_POST['fcontact'];
$motname = $_POST['motname'];
$moccupation = $_POST['moccupation'];
$meducattain = $_POST['meducattain'];
$mschool = $_POST['mschool'];
$mbirth = $_POST['mbirth'];
$mbusiness = $_POST['mbusiness'];
$mcontact = $_POST['mcontact'];
$married = $_POST['married'];
$parents = $_POST['parents'];
$income = $_POST['income'];
$nameofbroandsis = $_POST['nameofbroandsis'];
$gradeschool = $_POST['gradeschool'];
$highschool = $_POST['highschool'];
$college = $_POST['college'];
$gender = $_POST['gender'];
$honor = $_POST['honor'];
$club = $_POST['club'];
$poshled = $_POST['posheld'];
$famothers = $_POST['famothers'];
$areaothers = $_POST['areaothers'];
$marriedothers = $_POST['marriedothers'];
if (
   !empty($profile) ||  !empty($lrn) || !empty($lname) || !empty($fname) || !empty($mname) || !empty($course) ||
   !empty($address) || !empty($provaddress) || !empty($cnumber) || !empty($birthofdate) ||
   !empty($placeofbirth) || !empty($nationality) || !empty($religion) ||
   !empty($baptized) || !empty($confirmed) || !empty($communion) || !empty($familyposition) ||
   !empty($numofbro) || !empty($numofsis) || !empty($areapplicant) || !empty($coe) || !empty($emergencynumber) ||
   !empty($fatname) || !empty($foccupation) || !empty($feducattain) || !empty($fschool) || !empty($fbirth) ||
   !empty($fbusiness) || !empty($fcontact) || !empty($motname) || !empty($moccupation) || !empty($meducattain) ||
   !empty($mschool) || !empty($mbirth) || !empty($mbusiness) || !empty($mcontact) || !empty($married) ||
   !empty($parents) || !empty($income) || !empty($nameofbroandsis) || !empty($gradeschool) ||
   !empty($highschool) || !empty($college) || !empty($gender) || !empty($honor) || !empty($club) || !empty($poshled) || !empty($famothers) || !empty($areaothers) || !empty($marriedothers)

) {

    $checkDuplicateQuery = "SELECT COUNT(*) AS count FROM fillup WHERE lname = ? AND mname = ? AND fname = ?";
    $stmt = $conn->prepare($checkDuplicateQuery);
    $stmt->bind_param("sss", $lname, $mname, $fname);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $count = $row['count'];

    if ($count > 0) {
        // A record with the same lname, mname, and fname already exists
        echo '<script type="text/javascript"> alert("A name '.$fname.' '.$mname.' '.$lname.' already exists."); window.location.href = "../fill-up.php"; </script>';
    } else {
       
        $sql = "INSERT INTO fillup (student_pic, lrn, lname, fname, mname, course_name, address, provaddress,
        contact_number, birth_of_date, place_of_birth, nationality, religion, baptized, confirmed, communion, 
        familyposition, numofbro, numofsis, areapplicant, coe, emergencynumber, father_name, foccupation, feducattain,
        fschool, fbirth, fbusiness, fcontact, mother_name, moccupation, meducattain, mschool, mbirth, mbusiness, 
        mcontact, married, parents, income, nameofbroandsis, gradeschool, highschool, college, gender, honor, club, posheld, famothers, areaothers, marriedothers, status
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Enrolled')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "ssssssssssssssssssssssssssssssssssssssssssssssssss",
            $profile, $lrn, $lname, $fname, $mname, $course, $address, $provaddress, $cnumber, $birthofdate,
            $placeofbirth, $nationality, $religion, $baptized, $confirmed, $communion, $familyposition, $numofbro,
            $numofsis, $areapplicant, $coe, $emergencynumber, $fatname, $foccupation, $feducattain, $fschool, $fbirth,
            $fbusiness, $fcontact, $motname, $moccupation, $meducattain, $mschool, $mbirth, $mbusiness, $mcontact,
            $married, $parents, $income, $nameofbroandsis, $gradeschool, $highschool, $college, $gender, $honor, $club, $poshled, $famothers, $areaothers, $marriedothers
        );

        if ($stmt->execute()) {
            echo "<script>if(confirm('Your Form Successfully Recorded')){document.location.href='../index.php'};</script>";
        } else {
            echo '<script type="text/javascript"> alert("An error occurred while processing the form. Please try again later."); window.location.href = "../fill-up.php"; </script>';
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

} else {
    echo "All fields are required";
    die();
}
?>