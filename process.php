<?php

    //**********************************************************************************************//
    DEFINE ('DB_USER', 'root');
    DEFINE ('DB_PASSWORD', '1234');//<------------ use your password
    DEFINE ('DB_HOST', 'localhost');
    DEFINE ('DB_NAME', 'schedule_generator');//<----------- use the database name you created student table in

    // $dbc will contain a resource link to the database
    // @ keeps the error from showing in the browser

    $varConn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
    OR die(mysqli_connect_error() .
        'Could not connect to MySQL: ');

    //**********************************************************************************************//

    $sql1="SELECT assigned_courseID FROM student";
    $result1=$varConn->query($sql1);

    $courseID = array();//holds course id from student table

    $s_time = array(); //holds all the course starting times rounded to the nearest hour

    $e_time = array ();//holds all the course ending times rounded to the nearest hour
    //also need to get the course meeting day from the separate mtg_day table...but i will do that later because
    //I'm not sure where that fits in here

    $student_id = array();
    $student_avail_id = array();
    $student_s_time = array();
    $student_e_time = array();



    //select course id's for student's that are si -- is this easier to take from the course table
    // or is it easier to take from the student table (?)

    //**********************************************************************************************//

    //I tried doing these if statements in the course.php file, but for some reason they weren't getting reached.
    //I might not  have had the right syntax or maybe I was doing something small wrong, but it wasn't working
    // I tried doing this :
    // $s_time = "";
    // if ($stime == "09:05:00"){
    //          $s_time = "09:00:00";
    // }
    // then we would just insert $s_time
    //The problem I had was that the if conditions weren't being read for some reason
    //The code works in terms of rounding times, but it's too messy right now to use because we have to be able to associate
    //the times with a course and a student --- maybe you have better ideas
    //If we make news columns in our course table like "new_start_time" and "new_end_time" or something we could add them in from
    //here, but those would have to be set to NULL so that we add to them later (I think)
    //I tried doing this, but my $s_time here is an array and I guess I didn't do it correctly
    //Will love your input thanks :)

    while($rows = $result1->fetch_assoc()){
        $courseID = $rows['assigned_courseID'];
        echo $courseID;
        echo' ';

        //get start times for each course
        $get_s_time = "SELECT start_time FROM course WHERE courseID = '$courseID'";
        $result2 = $varConn->query($get_s_time);

        //get end times for each course
        $get_e_time = "SELECT end_time FROM course WHERE courseID = '$courseID'";
        $result3 = $varConn->query($get_e_time);

        $student_id = "SELECT studentID FROM student WHERE assigned_courseID = '$courseID'";
        $result4 = $varConn->query($student_id);

        //print out start times to test--keep while loop to put times in $s_time array
        while($row2 = $result2->fetch_assoc()){

           //round course starting times down to the nearest hour--we might need to add these to the course table
            if ($row2['start_time'] == "09:05:00" || $row2['start_time'] == "9:30:00"){
                $s_time = "09:00:00";
            }
            elseif ($row2['start_time'] == "10:10:00"){
                $s_time = "10:00:00";
            }
            elseif ($row2['start_time'] == "11:15:00"){
                $s_time = "11:00:00";
            }
            elseif ($row2['start_time'] == "12:20:00" || $row2['start_time'] == "12:30:00"){
                $s_time = "12:00:00";
            }
            elseif ($row2['start_time'] == "01:25:00"){
                $s_time = "01:00:00";
            }
            elseif ($row2['start_time'] == "02:30:00"){
                $s_time = "02:00:00";
            }
            elseif ($row2['start_time'] == "03:35:00" || $row2['start_time'] == "03:30:00"){
                $s_time = "03:00:00";
            }
            elseif ($row2['start_time'] == "04:40:00"){
                $s_time = "04:00:00";
            }
            else {
                $s_time = $row2['start_time'];
            }

            //just for testing
            echo $s_time;
            echo ' ';
        }

        //print out end times to test--keep while to put times in $e_time array--we might need to add these to courses
        while($row3 = $result3->fetch_assoc()){

            //round course ending times up to the nearest hour
            if ($row3['end_time'] == "08:50:00"){
                $e_time = "09:00:00";
            }
            elseif ($row3['end_time'] == "09:15:00" || $row3['end_time'] == "09:55:00"){
                $e_time = "10:00:00";
            }
            elseif ($row3['end_time'] == "10:45:00"){
                $e_time = "11:00:00";
            }
            elseif ($row3['end_time'] == "12:05:00" || $row3['end_time'] == "12:15:00"){
                $e_time = "01:00:00";
            }
            elseif ($row3['end_time'] == "01:10:00" || $row3['end_time'] == "01:45:00"){
                $e_time = "02:00:00";
            }
            elseif ($row3['end_time'] == "02:15:00"){
                $e_time = "03:00:00";
            }
            elseif ($row3['end_time'] == "03:15:00" || $row2['end_time'] == "03:20:00"){
                $e_time = "04:00:00";
            }
            elseif ($row3['end_time'] == "04:25:00" || $row3['end_time'] == "04:45:00"){
                $e_time = "05:00:00";
            }
            elseif($row3['end_time'] == "5:30:00"){
                $e_time = "06:00:00";
            }
            elseif ($row3['end_time'] == "06:15:00") {
                $e_time = "07:00:00";

            }
            else {
                $e_time = $row3['end_time'];
            }

            //just for testing
            echo $e_time;
            echo ' ';
        }

    }


?>