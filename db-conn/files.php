<?php
include('config.php');

$category = $_POST['category'];
$adviser_ID = $_POST['adviserID'];
$file = $_FILES['file']['name'];
$files = $_FILES['file']['tmp_name'];
move_uploaded_file($files, "../grade_report/$file");

// Check if the form fields are not empty
if (!empty($category) && !empty($adviser_ID) && !empty($file)) {
    $SELECT = "SELECT id FROM files WHERE id = ? LIMIT 1";
    $INSERT = "INSERT INTO files (adviser_id, file_name, category) VALUES (?, ?, ?)";
    
    // Prepare statement
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $file);
    $stmt->execute();
    $stmt->bind_result($file);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    
    if ($rnum == 0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sss", $adviser_ID, $category, $file);
      $stmt->execute();
  
      echo "success"; // Return "success" for a successful upload.
  } else {
      echo "File upload failed. This file is already taken.";
  }
  
    $stmt->close();
    $conn->close();
} else {
    echo "All fields are required";
    die();
}
?>