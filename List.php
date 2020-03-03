<title>List of SI and Availabilities</title>
<link rel="stylesheet" href="styles.css">
<html>
<h1> Welcome to the automatic scheduler. </h1>
    <h2> All Student Instructors</h2>
</html>
<?php

require 'connection.php';
    $varConn = Connect();
    $sql1="SELECT * FROM Student";
    $result1=$varConn->query($sql1);
    echo "<table>";
    echo "<tr><td>" . "Student ID" . "</td>";
    echo "<td>" . "First Name" . "</td>";
    echo "<td>" . "Last Name" . "</td>";
    echo "<td>" . "Course ID" . "</td></tr>";
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
        echo "<tr><td>" . $row['studentID'] . "</td><td>" . $row['first_name'] . "</td><td>" . $row['last_name'] . "</td><td>" . $row["assigned_courseID"] . "</td></tr>";

    }
} else {
    echo "0 results";
}
$varConn->close();
?>




