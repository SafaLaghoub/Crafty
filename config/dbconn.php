<?php

 $dbhost = "localhost:3306";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "crafty";
 
 $connection = new mysqli($dbhost, $dbuser, $dbpass,$dbname);
 
 if(!$connection)
 {
	  die("Connect failed:". mysqli_connect_error());

 
 }
else 
	echo"Connected successfully";


?>