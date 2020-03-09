<title> Home </title>
<link rel="stylesheet" href="styles.css">
<html>
<body><pre>
    <h1> Welcome to the automatic scheduler. </h1>
    <h2> Please fill out the form to enter your employee's information </h2>

    <!-- this will be the form to enter employees information:
    First Name
    Last Name
    Course:
    Course ID: ?
    -->
</pre></body>
</html>

<?php
    require 'mysqli_connect.php';
?>

<html>
<body><pre>
    <div>
    <form action = "Availability.php" method = "POST">

        <label for="studentid"> Student ID</label>
            <input type = "text" placeholder = "Student ID" id = "studentid" name = "studentid">
        <label for="fname"> First Name</label>
            <input type = "text" placeholder="First Name" id = "fname" name = "fname">
        <label for = "lname"> Last Name</label>
            <input type = "text" placeholder="Last Name" id = "lname" name = "lname">
        <label for ="courseid"> Course ID</label>
            <input type = "text" placeholder="CourseID" id = "courseid" name = "courseid">


        <input type = "submit" name = "submit" value = "Add SI">
    </form>
    </div>
</pre></body>
</html>