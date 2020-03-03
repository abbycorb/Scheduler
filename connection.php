<?php


function Connect()
{
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "1234";
 $dbname = "schedule_generator";

 // Create connection
 $varConn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

 return $varConn;
}

?>