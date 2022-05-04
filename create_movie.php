<?php
//makes all application to accept the json format
header('Content-Type: application/json');

//fetch connection
require_once 'connection.php';

$response = array();

//title , storyline, box_office , stars, lang, genre , release date, run_time


//id -> will be created by the db

if ( isset($_POST['title']) 
&& isset($_POST['storyline']) 
&& isset($_POST['lang']) 
&& isset($_POST['genre'])
&& isset($_POST['release_date']) 
&& isset($_POST['box_office']) 
&& isset($_POST['run_time']) 
&& isset($_POST['stars']) 
  ){


//store parameters in variables
$title = $_POST['title'];
$storyline = $_POST['storyline'];
$lang = $_POST['lang'];
$genre = $_POST['genre'];
$release_date = $_POST['release_date'];
$box_office = $_POST['box_office'];
$run_time = $_POST['run_time'];
$stars = $_POST['stars'];

// we have all parameters
$stmt = $con->prepare("INSERT INTO movies (title, storyline, lang, genre, release_date, box_office , run_time , stars)

VALUES (?, ?, ?, ?, ?,?,?,?)");


// s => string 
// d => float or double
// i => integer
$stmt->bind_param('sssssdsd',$title, $storyline, $lang,$genre, $release_date, $box_office, $run_time, $stars);

//execute query
if($stmt->execute()){
//success
$response['error'] = false;
$response['message'] = "Movie inserted successfully";

$stmt->close();

}else{

  $response['error'] = true;
  $response['message'] = "fail to insert a Movie to the database";
  

}
  }else{
//we cannot insert a movies that doesn't have all of this info
  $response['error'] = true;
  $response['message'] = "Please provide all parameters";
  


  }

  echo json_encode($response);
