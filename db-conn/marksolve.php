<?php 
include('config.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['id']) && isset($_POST['solve'])) {
        $ID = $_POST['id'];
        $solve = $_POST['solve'];

        $update_status = "UPDATE report SET solve = ? WHERE id = ?";
        $stmt = $conn->prepare($update_status);

        $stmt->bind_param("si", $solve, $ID);

        if ($stmt->execute()) {
            header('location: ../admin/report.php');
            exit();
        } else {
            echo "An error occurred while processing the form. Please try again later.";
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "All fields are required";
    }
} else {
    echo "Invalid request method";
}
?>
