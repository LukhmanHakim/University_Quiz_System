<?php
include"db.php";
include"server.php";

$txtstud_id = $_POST['txtstud_id'];
$txtstud_name = $_POST['txtstud_name'];
$txtstud_email = $_POST['txtstud_email'];
$txtstud_by = $_SESSION['admin_name'];

if($txtstud_id == '' || $txtstud_name == '' || $txtstud_email == '') {
    echo "<p>Please fill in all the data</p>";
}else {
    $sql = "INSERT INTO student (stud_id, stud_name, stud_email, stud_by, stud_on) VALUES ('".$txtstud_id."', '".$txtstud_name."', '".$txtstud_email."', '".$txtstud_by."', now())";
    $result = mysqli_query($con, $sql);
        
    if($result === TRUE) {
        echo "<p>New Record Created Successfully</p>";
    }else {
        echo "Error: " . $sql . "<br>" . mysqli_connect_error();
    }
    mysqli_close($con);
}
?>