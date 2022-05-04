<?php
//stop report default error and show custom error created
error_reporting(0);

//getting database credentials
$db_name = "movie_api";
$mysql_username = "root";
$mysql_pass = "";
$server_name = "127.0.0.1";

//This allows us to connect to the database
$con = mysqli_connect($server_name,$mysql_username,$mysql_pass,$db_name);

//if we can't connect
if(!$con){

  echo '{"Message": "Unable to connect to database"}';

  die();
  
}
// else{

//   echo "connected successfully";

// }
