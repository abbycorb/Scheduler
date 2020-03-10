<title>List of SI and Availabilities</title>
<link rel="stylesheet" href="styles.css">
<html>
<body><pre>
    <h1> Welcome to the automatic scheduler. </h1>
    <h2> All Student Instructors</h2>
</pre></body>
</html>
<?php

    require_once('./mysqli_connect.php');

        /* these queries will display all students information */
        $sql1="SELECT * FROM stud_availability";
        $result1=$varConn->query($sql1);
        echo "<table border=1 style=\"top:15px; left:10px\">";
        echo "<tr><td>" . "Student ID" . "</td>";
        echo "<td>" . "Availability" . "</td></tr>";
        if ($result1->num_rows > 0) {
            // output data of each row
            while($row = $result1->fetch_assoc()) {
                echo "<tr><td>" . $row['studentID'] . "</td><td>" . $row["availabilityID"] . "</td><td><a href = 'student.php'>Edit Student</td><td><a href = 'availability.php'> Add Availability</td></tr>";
            }
        }
        else {
            echo "0 results";
        }
        $varConn->close();
?>
<html>
<body><pre>
      <form action="schedule.html">
         <button type="submit">Process Schedule</button>
      </form>
</pre></body>
</html>



