
<html>
   
   <head>
       <style>table {
       border-collapse: collapse;
       width: 100%;
       text-align: left;</style>
      <title>#List Of Subject# </title>
        <link rel="stylesheet" type="text/css" href="../programinfo/css/welcome_style.css">
   </head>
   
   <body>
       <h2 style="font-size : 30px;">Subject List</h2>
       <br>
       <div style="background-color : yellow ; font-size : 20px;">
        <table>
            <tr>
            <th>No.</th>
            <th>Student ID</th>
            <th>Course Name</th>
            </tr>
<?php
            include('session.php');
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "project";
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if ($conn -> connect_error){
    die ("Connection failed:". $conn-> connect_error);
}

$sqlfind1 = "SELECT * FROM databaseuser WHERE userid = '$id_session'";
$result1 = mysqli_query($conn,$sqlfind1) or die( mysqli_error($conn));
$row1 = mysqli_fetch_assoc($result1);

$newid = $row1['userid'];      

$sqlfind3 = "SELECT * FROM registercourse WHERE student_ID = '$newid' ";
$result = $conn->query($sqlfind3);

if (!empty($result) && $result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $id = $row["course_name"];
    echo "<tr><td>" . $row["id"].  "</td><td>" . $row["student_ID"]. "</td><td>" . $row["course_name"] ."</td><td> <a href='answer_quiztruefalse.php?modifyid=$id'>Answer Quiz True/False</a> | <a href='answer_quizmultiplechoice.php?modifyid=$id'>Answer Quiz Multiple Choice</a>" ." </td></tr>";
  }
    echo "</table>";
    echo "<br><br><center> <a href='resulttruefalse.php?modifyid=$newid'>View Result True/False Quiz</a> | <a href='resultmultiplechoice.php?modifyid=$newid'>View Result Multiple Choice Quiz</a></center>" ;
} else {
  echo "0 results";
}
$conn->close();
?>
    <br><br>
    <div style="align-content: center">
     
       </div>
    <br>
            <button style='font-size : 22px; text-align : center;'><a href = 'welcome_student.php'>Home</a></button>
           <br>
           <br>
    <footer style="font-size : 12px; text-align : center;"><i>University System</i>
    <br>
    UNIVERSITI TUN HUSSEIN ONN &copy 2020 </footer>
           </table>
       </div>
   </body>
   
</html>