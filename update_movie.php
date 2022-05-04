<?php
//makes all application to accept the json format
header('Content-Type: application/json');

//fetch connection
require_once 'connection.php';

$response = array();

//get id
//what can be updated ? box_office , stars, storyline


// Note: isset means if we have

if( isset($_POST['id']) && isset($_POST['storyline']) && isset($_POST['stars']) && isset($_POST['box_office'])){

  //move on and update movie
  $id = $_POST['id'];
  $storyline = $_POST['storyline'];
  $stars = $_POST['stars'];
  $box_office = $_POST['box_office'];

  $stmt = $con->prepare("UPDATE movies SET storyline= '$storyline', stars= '$stars', box_office= '$box_office' WHERE id='$id'  ");

    if($stmt->execute()){

      //success
      $response['error'] = false;
      $response['message'] = "Movie has been updated successfully";
    }else{
      $response['error'] = true;
      $response['message'] = "Failed to update Movie";
    }


}else{

  //we don't have info to update the movie

      $response['error'] = true;
      $response['message'] = "Please provide us with id, storyline , box_office and stars";

    }

    echo json_encode($response); 

    /*
     * 
     1. endpoint -> /update_movie.php
     2. request type: $_POST
     3. id, storyline,box_office,stars
     */