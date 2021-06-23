<?php 
include('server.php'); 
?>
<!DOCTYPE html>
<html>
<head>

    <title></title>
    
</head>

<body>
    <div>
        <h2>Home Page</h2>

            <p>Welcome <strong><?php echo $_SESSION['admin_name']; ?></strong></p>
            <p><a href="register_admin.php">Admin Registeration</a></p>
            <p><a href="register_lecturer.php">Lecturer Registeration</a></p>
            <p><a href="register_student.php">Student Registeration</a><p> 
            <p><a href="register_subject.php">Subject Registeration</a><p>
            <p><a href="workload.php">Assign Workload</a><p>
            <p><a href="admin.php?logout='1'" style="color: red;">Logout</a></p>
        
    </div>
</body>
</html>