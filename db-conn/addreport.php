<?php
include('config.php');

//Name sa mga forms
$place = $_POST['place'];
$date = $_POST['date'];
$time = $_POST['time'];
$reason = $_POST['reason'];
$pername = $_POST['pername'];
$witname = $_POST['witname'];
$reportby = $_POST['reportby'];


if (
    // Ang code i check sa niya if ang mga variables are not empty if kani mga variables kay dili empty,
    // mag proceed na siya mag insert/store data sa database table
    !empty($place) || !empty($date) || !empty($time) || !empty($reason) || !empty($pername) ||
    !empty($witname) || !empty($reportby)
) {
    //then mao ni ang condition or query sa pag store(which is kabalo naman ka ani).
    $sql = "INSERT INTO report (place, date, time, reason, person_name, witness_name, reportby, solve) VALUES (?, ?, ?, ?, ?, ?, ?, 'pending')";
    //kani naman para lang ma secure nga execute ang sql query
    $stmt = $conn->prepare($sql);
    //Kaning bind_param  kay i bind niya ang mga values nga "?" and i identify niya kung string or integer para ma store siya.
    $stmt->bind_param(
        "sssssss",
        $place, $date, $time, $reason, $pername, $witname, $reportby
    );
    //then kani if the execution kay successful mag pop up ang javascript confimation then kanang document.location.href='../adviser/index.php i change lang nimo 
    // kung aha nimo gust siya ma redirect pag confirm the nang else kabalo naman ka ana.
    if ($stmt->execute()) {
        echo "<script>if(confirm('Your Report Successfully Recorded')){document.location.href='../adviser/index.php'};</script>";
    } else {
        echo '<script type="text/javascript"> alert("An error occurred while processing the form. Please try again later."); window.location.href = "../adviser/report.php"; </script>';
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "All fields are required";
    die();
}
?>