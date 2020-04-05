
<title> Schedule </title>
<link rel="stylesheet" href="styles.css">

<!-- CODE FOR PHP ALGORITHM GOES HERE -->
<?php
    //require_once('../mysqli_connect.php');
           DEFINE ('DB_USER', 'root');
           DEFINE ('DB_PASSWORD', '1234');//<------------ use your password
           DEFINE ('DB_HOST', 'localhost');
           DEFINE ('DB_NAME', 'schedule_generator');//<----------- use the database name you created student table in

    // $dbc will contain a resource link to the database
    // @ keeps the error from showing in the browser

           $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
           OR die(mysqli_connect_error() .
               'Could not connect to MySQL: ');
?>

<?php

    $varConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
    OR die(mysqli_connect_error() .
    'Could not connect to MySQL: ');

   //***QUERY FOR SELECTING SCHEDULE TABLE***//
   //$sql1="SELECT * FROM stud_availability ORDER BY studentID";
   //$result1=$varConn->query($sql1);

    echo "<table border=1 style=\"top:15px; left:10px\">";
    echo "<tr><td>" . "Student ID" . "</td>";
    echo "<td>" . "Scheduled Day" . "</td>";
    echo "<td>" . "Start Time" . "</td>";
    echo "<td>" . "End Time" . "</td></tr>";

   /* if ($result1->num_rows > 0) {
        // output data of each row
        while($row = $result1->fetch_assoc()) {
    //when the two hyperlinks are clicked, the student page
    //and availability pages should automatically fill in the specific student clicked
         echo "<tr><td>" . $row['studentID'] . "</td><td>" . $row["Scheduled_day"] . "</td><td>" . $row["Start_time"] . "</td><td>" . $row["End_time"] . "</td></tr>";
        }
    }
    else {
        echo "0 results";
    }
    $varConn->close(); */
?>

<body><pre>
<h1> Welcome to the automatic scheduler. </h1>
    <div>
    <table>
    <thead>
    <tr>
        <th></th>
        <th>
            <span class="long">Monday</span>
        </th>
        <th>
            <span class="long">Tuesday</span>
        </th>
        <th>
            <span class="long">Wednesday</span>
        </th>
        <th>
            <span class="long">Thursday</span>
        </th>
        <th>
            <span class="long">Friday</span>
        </th>

    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="hour"><span>12:00</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td class="hour"><span>01:00</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td class="hour"><span>02:00</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td class="hour"><span>03:00</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td class="hour"><span>04:00</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td class="hour"><span>05:00</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td class="hour"><span>06:00</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td class="hour"><span>07:00</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

    <tr>
        <td class="hour"><span>08:00</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>

    </tr>

    <tr>
        <td class="hour"><span>09:00</span></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

    </tbody>
    </table>
    </div>

    <form action="dashboard.php">
          <button type="submit">Back To Dashboard</button>
    </form>

    <!-- when this button is clicked, it will redirect to the dashboard - it will delete all information
                EXCEPT the availability table, that data must stay in the database -->
    <form action="dashboard.php" method = "POST">
          <input type = "submit" name = "delete_all" value = "Restart">
    </form>

</pre></body>
</html>
