<?php
//makes all application to accept the json format
header('Content-Type: application/json');

//fetch connection
require_once 'connection.php';

$response = array();

//mysql statement or query
$stmt = $con->prepare("SELECT * FROM movies");

//$stmt->execute();

if($stmt->execute())
{
  //statement was executed successfully

  $movies = array(); //this array stores all of the results

  $result = $stmt->get_result(); //get all result in array of data

  //looping through and get each single row
  while($row = $result->fetch_array(MYSQLI_ASSOC)) //meaning of associative array ["title" => "Joker", "storyline" =>This"] 
   {
    $movies[] = $row; //this means anytime we get a row it should be inserted into the movies array
  }

  $response['error'] = false; //this is no error
  $response['movies'] = $movies;
  $response['message'] = "movies returned successfully";
  $stmt->close(); //Close the database
   

}else{
  //we have an error
  $response['error'] = true;
  $response['message'] = "could not execute query";

}

//display results
echo json_encode($response);



