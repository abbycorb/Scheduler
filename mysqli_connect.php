<?php

 DEFINE('dbhost','localhost');
  DEFINE('dbuser','root');
   DEFINE('dbpass','1234');
    DEFINE('dbname','schedule_generator');


 // Create connection
 $varConn = @mysqli_connect(dbhost, dbuser, dbpass, dbname) OR die("Could not connect" . mysqli_connect_error());



?>