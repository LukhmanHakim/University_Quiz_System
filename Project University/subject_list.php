
<html>
   
   <head>
       <style>table {
       border-collapse: collapse;
       width: 100%;
       text-align: left;</style>
      <title>Subject List </title>
        <link rel="stylesheet" type="text/css" href="../programinfo/css/welcome_style.css">
   </head>
   
   <body>
       <h2 style="font-size : 30px;">Subject List</h2>
       <br>
       <div style="background-color : cyan; font-size : 20px;">
        <table>
            <tr>
            <th>No.</th>
            <th>Lect Name</th>
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
$sqlfind2 = "SELECT * FROM lecturerinfo WHERE Lect_ID = '$newid' ";
$result2 = mysqli_query($conn,$sqlfind2) or die( mysqli_error($conn));
$row2 = mysqli_fetch_assoc($result2);
$newname = $row2['Lect_Name'];
            
$sqlfind3 = "SELECT * FROM workload WHERE lect_name = '$newname' ";
$result = $conn->query($sqlfind3);

if (!empty($result) && $result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $id = $row["course_name"];
    echo "<tr><td>" . $row["id"].  "</td><td>" . $row["lect_name"]. "</td><td>" . $row["course_name"] . "</td><td> <a href='quiztruefalse.php?modifyid=$id'>Create/View True or False Quiz</a> | <a href='quizmultiplechoice.php?modifyid=$id'>Create/View Multiple Choice Quiz</a>" . " </td></tr>";
  }
    echo "</table>";
} else {
  echo "0 results";
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