<?php
include "config.php";

$coursename = $_POST['course'];
$coursebelong = $_POST['coursebelong'];

if (!empty($coursename) || !empty($coursebelong)) {
    $sql = "INSERT INTO course (course_name, course_belong) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ss", $coursename, $coursebelong);
        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "Error";
        }
        $stmt->close();
    } else {
        echo "Error in preparing the SQL statement: " . $conn->error;
    }
} else {
    echo "All fields required";
}
?>