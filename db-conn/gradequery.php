<?php
include "config.php";

$studentId = $_POST['studentId'];
$coursecode = $_POST['course_code'];
$grade = $_POST['gradeInput'];

if (!empty($studentId) && !empty($coursecode) && !empty($grade)) {
    $sql = "INSERT INTO grade (id, course_code, grade) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("isd", $studentId, $coursecode, $grade);
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