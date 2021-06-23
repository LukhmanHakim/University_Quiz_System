<?php include('db.php'); ?>

<html>
  <head>
       <style>
    
        table {
            margin: auto;
            width: 70%;
            text-align: left;
        }
               
        table, th, td {
            border: 1px solid black;
        }
               
      </style>
      <title></title>
   </head>
   
   <body>
       <div>
       <h1 style="padding-left:200px">Assign Workload</h1>
       <p style="padding-left:200px"><b>Assign Workload Lecturer</b></p>
       <div>
        <table>
            <tr>
            <th>No.</th>
            <th>Lecturer Name</th>
            <th>Course Name</th>
            <th>Actions</th>
            </tr>
<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "project1";
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if ($conn -> connect_error){
    die ("Connection failed:". $conn-> connect_error);
}

$sql = "SELECT * FROM workload";

$result = $conn->query($sql);

if (!empty($result) && $result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $id = $row["id"];
    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["lecturer"]. "</td><td>" . $row["subject"]. "</td><td><a href='delete_workload.php?deleteid=$id'>Delete</a>" . " </td></tr>";
  }
    echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>
    <br><br>
    <div style="align-content: center">
    <a style="padding-left:200px" href='add_workload.php'>Add</a>
       </div>
           </table>
       </div></div>
</body>
</html>