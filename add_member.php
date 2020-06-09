<?php
// Create database connection using config file
include_once("config.php");

if(count($_POST)>0) {

  $name = $_POST["name"];
  $email = $_POST["email"];
  $location = $_POST["location"];

  // Query To insert Data into Database

  $sql = "INSERT INTO members (name, email, location) VALUES ('" . $name  . "','" . $email . "','" . $location . "')";
  
  // Query Executed

  mysqli_query($mysqli,$sql);
  $presentId = mysqli_insert_id($mysqli);

  //Message of Execution

  if(!empty($presentId)) {
    $addMessage = "New Member Add Successfully !";
  }
  else{
    $addMessage = "There is a Problem";
  }

  //Redirect to 
  
  header("Location: http://localhost/crud_php/member_list.php");
  exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <style type="text/css">
    .headerTitle{
      text-align: center;
      margin-top: 5%;
    }
  </style>
</head>
<body>

<div class="container">
    <div class="message"><?php if(isset($addMessage)) { echo $addMessage; } ?></div>
  <h2 class="headerTitle">Add Member form</h2>

  <form action="" method="POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
    </div>
    
    <div class="form-group">
      <label for="location">Location:</label>
      <input type="text" class="form-control" id="location" placeholder="Enter Location" name="location">
    </div>

    <button type="submit" class="btn btn-primary">Add Member</button>
  </form>
</div>

</body>
</html>
