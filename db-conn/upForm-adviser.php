<?php
include('config.php');

$fillupID = $_POST['id'];

$profile = $_FILES['profile']['name'];
$image = $_FILES['profile']['tmp_name'];
move_uploaded_file($image, "../student_pic/$profile");

$lname = $_POST['lname'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$course = $_POST['course'];
$schoolyear = $_POST['schoolyear'];
$lrn = $_POST['lrn'];
$placeofbirth = $_POST['placeofbirth'];
$birthofdate = $_POST['birthofdate'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$cnumber = $_POST['cnumber'];
$tongue = $_POST['tongue'];
$religion = $_POST['religion'];
$fatname = $_POST['fatname'];
$foccupation = $_POST['foccupation'];
$motname = $_POST['motname'];
$moccupation = $_POST['moccupation'];
$personalities = $_POST['personalities'];
$status = $_POST['status'];
$coe = $_POST['coe'];

if (
    !empty($profile) || !empty($lname) || !empty($fname) || !empty($mname) || !empty($course) ||
    !empty($schoolyear) || !empty($lrn) || !empty($placeofbirth) || !empty($birthofdate) ||
    !empty($age) || !empty($gender) || !empty($address) || !empty($cnumber) || !empty($tongue) ||
    !empty($religion) || !empty($fatname) || !empty($foccupation) || !empty($motname) ||
    !empty($moccupation) || !empty($personalities) || !empty($status) || !empty($coe)
) {
    $query = "UPDATE fillup SET 
    student_pic = '{$profile}',
    lname = '{$lname}',
    fname = '{$fname}',
    mname = '{$mname}',
    course = '{$course}',
    school_year = '{$schoolyear}',
    lrn = '{$lrn}',
    place_of_birth = '{$placeofbirth}',
    birth_of_date = '{$birthofdate}',
    age = '{$age}',
    gender = '{$gender}',
    address = '{$address}',
    contact_number = '{$cnumber}',
    mother_tongue = '{$tongue}',
    religion = '{$religion}',
    father_name = '{$fatname}',
    foccupation = '{$foccupation}',
    mother_name = '{$motname}',
    moccupation = '{$moccupation}',
    personalities = '{$personalities}',
    status = '{$status}',
    emergency = '{$coe}'
    WHERE id = '$fillupID'";

    mysqli_query($conn, $query) or die (mysqli_error());
?>
<script>
window.location = '../adviser/student.php';
</script>
<?php
}
?>