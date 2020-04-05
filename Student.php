<title> Student </title>
<link rel="stylesheet" href="styles.css">
<html>
<body><pre>
    <h1> Welcome to the automatic scheduler. </h1>
    <h2> Please fill out the form to enter your employee's information </h2>

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

  $varConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
  OR die(mysqli_connect_error() .
      'Could not connect to MySQL: ');

  if(isset($_GET['id'])){
    $studentID = $filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

  }

  if(isset($_POST['submit'])) {
      $data_missing = array();//keep track of items not entered in form
      $trash = array();

      if (empty($_POST['name'])) {
          $data_missing[] = 'Course Name';
      }
      else {
          $name = trim($_POST['name']);
      }
      if (empty($_POST['stime'])) {
          $data_missing[] = 'Course Start Time';
      }
      else {
          $stime = trim($_POST['stime']);
      }
      if (empty($_POST['etime'])) {
          // Adds name to array
          $data_missing[] = 'Course End Time';
      }
      else {
          // Trim white space from the name and store the name
          $etime = trim($_POST['etime']);
      }
      if (empty($_POST['mtgday'])){
          $data_missing[] = 'Meeting Day';
      }
      else {
          $mtgday = $_POST['mtgday'];
      }

      if (empty($data_missing)) {
          //Insert Course Info into DB
          $query = "INSERT INTO course (courseID, course_name, start_time, end_time) VALUES (NULL, ?, ?, ?)";
          $stmt = mysqli_prepare($varConn, $query);
          mysqli_stmt_bind_param($stmt, "sss", $name,
              $stime, $etime);
          mysqli_stmt_execute($stmt);

          //Get courseID from courses to use as foreign key in table mtg_day
          $get_fk = "SELECT c.courseID from course c WHERE c.course_name = '$name'";
          $response = @mysqli_query($varConn, $get_fk);
          $id = null;
          //put the value of the courseID in var $id
          while ($row = mysqli_fetch_array($response)) {
              $id = $row['courseID'];
          }
          //Add meeting days to mtg_day table
          if ($mtgday == 'MWF'){
              //Separate MWF into the actual days so that we can use these values to compare to other tables
              $mon = 'Monday';
              $wed = 'Wednesday';
              $fri = 'Friday';

              //Insert these values into mtg_day table
              $insert = "INSERT INTO meetingday (courseID, day) VALUES ('$id', '$mon')";
              $insert2 = "INSERT INTO meetingday (courseID, day) VALUES ('$id', '$wed')";
              $insert3 = "INSERT INTO meetingday (courseID, day) VALUES ('$id', '$fri')";

              $stmt1 = mysqli_prepare($varConn, $insert);
              mysqli_stmt_execute($stmt1);

              $stmt2 = mysqli_prepare($varConn, $insert2);
              mysqli_stmt_execute($stmt2);

              $stmt3 = mysqli_prepare($varConn, $insert3);
              mysqli_stmt_execute($stmt3);

          }
          else {
              //If MWF is not selected we know that T/TR must be selected. Do the same as above.
              $tues = 'Tuesday';
              $thurs  = 'Thursday';

              //Insert these values into mtg_day table
              $insert4 = "INSERT INTO meetingday (courseID, day) VALUES ('$id', '$tues')";
              $insert5 = "INSERT INTO meetingday (courseID, day) VALUES ('$id', '$thurs')";

              $stmt4 = mysqli_prepare($varConn, $insert4);
              mysqli_stmt_execute($stmt4);

              $stmt5 = mysqli_prepare($varConn, $insert5);
              mysqli_stmt_execute($stmt5);
          }



          //******** ERROR CHECKING ****************** -- we can delete this later (must remember to close DB connection at end)

          $affected_rows = mysqli_stmt_affected_rows($stmt);

          if ($affected_rows == 1) {
              echo 'Course Entered';
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
          foreach ($data_missing as $missing) {
              echo "$missing<br />";
          }
      }
  }
  ?>

  <?php
  $varConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
  OR die(mysqli_connect_error() .
      'Could not connect to MySQL: ');

  $get_course="SELECT course_name FROM course";
  $result1=$varConn->query($get_course);
?>

<!-- BEGIN HTML -->
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
        <label for="course"> Assigned Course </label>
            <select name = "course_name">
             <?php
                 while($rows = $result1->fetch_assoc()){
                     $course_name = $rows['course_name'];
                     echo "<option value = '$course_name'>$course_name</option>";
                 }
             ?>
             </select>
            <!--THIS BUTTON SHOULD UPDATE THE STUDENT IF IT EXISTS -> BUT INSERT IF IT DOES NOT -->
            <input type = "submit" name = "submit" value = "Add SI">
    </form>
    </div>

    <?php
        $sql1="SELECT studentId FROM student";
        $result1=$varConn->query($sql1);
    ?>

    <!-- this form is to remove a student after the submit "delete_student" has been clicked - the screen will redirect
    to dashboard.php and delete the course that has been selected -->

            <form action = "dashboard.php" method = "POST">
            <label for="studentId"> Remove student? </label>
            <select name= "id">
            <?php
                while($rows = $result1->fetch_assoc()){
                    $studentId = $rows['studentId'];
                    echo "<option value = '$studentId'>$studentId</option>";
                }
            ?>
            </select>
            <!-- THIS BUTTON SHOULD REMOVE A SPECIFIC STUDENT -->
            <input type = "submit" name = "delete_student" value = "Remove Student">
            </form>

            <form action="dashboard.php">
            <button type="submit">Back To Dashboard</button>
            </form>
</pre></body>
</html>