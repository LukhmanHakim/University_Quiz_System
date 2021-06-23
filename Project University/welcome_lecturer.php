<?php
   include('session.php');
?>
<html>
   
   <head>
      <title>Welcome </title>
        <link rel="stylesheet" type="text/css" href="../programinfo/css/welcome_style.css">
   </head>
   
   <body>
      <h1 style="font-size : 60px; text-align : center;">Welcome <?php echo $login_session; ?> !</h1> 
       <h2 style="font-size : 30px;">Choose The Option Here .</h2>
       <br>
       <div style="background-color : cyan; font-size : 20px;">
       <br>
        <br>
       <a href = "subject_list.php">Subject List</a>
       <br>
           <br>
       <a href = "resulttruefalse_lecturer.php">View Result Quiz True/False</a>
       <br>
           <br>
        <a href = "resultmultiplechoice_lecturer.php">View Result Quiz Multiple Choice</a>
        <br>
           <br>
           
       </div>
       <br>
           <br>
           <br>
           <br>
           <br>
       
      <button style="font-size : 22px; text-align : center;"><a href = "logout.php">Sign Out</a></button>
    <footer style="font-size : 12px; text-align : center;"><i>SYSTEM UNIVERSITY</i>
    <br>
    UNIVERSITI TUN HUSSEIN ONN &copy 2019 </footer>
   </body>
   
</html>