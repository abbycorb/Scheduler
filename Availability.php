<title>Availability Page</title>
<link rel="stylesheet" href="styles.css">

<?php
    require 'mysqli_connect.php';
        /* queries will select all data from stud_availability table */
            $sql1="SELECT availabilityID FROM availability";
            $result1=$varConn->query($sql1);
            $sql2 = "SELECT studentID FROM student";
            $result2=$varConn->query($sql2);


?>

<html>
<body><pre>
    <h1> Welcome to the automatic scheduler. </h1>
    <h2> Please fill out the form for your employee's availability.</h2>

    <div>
    <form action = "List.php" method = "POST">
        <!-- creates dropdown list for student ID -->
        <label for="studentID"> Student ID </label>
            <select name= "studentID">
            <?php
                while($rows = $result2->fetch_assoc()){
                    $studentID = $rows['studentID'];
                     echo "<option value = '$studentID'>$studentID</option>";
                }
            ?>
            </select>
        <!-- creates dropdown list for availability ID -->
        <label for="availabilityID"> Availability ID </label>
            <select name= "availabilityID">
            <?php
                while($rows = $result1->fetch_assoc()){
                    $availabilityID = $rows['availabilityID'];
                    echo "<option value = '$availabilityID'>$availabilityID</option>";
                }
            ?>
            </select>

        <input type = "submit" name = "Submit" value = "Add Availability">
    </form>
    </div>

    <form action="dashboard.php">
             <button type="submit">Back To Dashboard</button>
    </form>
</pre></body>
</html>
