<html>
<head>
  <link rel="stylesheet" type="text/css" href="../programinfo/css/welcome_style.css">
<title>Modify</title>
</head>
<body>
<form action="adddata_quiztruefalse.php" method="post">
<h1>Add data</h1>
    <p>Please enter the data.</p>
    <hr>

    <label for="id"><b>Your Name</b></label>
    <input type="text" name="lecturer" id="lecturer" required>

    <label for="name"><b>Course Name</b></label>
    <input type="text" name="course" id="course" required>

    <label for="question"><b>Question</b></label>
    <input type="text" name="question" id="question" required>
    
        <label for="answer"><b>Answer</b></label>
    <input type="text" name="answer" id="answer" required>
    
    <hr>


    <button type="submit" class="addbtn">Add</button>
    </form>
</body>    
</html>