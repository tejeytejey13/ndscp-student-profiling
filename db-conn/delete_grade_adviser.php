<?php
include('config.php');

if (isset($_GET['fileid'])) {
    $file_id = $_GET['fileid'];
    
    $query = "DELETE FROM files WHERE id = '$file_id'";
    $comm = mysqli_query($conn, $query);

    // Return a JSON response
    $response = ['success' => true]; // or ['success' => false] if the deletion failed
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    die();
}
?>