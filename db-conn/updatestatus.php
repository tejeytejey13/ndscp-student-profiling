<?php
include "config.php";

if (isset($_POST['studentId'], $_POST['newStatus'])) {
    $studentId = $_POST['studentId'];
    $newStatus = $_POST['newStatus'];

    $update = "UPDATE fillup SET status = ? WHERE id = ?";

    // Create a prepared statement
    $stmt = $conn->prepare($update);

    if ($stmt) {
        $stmt->bind_param("si", $newStatus, $studentId);

        if ($stmt->execute()) {
            echo "Status updated successfully.";
        } else {
            echo "Error updating status: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}
?>