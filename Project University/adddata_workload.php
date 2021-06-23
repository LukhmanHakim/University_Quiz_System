<html>
<head>
</head>
<body>
<?php

$lect = filter_input(INPUT_POST, 'lectname');
$sub = filter_input(INPUT_POST, 'subname');

include "db.php";

if (mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}

else {

$sql = "INSERT INTO workload (lecturer,subject)
values ('$lect','$sub')";
if ($con->query($sql)){
    header('location: workload.php');
}
else {
echo "Error: ".$sql."<br>". $con->error;
}
$con->close();
}

?>
</body>
</html>