<?php
session_start();
include('config.php');

$uname = $_POST['username'];
$password = $_POST['password'];

// Prepare the query using prepared statements to prevent SQL injection
$select = "SELECT * FROM users WHERE username = ? AND password = ?";
$stmt = mysqli_prepare($conn, $select);
mysqli_stmt_bind_param($stmt, "ss", $uname, $password);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$num = mysqli_num_rows($result);
$role = mysqli_fetch_assoc($result);

if ($num == 1) {
    if ($role['role'] == 'adviser' && $role['status'] == 'approved') {
        $_SESSION['id'] = $role['id'];
        $_SESSION['fname'] = $role['fname'];
        $_SESSION['lname'] = $role['lname'];
        $_SESSION['course_belong'] = $role['course_belong'];

        header('location:../adviser/index.php');
        exit();
    } else if ($role['role'] == 'adviser' && $role['status'] == 'pending') {
        $_SESSION['id'] = $role['id'];
        $_SESSION['fname'] = $role['fname'];
        $_SESSION['lname'] = $role['lname'];
        $_SESSION['course_belong'] = $role['course_belong'];
        
        header('location:../adviser/pending-index.php');
        exit();
    } else if ($role['role'] == 'admin') {
        header('location:../admin/index.php');
        $_SESSION['id'] = $role['id'];
        $_SESSION['fname'] = $role['fname'];
        $_SESSION['lname'] = $role['lname'];
        $_SESSION['course_belong'] = $role['course_belong'];
        exit();
    } else {
        die();
    }
} else {
    echo '<script type="text/javascript"> alert("Wrong Credentials\n Try Again"); window.location.href = "../login.php"; </script>';
    exit();
}
?>