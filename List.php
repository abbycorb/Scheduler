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


         $studentID = (isset($_POST['studentID']) ? $_POST['studentID'] : '');
         $availabilityID = (isset($_POST['availabilityID']) ? $_POST['availabilityID'] : '');

         if(isset($_POST['Submit'])){
             $sql_insert = "INSERT INTO stud_availability (studentID, availabilityID) VALUES (NULL , NULL)";
             if($varConn->query($sql_insert)===TRUE){
                  echo 'successful';
             }
             else{
                  echo 'error <br>';
             }
         }

        $sql1="SELECT * FROM stud_availability";
        $result1=$varConn->query($sql1);
        echo "<table>";
        echo "<tr><td>" . "Student ID" . "</td>";
        echo "<td>" . "Availability" . "</td></tr>";
        if ($result1->num_rows > 0) {
            // output data of each row
            while($row = $result1->fetch_assoc()) {
                echo "<tr><td>" . $row['studentID'] . "</td><td>" . $row["availabilityID"] . "</td></tr>";
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



