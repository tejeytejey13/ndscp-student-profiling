<?php
include "config.php";

if (isset($_POST['studentId'], $_POST['newCourse'])) {
    $studentId = $_POST['studentId'];
    $newCourse = $_POST['newCourse'];

    $update = "UPDATE fillup SET course_name = ? WHERE id = ?";

    // Create a prepared statement
    $stmt = $conn->prepare($update);

    if ($stmt) {
        $stmt->bind_param("si", $newCourse, $studentId);

        if ($stmt->execute()) {
            echo "Course updated successfully.";
        } else {
            echo "Error updating course: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}
?>