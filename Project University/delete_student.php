

<?php
include("connect.php");

$getid = $_GET['deleteid'];
$sel = "DELETE FROM studentinfo WHERE id = '$getid' ";
$result = mysqli_query($conn, $sel);
    
    if($result) {
        header("location: student_info_database.php");
}
else {
     echo("Error description: " . $conn ->error);
}
?>