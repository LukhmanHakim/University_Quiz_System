<?php
include"db.php";
include"server.php";

$string = $_POST['string'];
$txtsub_id = $_POST['txtsub_id'];
$txtsub_name = $_POST['txtsub_name'];
$txtsub_by = $_SESSION['admin_name'];

if($txtsub_id == '' || $txtsub_name == '') {
    echo "<p>Please fill in all the data</p>";
}else {
    $sql = "UPDATE subject SET sub_id = '$txtsub_id', sub_name = '$txtsub_name', sub_by = '$txtsub_by', sub_on = now() WHERE id = '$string'";
    if (mysqli_query($con,$sql) == TRUE) {
        echo "Record Update Successfully";
    } else {
        echo "Error Updating Record: " . mysqli_connect_error;
    }
    mysqli_close($con);
    
} 
?>