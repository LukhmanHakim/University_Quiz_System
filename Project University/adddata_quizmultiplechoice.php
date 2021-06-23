<html>
<head>
</head>
<body>
<?php

$lect = filter_input(INPUT_POST, 'lecturer');
$course = filter_input(INPUT_POST, 'course');
$question = filter_input(INPUT_POST, 'question');
$answer = filter_input(INPUT_POST, 'answer');
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

$sql = "INSERT INTO quizmultiplechoice (lect_name,course_name,question,realanswer)
values ('$lect','$course','$question','$answer')";
if ($conn->query($sql)){
echo "Data have been added!";
echo "<br><br><button style='font-size : 22px; text-align : center;'><a href = 'subject_list.php'>Click Here To Go Back</a></button>";
}
else {
echo "Error: ".$sql."<br>". $conn->error;
}
$conn->close();
}

?>
</body>
</html>