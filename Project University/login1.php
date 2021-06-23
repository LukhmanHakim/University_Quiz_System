<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>

    <title></title>
    
</head>

<body>
    <div>
        <h2>Log In</h2>
    </div>
    
    <form method="post" action="login1.php">
        <p style="color : red"><?php if (isset($errors['h'])) echo $errors['h']; ?></p>
        <div>
            <label>ID</label>
            <input type="text" name="id">
            <p style="color : red"><?php if (isset($errors['a'])) echo $errors['a']; ?></p>
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password">
            <p style="color : red"><?php if (isset($errors['c'])) echo $errors['c']; ?></p>
        </div>
        <div>
            Select user type : <select name="usertype">
            <option value="student">Student</option>
            <option value="lecturer">Lecturer</option>
            <option value="admin">Admin</option>
            </select>
        </div>
        <div>
            <br><button type="submit" name="login">login</button>
        </div>
    </form>
    
    
</body>
</html>