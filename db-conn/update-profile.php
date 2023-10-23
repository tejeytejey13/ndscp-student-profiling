<?php
    include "config.php";

    session_start();

    $id = $_POST['userid'];
    $fname = $_POST['firstname'];
    $mname = $_POST['midname'];
    $lname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($_FILES['profile']['name'])) {
        $profile = $_FILES['profile']['name'];
        $image = $_FILES['profile']['tmp_name'];
        move_uploaded_file($image, "../profiles/$profile");
    } else {
        $profile = null;
    }

    $update = "UPDATE users SET 
    fname = '{$fname}', 
    mname = '{$mname}',
    lname = '{$lname}',
    profile = '{$profile}',
    username = '{$username}',
    password = '{$password}'";

    if($profile !== null){
        $update .= ", profile = '{$profile}'";
    }

    $update .=" WHERE id = $id ";
    mysqli_query($conn, $update);
    echo "<script>if(confirm('Your Record Sucessfully Updated.')){document.location.href='../admin/index.php'};</script>";
    ?>