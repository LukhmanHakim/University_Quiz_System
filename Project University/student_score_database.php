
<html>
   
   <head>
       <style>table {
       border-collapse: collapse;
       width: 100%;
       text-align: left;</style>
      <title>Student Info </title>
        <link rel="stylesheet" type="text/css" href="../programinfo/css/welcome_style.css">
   </head>
   
   <body>
       <h2 style="font-size : 30px;">Student Info</h2>
       <br>
       <div style="background-color : cyan; font-size : 20px;">
        <table>
            <tr>
            <th>Student ID</th>
            <th>Course_ID</th>
            <th>Lab_Score</th>
            <th>Quiz1_Score</th>
            <th>Quiz2_Score</th>
            <th>Test1_Score</th>
            <th>Test2_Score</th>
            <th>Project_Score</th>
            <th>Final_Score</th></tr>
<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "project";
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if ($conn -> connect_error){
    die ("Connection failed:". $conn-> connect_error);
}

$sql = "SELECT Student_ID, Course_ID, Lab_Score, Quiz1_Score, Quiz2_score, Test1_Score, Test2_Score, Project_Score, Final,Score FROM studentscore";

$result = $conn->query($sql);

if (!empty($result) && $result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
    echo "<tr><td>" . $row["Student_ID"]. "</td><td>" . $row["Course ID"]. "</td><td> " . $row["Lab_Score"]. "</td><td>" . $row["Quiz1_Score"] . "</td><td>" . $row["Quiz2_Score"] . "</td><td>" . $row["Test1_Score"]  . "</td><td>" . $row["Test2_Score"] . "</td><td>" . $row["Project_Score"] . "</td><td>" . $row["Final_Score"] . "</td><td><a href='modified.php'>Modify</a> | <a href='delete.php'>Delete</a>". " </td></tr>";
  }
    echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>
            </div> <br>
           <button style='font-size : 22px; text-align : center;'><a href = 'welcome_student.php'>Home</a></button>
    <footer style="font-size : 12px; text-align : center;"><i>SYSTEM UNIVERSITY</i>
    <br>
    UNIVERSITI TUN HUSSEIN ONN &copy 2019 </footer>
       </div>

   </body>
   
</html>