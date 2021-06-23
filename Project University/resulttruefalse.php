
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
       <h2 style="font-size : 30px;">Your result for True/False quiz section</h2>
       <br>
       <div style="background-color : cyan; font-size : 20px;">
        <table>
            <tr>
            <th>No.</th>
            <th>Subject</th>
            <th>Marks</th>
            </tr>
<?php
$newid = $_GET['modifyid'];
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "project";
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if ($conn -> connect_error){
    die ("Connection failed:". $conn-> connect_error);
}

$sql = "SELECT * FROM student_quiztruefalse_marks WHERE student_ID = '$newid'";

$result = $conn->query($sql);

if (!empty($result) && $result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $id = $row["id"];
    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["course_name"]. "</td><td>" . $row["marks"] . " </td></tr>";
  }
    echo "</table>";
} else {
  echo "0 results";
  echo "Error: ".$sql."<br>". $conn->error;
}
$conn->close();
?>
    <br><br>
    <div style="align-content: center">
       </div>
    <br>
           <br>
           <br>
            <button style='font-size : 22px; text-align : center;'><a href = 'welcome_student.php'>Home</a></button>
    <footer style="font-size : 12px; text-align : center;"><i>SYSTEM University</i>
    <br>
    UNIVERSITI TUN HUSSEIN ONN &copy 2020 </footer>
           </table>
       </div>
   </body>
   
</html>