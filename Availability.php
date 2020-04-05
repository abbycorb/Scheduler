<title>Availability Page</title>
<link rel="stylesheet" href="styles.css">

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

   if(isset($_POST['submit'])) {
       $data_missing = array();

       if(empty($_POST['studentid'])){
           // Adds name to array
           $data_missing[] = 'Student ID';
       }
       else {
           // Trim white space from the name and store the name
           $s_id = trim($_POST['studentid']);
       }

       if(empty($_POST['fname'])){
           // Adds name to array
           $data_missing[] = 'First Name';
       }
       else{
           // Trim white space from the name and store the name
           $f_name = trim($_POST['fname']);
       }

       if(empty($_POST['lname'])){
           // Adds name to array
           $data_missing[] = 'Last Name';
       }
       else {
           // Trim white space from the name and store the name
           $l_name = trim($_POST['lname']);
       }
       if (empty($_POST['course_name'])){
           $data_missing[] = 'Course Name';

       }
       else {
           $course_name = trim ($_POST['course_name']);
       }


       if(empty($data_missing)){


           //Get corresponding courseID for the assigned course selected
           $get_courseID = "SELECT c.courseID from course c WHERE c.course_name = '$course_name'";
           $reply = @mysqli_query($dbc, $get_courseID);
           $id = null;
           //put the value of the courseID in var $id
           while ($row = mysqli_fetch_array($reply)) {
               $id = $row['courseID'];
           }

           $sql_insert = "REPLACE INTO student (studentID, first_name, last_name, assigned_courseID) VALUES (?, ?, ?, '$id')";
           $stmt = mysqli_prepare($dbc, $sql_insert);
           mysqli_stmt_bind_param($stmt, 'iss', $s_id, $f_name, $l_name);
           mysqli_stmt_execute($stmt);

           $affected_rows = mysqli_stmt_affected_rows($stmt);

           if($affected_rows == 1){
               echo 'Student Entered';
               mysqli_stmt_close($stmt);
               mysqli_close($dbc);

           }
           else {
              echo 'Error Occurred<br />';
              echo mysqli_error($dbc);
              mysqli_stmt_close($stmt);
              mysqli_close($dbc);
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
   //require 'mysqli_connect.php';

   $varConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
   OR die(mysqli_connect_error() .
       'Could not connect to MySQL: ');

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
