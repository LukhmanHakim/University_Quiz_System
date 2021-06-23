<?php
include"db.php";

$txtadmin_id = $_POST['txtadmin_id'];
$txtadmin_name = $_POST['txtadmin_name'];

if($txtadmin_id == '' || $txtadmin_name == '') {
    echo "<p>Please fill in all the data</p>";
}else {
    $sql = "INSERT INTO admin (admin_id, admin_name) VALUES ('".$txtadmin_id."', '".$txtadmin_name."')";
    $result = mysqli_query($con, $sql);
        
    if($result === TRUE) {
        echo "<p>New Record Created Successfully</p>";
    }else {
        echo "Error: " . $sql . "<br>" . mysqli_connect_error();
    }
    mysqli_close($con);
}
?>