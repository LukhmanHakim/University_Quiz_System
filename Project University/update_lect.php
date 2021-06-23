<?php
include"db.php";
include"server.php";

$string = $_POST['string'];
$txtlect_id = $_POST['txtlect_id'];
$txtlect_name = $_POST['txtlect_name'];
$txtlect_by = $_SESSION['admin_name'];

if($txtlect_id == '' || $txtlect_name == '') {
    echo "<p>Please fill in all the data</p>";
}else {
    $sql = "UPDATE lecturer SET lect_id = '$txtlect_id', lect_name = '$txtlect_name', lect_by = '$txtlect_by', lect_on = now() WHERE id = '$string'";
    if (mysqli_query($con,$sql) == TRUE) {
        echo "Record Update Successfully";
    } else {
        echo "Error Updating Record: " . mysqli_connect_error;
    }
    mysqli_close($con);
    
} 
?>