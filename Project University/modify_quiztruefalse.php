<?php
include("connect.php");

$getid = $_GET['modifyid'];
$sql = "SELECT * FROM quiztruefalse WHERE id = '$getid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$id = $row['id'];
$lect = $row['lect_name'];
$name = $row['Course_Name'];
$question = $row['question'];
$answer = $row['realanswer'];

if(isset($_POST['updateedit'])) {
    $upid = $_POST['upid'];
    $uplect = $_POST['uplect'];
    $upname = $_POST['upcourse'];
    $upquestion = $_POST['upquestion'];
    $upanswer = $_POST['upanswer'];
  
    $sqledit = "UPDATE quiztruefalse SET lect_name= '$uplect', Course_Name = '$upname', question = '$upquestion', realanswer = '$upanswer' WHERE id = '$upid'";
    $result = mysqli_query($conn, $sqledit);
    header("location: subject_list.php");
}

?>



<html>
<head>
  <link rel="stylesheet" type="text/css" href="../programinfo/css/welcome_style.css">
<title>Modify</title>
</head>
<body>

    <form method="post" action="">
    <input type="text" name="upid" value="<?php echo $id; ?>"><br><br>    
    <input type="text" name="uplect" value="<?php echo $lect; ?>"><br><br>
    <input type="text" name="upcourse" value="<?php echo $name; ?>"><br><br>
    <input type="text" name="upquestion" value="<?php echo $question; ?>"><br><br>
    <input type="text" name="upanswer" value="<?php echo $answer; ?>"><br><br>
    <input type="submit" name="updateedit" value="Update">
    </form>
</body>    
</html>