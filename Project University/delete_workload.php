<?php
include("db.php");

$getid = $_GET['deleteid'];
$sel = "DELETE FROM workload WHERE id = '$getid' ";
$result = mysqli_query($con, $sel);
    
    if($result) {
        header("location: workload.php");
}
else {
     echo("Error description: " . $con ->error);
}
?>