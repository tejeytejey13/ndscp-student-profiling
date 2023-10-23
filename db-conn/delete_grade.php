<?php 
include('config.php');

$file_id = $_GET['id'];

if(isset($file_id)){
    $query = "DELETE FROM files WHERE id = '$file_id'";
    $comm = mysqli_query($conn, $query);
?>
<script>
window.location = '../admin/file.php';
</script>
<?php
} else {
    die();
}
