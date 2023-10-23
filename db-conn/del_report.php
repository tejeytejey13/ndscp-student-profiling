<?php
include('config.php');

try {
    if (isset($_GET['id'])) {
        $reportId = $_GET['id'];

        $sql = "DELETE FROM report WHERE id = ?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param('i', $reportId);

        if ($stmt->execute()) {
            $affectedRows = $stmt->affected_rows;
            if ($affectedRows > 0) {
                echo '<script type="text/javascript"> alert("Successfully deleted the report with ID ' . $reportId . ' from the users table."); window.location.href = "../admin/report.php"; </script>';
            } else {
                echo '<script type="text/javascript"> alert("No rows were deleted."); window.location.href = "../admin/report.php"; </script>';
            }
        } else {
            throw new Exception("Error executing DELETE statement: " . $stmt->error);
        }
    } else {
        echo "Invalid request. Please provide a valid User ID.";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

$conn->close();
?>