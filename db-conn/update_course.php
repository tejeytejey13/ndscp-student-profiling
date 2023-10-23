<?php
include('config.php');

$studentId = $_POST['studentId'];
$newCourse = $_POST['newCourse'];

$sql = "UPDATE fillup SET course_name = ? WHERE id = ?";
$stmt = mysqli_query($sql);

if ($stmt) {
    $stmt->bind_param("si", $newCourse, $studentId);
    if ($stmt->execute()) {
        $response = [
            'success' => true,
            'message' => 'Course updated successfully.'
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Failed to update course.'
        ];
    }
    $stmt->close();
} else {
    $response = [
        'success' => false,
        'message' => 'Database error: ' . $conn->error
    ];
}

header('Content-Type: application/json');
echo json_encode($response);
?>
