<title> Home </title>
<link rel="stylesheet" href="styles.css">
<?php
            DEFINE ('DB_USER', 'root');
            DEFINE ('DB_PASSWORD', '1234');//<------------ use your password
            DEFINE ('DB_HOST', 'localhost');
            DEFINE ('DB_NAME', 'schedule_generator');//<----------- use the database name you created student table in

            $varConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            OR die(mysqli_connect_error() .
                'Could not connect to MySQL: ');

            //DELETES ALL DATA FROM COURSE, STUDENT, STUD_AVAIL, AND MEETINGDAY
            if(isset($_POST['delete_all'])) {
                $sql1 = "DELETE FROM student";
                $result1 = mysqli_query($varConn,$sql1);

                $sql2 = "DELETE FROM course";
                $result2 = mysqli_query($varConn,$sql2);

                $sql3 = "DELETE FROM stud_availability";
                $result3 = mysqli_query($varConn,$sql3);

                $sql4 = "DELETE FROM meetingday";
                $result4 = mysqli_query($varConn,$sql4);

                $varConn->close();
            }



            //DELETES STUDENT AFTER BUTTON ON STUDENT PAGE
            if(isset($_POST['delete_student'])) {
                  $student_ID = $_POST['id'];
                  $query2 = "DELETE FROM student WHERE studentID = $student_ID";
                  $result6 = mysqli_query($varConn,$query2);
                  $varConn->close();
            }
?>

<html>
<body><pre>
    <h1> Welcome to the automatic scheduler. </h1>

<div>
    <!-- button to enter course -->
   <form action="course.php">
   <button type="submit">Enter a Course</button>
   </form>

   <!-- button to enter student -->
   <form action="Student.php">
   <button type="submit">Enter a Student</button>
   </form>

   <!-- button to enter availability -->
   <form action="Availability.php">
   <button type="submit">Enter Availability</button>
   </form>

   <!-- button to enter availability -->
   <form action="List.php">
   <button type="submit">View Availabilities</button>
   </form>
</div>
</pre></body>
</html>
