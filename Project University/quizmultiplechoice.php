
<html>
   
   <head>
       <style>table {
       border-collapse: collapse;
       width: 100%;
       text-align: left;</style>
      <title>Quiz Section </title>
        <link rel="stylesheet" type="text/css" href="../programinfo/css/welcome_style.css">
   </head>
   
   <body>
       <h2 style="font-size : 30px;">Question Section</h2>
       <br>
       <div style="background-color : cyan; font-size : 20px;">
        <table>
            <tr>
            <th>No.</th>
            <th>Question</th>
            <th>Answer</th>
            </tr>
<?php
$course = $_GET['modifyid'];
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "project";
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if ($conn -> connect_error){
    die ("Connection failed:". $conn-> connect_error);
}

$sql = "SELECT * FROM quizmultiplechoice WHERE course_name ='$course'";

$result = $conn->query($sql);

if (!empty($result) && $result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $id = $row["id"];
    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["question"]. "</td><td>" . $row["realanswer"] . "</td><td> <a href='modify_quizmultiplechoice.php?modifyid=$id'>Modify</a> | <a href='delete_quizmultiplechoice.php?deleteid=$id'>Delete</a>" . " </td></tr>";
  }
    echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>
    <br><br>
    <div style="align-content: center">
     <a href='add_quizmultiplechoice.php'>Add</a>
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