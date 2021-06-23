<?php
include"db.php";
include"server.php";

$string = $_POST['string'];
$txtstud_id = $_POST['txtstud_id'];
$txtstud_name = $_POST['txtstud_name'];
$txtstud_email = $_POST['txtstud_email'];
$txtstud_by = $_SESSION['admin_name'];

if($txtstud_id == '' || $txtstud_name == '' || $txtstud_email == '') {
    echo "<p>Please fill in all the data</p>";
}else {
    $sql = "UPDATE student SET stud_id = '$txtstud_id', stud_name = '$txtstud_name', stud_email = '$txtstud_email', stud_by = '$txtstud_by', stud_on = now() WHERE id = '$string'";
    if (mysqli_query($con,$sql) == TRUE) {
        echo "Record Update Successfully";
    } else {
        echo "Error Updating Record: " . mysqli_connect_error;
    }
    mysqli_close($con);
    
} 
?>