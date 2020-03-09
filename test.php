<?php

    require 'connection.php';
        $varConn = Connect();

         $studentID = $_POST['studentid'];
         $availabilityID = $_POST['availabilityid'];
         $sql_insert = "INSERT INTO stud_availability (studentID, availabilityID) VALUES ('$studentID','$availabilityID')";

         if($varConn->query($sql_insert)===TRUE){
            echo 'successful';
         }
         else{
            echo 'error <br>';
         }
$varConn->close();
?>