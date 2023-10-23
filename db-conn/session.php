<?php

if (!isset($_SESSION['id'])) {
   header("Location: index.php");
}else{
    $id = $_SESSION['id'];
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $lname = $_SESSION['mname'];
    $course = $_SESSION['course_belong'];
    
}