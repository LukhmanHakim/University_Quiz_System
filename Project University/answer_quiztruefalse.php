
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
       <h2 style="font-size : 30px;">Quiz</h2>
       <h3>INSTRUCTION : MAKE SURE YOU SUBMIT YOUR ANSWER RIGHT AFTER YOU HAVE ANSWER THEM.</h3>
       <br>
       <div style="background-color : cyan; font-size : 20px;">
        <table>
            <tr>
            <th>No.</th>
            <th>Question</th>
            <th>True</th>
            <th>False</th>
            </tr>
        
<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "project";
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if ($conn -> connect_error){
    die ("Connection failed:". $conn-> connect_error);
}
            
include ('session.php');
$getid= $_GET['modifyid'];
$sqlfind1 = "SELECT * FROM databaseuser WHERE userid = '$id_session'";
$result1 = mysqli_query($conn,$sqlfind1) or die( mysqli_error($conn));
$row1 = mysqli_fetch_assoc($result1);

$newid = $row1['userid'];      
$sqlfind2 = "SELECT * FROM studentinfo WHERE Student_ID = '$newid' ";
$result2 = mysqli_query($conn,$sqlfind2) or die( mysqli_error($conn));
$row2 = mysqli_fetch_assoc($result2);            
            
$newname = $row2['Student_Name'];
$sqledit = "INSERT INTO student_quiztruefalse_marks (student_ID,student_name,course_name,marks) values ('$newid','$newname','$getid','0')";
$result3 = mysqli_query($conn, $sqledit);


    echo "GOOD LUCK ". $newname. "!<br><br>";
           
                    
$sql = "SELECT question FROM quiztruefalse where course_name = '$getid'";
$var = 0;
$var2 = 0;
$result = $conn->query($sql);

if (!empty($result) && $result->num_rows > 0) {
   for ($i = 1; $i <= $result->num_rows; $i++){
       $var2 = $var2 +1;
   }
  // output data of each row
echo "<form action='quiztruefalse_done.php?getid=$var2&getcourse=$getid' method='POST'>";
  while($row = $result->fetch_assoc()) {
     $id = $row['question'];  
     $var = $var +1;
     $name = 'answer_' . $var;
      
    $html = '<tr><td>'.$var.'</td><td>'.$row['question'] . '</td><td><input type="radio" name="' . $name . '" value="true" /></td><td> <input type="radio" name="' . $name . '" value="false" > </td><td></tr></td> <br/>';
      
      echo $html;
      
   
  }
    
    echo "</table>";
    echo "<br><center><input type='submit' name='marksadd' value='Confirm'></button></center></form>";
} else {
  echo "No quiz yet";
 
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
    <footer style="font-size : 12px; text-align : center;"><i>SYSTEM UNIVERSITY</i>
    <br>
    UNIVERSITI TUN HUSSEIN ONN &copy 2020 </footer>
           </table>
       </div>
   </body>
   
</html>