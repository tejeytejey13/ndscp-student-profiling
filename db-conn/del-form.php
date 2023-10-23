<?php
include('config.php');

if (isset($_GET['id'])) {
    $formId = $_GET['id'];

    $sql = "DELETE FROM fillup WHERE id = '$formId'";
    mysqli_query($conn, $sql) or die (mysqli_error());
?>
<script>
window.location = '../admin/student.php';
</script>
<?php
}
?>