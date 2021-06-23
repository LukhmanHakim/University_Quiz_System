<?php
include"db.php";
include"server.php";

$txtsub_id = $_POST['txtsub_id'];
$txtsub_name = $_POST['txtsub_name'];
$txtsub_by = $_SESSION['admin_name'];

if($txtsub_id == '' || $txtsub_name == '') {
    echo "<p>Please fill in all the data</p>";
}else {
    $sql = "INSERT INTO subject (sub_id, sub_name, sub_by, sub_on) VALUES ('".$txtsub_id."', '".$txtsub_name."', '".$txtsub_by."', now())";
    $result = mysqli_query($con, $sql);
        
    if($result === TRUE) {
        echo "<p>New Record Created Successfully</p>";
    }else {
        echo "Error: " . $sql . "<br>" . mysqli_connect_error();
    }
    mysqli_close($con);
}
?>