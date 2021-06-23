<?php
include"db.php";

$id = $_POST['string'];
$sql = "DELETE FROM subject WHERE id = '$id'";
$result = mysqli_query($con, $sql);
        
    if($result === TRUE) {
        echo "<p>Record Successfully Delete</p>";
    }else {
        echo "Error deleting record: " . mysqli_connect_error();
    }
?>