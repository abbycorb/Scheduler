<title>List of SI and Availabilities</title>
<link rel="stylesheet" href="styles.css">
<html>
<body><pre>
    <h1> Welcome to the automatic scheduler. </h1>
    <h2> All Student Instructors</h2>
</pre></body>
</html>
<?php
            DEFINE ('DB_USER', 'root');
            DEFINE ('DB_PASSWORD', '1234');//<------------ use your password
            DEFINE ('DB_HOST', 'localhost');
            DEFINE ('DB_NAME', 'schedule_generator');//<----------- use the database name you created student table in

            $varConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            OR die(mysqli_connect_error() .
                'Could not connect to MySQL: ');

    if(isset($_POST['Submit'])) {
        $data_missing = array();

        if(empty($_POST['studentID'])){
            // Adds name to array
            $data_missing[] = 'Student ID';
        }
        else {
            // Trim white space from the name and store the name
            $s_id = trim($_POST['studentID']);
        }

        if(empty($_POST['availabilityID'])){
            // Adds name to array
            $data_missing[] = 'Availability ID';
        }
        else{
            // Trim white space from the name and store the name
            $avail_id = trim($_POST['availabilityID']);
        }

        if(empty($data_missing)){


            //*** MAKE SURE THESE VARIABLES MATCH VARIABLES IN YOUR DB ********//
            //is there a way to ensure duplicate entries are not possible with this insertion?
            $query = "INSERT INTO stud_availability (studentID, availabilityID) VALUES ('$s_id', '$avail_id')";

            $stmt = mysqli_prepare($varConn, $query);
            mysqli_stmt_execute($stmt);
            $affected_rows = mysqli_stmt_affected_rows($stmt);

            //********** ERROR CHECKING ***********//
             if($affected_rows == 1){
                echo 'Student Availability Entered';
                mysqli_stmt_close($stmt);
                mysqli_close($varConn);
            }
            else {
                 // echo 'Error Occurred<br />';
                //echo mysqli_error();
                mysqli_stmt_close($stmt);
                mysqli_close($varConn);
            }
        }
        else {
            echo 'You need to enter the following data<br />';
            foreach($data_missing as $missing){
                 echo "$missing<br />";
            }
        }
    }

?>

<?php

    $varConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
    OR die(mysqli_connect_error() .
    'Could not connect to MySQL: ');

    //****QUERY*******//
    $sql1="SELECT * FROM stud_availability ORDER BY studentID";
    $result1=$varConn->query($sql1);

    echo "<table border=1 style=\"top:15px; left:10px\">";
    echo "<tr><td>" . "Student ID" . "</td>";
    echo "<td>" . "Availability" . "</td></tr>";

    if ($result1->num_rows > 0) {
        // output data of each row
        while($row = $result1->fetch_assoc()) {
    //when the two hyperlinks are clicked, the student page
    //and availability pages should automatically fill in the specific student clicked
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





