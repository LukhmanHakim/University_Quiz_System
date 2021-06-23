
<html>
   
   <head>
       <style>table {
       border-collapse: collapse;
       width: 100%;
       text-align: left;</style>
      <title>Result</title>
        <link rel="stylesheet" type="text/css" href="../programinfo/css/welcome_style.css">
   </head>
   
   <body>
       <h2 style="font-size : 30px;">Your result for Multiple Choice quiz section</h2>
       <br>
       <div style="background-color : cyan; font-size : 20px;">
        <table>
            <tr>
            <th>No.</th>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Marks</th>
            </tr>
<?php
include ('session.php');
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "project";
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if ($conn -> connect_error){
    die ("Connection failed:". $conn-> connect_error);
}
$sqlfind1 = "SELECT * FROM databaseuser WHERE userid='$id_session'";
$result1 = mysqli_query($conn,$sqlfind1);
$row1 = mysqli_fetch_assoc($result1);
$newid = $row1['userid'];
            
$sqlfind2 = "SELECT * FROM lecturerinfo WHERE Lect_ID='$newid'";
$result2 = mysqli_query($conn,$sqlfind2);
$row2 = mysqli_fetch_assoc($result2);
$newid2 = $row2['Lect_Name'];

$sqlfind3 = "SELECT * FROM workload WHERE lect_name='$newid2'";
$result3 = mysqli_query($conn,$sqlfind3);
if (!empty($result2) && $result3->num_rows > 0) {
$var=1;
while($row3 = $result3->fetch_assoc()) {
    $id = $row3['course_name'];
$sql = "SELECT * FROM student_quiztruefalse_marks WHERE course_name = '$id'";
   }   

$result = $conn->query($sql);

if (!empty($result) && $result->num_rows > 0) {
    $var2 =0;
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $var2 =$var2+1;
    $id = $row["id"];
    echo "<tr><td>" . $var2. "</td><td>" . $row["student_ID"]. "</td><td>" . $row["student_name"]."</td><td>" . $row["marks"] . " </td></tr>";
  }
    echo "</table>";
} else {
  echo "0 results";
  echo "Error: ".$sql."<br>". $conn->error;
}

}
$conn->close();
?>
    <br><br>
    <div style="align-content: center">
       </div>
    <br>
           <br>
           <br>
            <button style='font-size : 22px; text-align : center;'><a href = 'welcome_lecturer.php'>Home</a></button>
    <footer style="font-size : 12px; text-align : center;"><i>SYSTEM UNIVERSITY</i>
    <br>
    UNIVERSITI TUN HUSSEIN ONN &copy 2020 </footer>
           </table>
       </div>
   </body>
   
</html>