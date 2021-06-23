<?php
    session_start();

    $username = "";
    $email = "";
    $errors = array();

    $db = mysqli_connect('localhost', 'root', '', 'project1');
    
//    if (isset($_POST['register'])) {
//        $username = mysqli_real_escape_string($db,$_POST['username']);
//        $email = mysqli_real_escape_string($db,$_POST['email']);
//        $password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
//        $password_2 = mysqli_real_escape_string($db,$_POST['password_2']);
//        $usertype = mysqli_real_escape_string($db,$_POST['usertype']);
//        
//        $u = mysqli_query($db,"SELECT username FROM login WHERE username='$username'");
//        
//        $uu = mysqli_query($db,"SELECT email FROM login WHERE email='$email'");
//        
//        if (empty($username)) {
//            $errors['a'] = "Username is required";
//        } else if(mysqli_num_rows($u) > 0) {
//            $errors['a'] = "Username alraedy exist";
//        }
//        
//        if (empty($email)) {
//            $errors['b'] = "Email is required";
//        } else if(mysqli_num_rows($uu) > 0) {
//            $errors['b'] = "Email alraedy exist";
//        }
//        
//        if (empty($password_1)) {
//            $errors['c'] = "Password is required";
//        }
//        
//        if ($password_1 != $password_2) {
//            $errors['d'] = "Password does not match";
//        }
        
        
//        if (count($errors) == 0) {
////            $password = md5($password_1);
//            
//            $sql = "INSERT INTO login (username, email, password, usertype)
//                        VALUES ('$username', '$email', '$password_1', '$usertype')";
//            
//            mysqli_query($db,$sql);
//            $_SESSION['username'] = $username;
//            $_SESSION['success'] = "You are now logged in";
//            
//            if ($usertype == 'student') {
//                    header('location: student.php');
//                    
//                }elseif($usertype == 'lecturer') {
//                    header('location: lecturer.php');
//                    
//                }else {
//                    header('location: admin.php');
//                }
//        }
        
//    }

    if (isset($_POST['login'])) {
        $id = mysqli_real_escape_string($db,$_POST['id']);
        $password = mysqli_real_escape_string($db,$_POST['password']);
        $usertype = mysqli_real_escape_string($db,$_POST['usertype']);
        
        if (empty($id)) {
            $errors['a'] = "ID is required";
        }
        
        if (empty($password)) {
            $errors['c'] = "Password is required";
        }
        
        if (count($errors) == 0) {
//            $password = md5($password);
                
                if ($usertype == 'student') {
                    $query = "SELECT * FROM student WHERE stud_id='$id' AND stud_pass='$password'";
                    $sql = "SELECT stud_name FROM student WHERE stud_id = '$id'";
                            $result = mysqli_query($db, $sql);
                            while($row = mysqli_fetch_assoc($result)) {
                            $admin_name = $row['admin_name'];}
                    
                            
                    
                            if (mysqli_num_rows($result) == 1) {
                                $_SESSION['stud_name'] = $stud_name;
                                header('location: student.php');
                            }else {
                                $errors['h'] = "Wrong ID/password";
                            }    
                    
                }elseif($usertype == 'lecturer') {
                    $query = "SELECT * FROM lecturer WHERE lect_id='$id' AND lect_pass='$password'";
                    $sql = "SELECT lect_name FROM lecturer WHERE lect_id = '$id'";
                            $result = mysqli_query($db, $sql);
                            while($row = mysqli_fetch_assoc($result)) {
                            $lect_name = $row['lect_name'];}
                    
                            
                            
                            if (mysqli_num_rows($result) == 1) {
                                $_SESSION['lect_name'] = $lect_name;
                                header('location: lecturer.php');
                            }else {
                                $errors['h'] = "Wrong ID/password";
                            } 
                    
                }else {
                    $query = "SELECT * FROM admin WHERE admin_id='$id' AND admin_pass='$password'";
                    $sql = "SELECT admin_name FROM admin WHERE admin_id = '$id'";
                            $result = mysqli_query($db, $sql);
                            while($row = mysqli_fetch_assoc($result)) {
                            $admin_name = $row['admin_name'];}
                    
                            
                            
                            if (mysqli_num_rows($result) == 1) {
                                $_SESSION['admin_name'] = $admin_name;
                                header('location: admin.php');
                            }else {
                                $errors['h'] = "Wrong ID/password";
                            } 
                }
                       
        }
        
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login1.php');
    }

?>
