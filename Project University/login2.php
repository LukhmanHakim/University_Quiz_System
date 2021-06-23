<?php
include("connect.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'psw');
$status = filter_input(INPUT_POST, 'status');
$sql = "SELECT * FROM databaseuser WHERE username = '$username' and password = '$password' and status = '$status'";
$result = mysqli_query($conn,$sql) or die( mysqli_error($conn));
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$count = mysqli_num_rows($result);

    if($count == 1 ) {
        
        $_SESSION['login_user'] = $username;
        
        header("location: welcome.php");

        }
    
    else {
         $error = "Your Login Name or Password or Status is invalid";
        echo $error;
      }
   }

?>