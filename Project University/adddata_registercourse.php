<html>
<head>
</head>
<body>
<?php
include('session.php');

$course = filter_input(INPUT_POST, 'coursename');

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

$sql = "INSERT INTO registercourse (student_ID,course_name)
values ('$id_session','$course')";
if ($conn->query($sql)){
echo "Data have been added!";
echo "<br><br><button style='font-size : 22px; text-align : center;'><a href = 'student_course_database.php'>Click Here To Go Back</a></button>";
}
else {
echo "Error: ".$sql."<br>". $conn->error;
echo "<br><br><button style='font-size : 22px; text-align : center;'><a href = 'student_course_database.php'>Click Here To Go Back</a></button>";
}
$conn->close();
}

?>
</body>
</html>