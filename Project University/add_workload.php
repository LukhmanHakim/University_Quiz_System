<html>
<head>
  <link rel="stylesheet" type="text/css" href="../programinfo/css/welcome_style.css">
<title></title>
</head>
<body>
<form action="adddata_workload.php" method="post">
<h1>Add data</h1>
    <p>Please enter the data.</p>
    <hr>
    <label for="lectname"><b>Lecturer</b>
    <select name="lectname" id="lectname">
<?php 
       include("db.php");
$sql = mysqli_query($con, "SELECT lect_name FROM lecturer");
while ($row = $sql->fetch_assoc()){
echo "<option name>" . $row['lect_name'] . "</option>";
}
?>
    
        </select>
        </label>
    <label for="subname"><b>Course</b>
    <select name="subname" id="subname">
<?php 
       include("db.php");
$sql = mysqli_query($con, "SELECT sub_name FROM subject");
while ($row = $sql->fetch_assoc()){
echo "<option name=\"subject\">" . $row['sub_name'] . "</option>";
}
?>
</select>
    </label>
    <button type="submit" class="addbtn">Add</button>
    </form>
</body>    
</html>