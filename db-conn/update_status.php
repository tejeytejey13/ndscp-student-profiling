<?php

include('config.php');

$adviserid = $_POST['adviserID'];
$status = $_POST['status'];

if(isset($adviserid)){
    $query = "UPDATE users SET status = '$status' WHERE id = '$adviserid'";
    $run = mysqli_query($conn, $query);
?>
<script>
window.location = '../admin/adviser.php';   
</script>
<?php 
} else {
    die();
}
?>