<?php
include"db.php";
include"server.php";

$txtlect_id = $_POST['txtlect_id'];
$txtlect_name = $_POST['txtlect_name'];
$txtlect_by = $_SESSION['admin_name'];

if($txtlect_id == '' || $txtlect_name == '') {
    echo "<p>Please fill in all the data</p>";
}else {
    $sql = "INSERT INTO lecturer (lect_id, lect_name, lect_by, lect_on) VALUES ('".$txtlect_id."', '".$txtlect_name."', '".$txtlect_by."', now())";
    $result = mysqli_query($con, $sql);
        
    if($result === TRUE) {
        echo "<p>New Record Created Successfully</p>";
    }else {
        echo "Error: " . $sql . "<br>" . mysqli_connect_error();
    }
    mysqli_close($con);
}
?>