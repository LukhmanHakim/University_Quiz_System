<?php
   include('session.php');
?>
<html>
   
   <head>
      <title>Welcome </title>
        <link rel="stylesheet" type="text/css" href="../programinfo/css/welcome_style.css">
   </head>
   
   <body>
      <h1 style="font-size : 60px; text-align : center;">Welcome Student:<?php echo $login_session; ?> !</h1> 
       <ol>
           
       <h2 style="font-size : 30px;">Please Choose The Option Here .</h2>
       <br>
               
           
       <div style="background-color : cyan; font-size : 40px;">
           <br>
           <li>
       <a href = "register_subject.php">Register Subject</a>
       <br>
           <br>
           </li>     
    <li>
       <a href = "student_course_database.php">Your Courses</a>
       <br><br>
               
               </li>
       </div>
    </ol>
       <br>
      <button style="font-size : 22px; text-align : center;"><a href = "logout.php">Log Out</a></button>
    <footer style="font-size : 12px; text-align : center;"><i>University System</i>
    <br>
    UNIVERSITI TUN HUSSEIN ONN &copy 2020 </footer>
   </body>
   
</html>