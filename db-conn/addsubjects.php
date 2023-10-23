<?php 

include "config.php";

$course_id = $_POST['course_id'];
$course_code = $_POST['course_code'];
$course_des = $_POST['course_description'];
$units = $_POST['units'];
$prereq = $_POST['prereq'];
$semester = $_POST['semester'];
$year = $_POST['year'];

if (!empty($course_id) || !empty($course_code) || !empty($course_des) || !empty($units) || !empty($semester) || empty($prereq) || empty(year)) {
    $sql = "INSERT INTO subjects (course_id, course_code, course_description, units, prerequisite, semester, year) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("issisii", $course_id, $course_code, $course_des, $units, $prereq, $semester, $year);
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
    echo "Some fields required exept for year and prerequisite";
}
?>