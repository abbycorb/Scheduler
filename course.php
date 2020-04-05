<title> Add course </title>
<link rel="stylesheet" href="styles.css">
<html>
<body><pre>
    <h1> Welcome to the automatic scheduler. </h1>
    <h2> Please fill out the form to enter all courses. </h2>

</pre></body>
</html>
<?php
 //require_once('../mysqli_connect.php');
           DEFINE ('DB_USER', 'root');
           DEFINE ('DB_PASSWORD', '1234');//<------------ use your password
           DEFINE ('DB_HOST', 'localhost');
           DEFINE ('DB_NAME', 'schedule_generator');//<----------- use the database name you created student table in

   // $dbc will contain a resource link to the database
   // @ keeps the error from showing in the browser
?>

<?php
   //require 'mysqli_connect.php';

   $varConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
   OR die(mysqli_connect_error() .
       'Could not connect to MySQL: ');

   $sql1="SELECT course_name FROM course";
   $result1=$varConn->query($sql1);


?>
<html>
<body><pre>
    <div>
    <!-- form to insert course information
         form will insert into course table -->
        <form action = "student.php" method = "POST">
            <!--Course ID should be an auto-incremented value in the DB, so there is no need to enter the course ID-->
           <label for="name"> Course Name</label>
                <input type = "text" placeholder="Course Name" id = "name" name = "name">
           <label for = "stime"> Class Start Time</label>
                <input type = "text" placeholder="Start Time" id = "stime" name = "stime">
           <label for ="etime"> Class End Time</label>
                <input type = "text" placeholder="End Time" id = "etime" name = "etime">
            <div>
           <label for ="mtgday"> Meeting Day(s)</label>
                MWF<input type = "radio" name = "mtgday"  value = "MWF">
                T/TR<input type = "radio" name = "mtgday"   value = "T/TR">


            </div>

           <input type = "submit" name = "submit" value = "Add Course">
        </form>
        </div>



       <form action="Dashboard.php">
            <button type="submit">Back To Dashboard</button>
       </form>

</pre></body>
</html>