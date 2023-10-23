<?php

include('config.php');



$lname = $_POST['lname'];

$fname = $_POST['fname'];

$mname = $_POST['mname'];

$title = $_POST['title'];

$course = $_POST['course'];



$profile = $_FILES['profile']['name'];

$image = $_FILES['profile']['tmp_name'];

move_uploaded_file($image, "../profiles/$profile");



$uname = $_POST['uname'];

$password = $_POST['password'];



if (!empty($lname) || !empty($fname) || !empty($mname) || !empty($course) || !empty($title) || !empty($profile) || !empty($uname) || !empty($password) ) {



    $insert = "INSERT Into users (lname, fname, mname, course_belong, title,  profile, username, password, role, status) values (?, ?, ?, ?, ?, ?, ?, ?, 'adviser', 'pending')";

    $select = "SELECT username FROM users WHERE username = ? LIMIT 1";



    $stmt = $conn->prepare($select);

    $stmt->bind_param("s", $uname);

    $stmt->execute();

    $stmt->bind_result($uname);

    $stmt->store_result();

    $num = $stmt->num_rows;



    if ($num == 0) {

        $stmt->close();

        $stmt = $conn->prepare($insert);

        $stmt->bind_param("ssssssss", $lname, $fname, $mname, $course, $title, $profile, $uname, $password);

        $stmt->execute();

    

    echo "<script>if(confirm('Your Record Successfully Inserted. Now Login')){document.location.href='../login.php'};</script>";

    } else {

    echo '<script type="text/javascript"> alert("This Username is already exist"); window.location.href = "../signin.php";    </script>';

    }

    $stmt->close();

    $conn->close();



 } else {

    echo "All Field are required";

    die();

}



?>