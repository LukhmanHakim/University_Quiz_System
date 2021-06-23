

<?php
include("connect.php");

$getid = $_GET['deleteid'];
$sel = "DELETE FROM quizmultiplechoice WHERE id = '$getid' ";
$result = mysqli_query($conn, $sel);
    
    if($result) {
        header("location: subject_list.php");
}
else {
     echo("Error description: " . $conn ->error);
}
?>