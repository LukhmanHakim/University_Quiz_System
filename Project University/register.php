<html>
<head>
Register
</head>
<body>
<?php

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'psw');
$status = filter_input(INPUT_POST, 'status');
$userid = filter_input(INPUT_POST, 'userid');
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "project";

//Connect to database

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}

else {

$sql = "INSERT INTO databaseuser (username,password,status,userid)
values ('$username','$password','$status','$userid')";
if ($conn->query($sql)){
echo "You have been registered!";
echo "<br><br><button style='font-size : 22px; text-align : center;'><a href = 'index.html'>Click Here To Login</a></button>";
}
else {
echo "Error: ".$sql."<br>". $conn->error;
}
$conn->close();
}

?>
</body>
</html>