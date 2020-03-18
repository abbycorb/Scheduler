<title> Add course </title>
<link rel="stylesheet" href="styles.css">
<html>
<body><pre>
    <h1> Welcome to the automatic scheduler. </h1>
    <h2> Please fill out the form to enter all courses. </h2>

</pre></body>
</html>

<html>
<body><pre>
    <div>
    <!-- form to insert course information
         form will insert into course table -->
        <form action = "student.php" method = "POST">
            <!--Course ID should be an auto-incremented value in the DB, so there is no need to enter the course ID-->
           <!-- <label for="courseid"> Course ID</label>
                <input type = "text" placeholder = "Course ID" id = "courseid" name = "courseid"> -->
            <label for="name"> Course Name</label>
                <input type = "text" placeholder="Course Name" id = "name" name = "name">
            <label for = "stime"> Class Start Time</label>
                <input type = "text" placeholder="Start Time" id = "stime" name = "stime">
            <label for ="etime"> Class End Time</label>
                <input type = "text" placeholder="End Time" id = "etime" name = "etime">
            <div>
            <label for ="mtgday"> Meeting Day(s)</label>
                <p>MWF</p><input type = "radio" name = "mtgday"  value = "MWF">
                <p>T/TR</p><input type = "radio" name = "mtgday"   value = "T/TR">
            </div>

            <input type = "submit" name = "submit" value = "Add Course">
        </form>
        </div>

        <form action="Dashboard.php">
                 <button type="submit">Back To Dashboard</button>
        </form>

</pre></body>
</html>