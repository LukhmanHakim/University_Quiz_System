<?php
include"db.php";

$string = $_POST['string'];
$txtadmin_id = $_POST['txtadmin_id'];
$txtadmin_name = $_POST['txtadmin_name'];

if($txtadmin_id == '' || $txtadmin_name == '') {
    echo "<p>Please fill in all the data</p>";
}else {
    $sql = "UPDATE admin SET admin_id = '$txtadmin_id', admin_name = '$txtadmin_name' WHERE id = '$string'";
    if (mysqli_query($con,$sql) == TRUE) {
        echo "Record Update Successfully";
    } else {
        echo "Error Updating Record: " . mysqli_connect_error;
    }
    mysqli_close($con);
    
} 
?>