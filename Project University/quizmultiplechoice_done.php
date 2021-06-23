<html>
<head>
</head>
<body>
<?php

include('session.php');
$var=$_GET['getid'];
$course=$_GET['getcourse'];
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
$marks = 0;
$sqlcheck = "SELECT * FROM quizmultiplechoice WHERE Course_Name = '$course'";
$result = mysqli_query($conn,$sqlcheck) or die( mysqli_error($conn));


if (!empty($result) && $result->num_rows > 0) {
$var3=1;
while($row = $result->fetch_assoc()) {

    ${"row_$var3"}=$row['realanswer'];
    $var3=$var3+1;

}
    for($i = 1; $i <= $var; $i++){
        $answer = $_POST['answer_' . $i];
        $truth = ${'row_' . $i};
        
        if ($answer == $truth){
            $marks = $marks+1;
        }
      
        }
        
    }
}
$sql = "UPDATE student_multiplechoice_marks SET marks = $marks WHERE course_name='$course'";
if ($conn->query($sql)){
echo "Quiz Done!";
echo "<br><br><button style='font-size : 22px; text-align : center;'><a href = 'welcome_student.php'>Click Here To Go Back</a></button>";
}
else {
echo "Error: ".$sql."<br>". $conn->error;
echo "<br><br><button style='font-size : 22px; text-align : center;'><a href = 'welcome_student.php'>Click Here To Go Back</a></button>";
}
$conn->close();


?>
</body>
</html>