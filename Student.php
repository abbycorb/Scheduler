<title> Student </title>
<link rel="stylesheet" href="styles.css">
<html>
<body><pre>
    <h1> Welcome to the automatic scheduler. </h1>
    <h2> Please fill out the form to enter your employee's information </h2>

</pre></body>
</html>

<?php
    require 'mysqli_connect.php';


    if(isset($_POST['submit'])){
    if(!empty($_POST['mtgday'])) {
    // Counting number of checked checkboxes.
    $checked_count = count($_POST['mtgday']);
    echo "You have selected following ".$checked_count." option(s): <br/>";
    // Loop to store and display values of individual checked checkbox.
    foreach($_POST['mtgday'] as $selected) {
    echo "<p>".$selected ."</p>";
    }
    echo "<br/><b>Note :</b> <span>Similarily, You Can Also Perform CRUD Operations using These Selected Values.</span>";
    }
    else{
    echo "<b>Please Select Atleast One Option.</b>";
    }
    }

?>

<html>
<body><pre>
    <div>
    <!-- form to enter students information - form will insert into the student table -->

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

    <form action="dashboard.php">
             <button type="submit">Back To Dashboard</button>
    </form>
</pre></body>
</html>