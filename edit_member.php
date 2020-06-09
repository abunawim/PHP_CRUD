<?php
  // Create database connection using config file
  include_once("config.php");

  // Start Area of data show of edit page

  $memberId = $_GET["memberId"];
  $sql = "SELECT * FROM members WHERE id='" . $memberId . "'";
  $singleMemberDetails = mysqli_query($mysqli,$sql);
  $singleMemberDetails = mysqli_fetch_row($singleMemberDetails);

  // Start Area of data update

  if(count($_POST)>0) {

  $id = $_POST["id"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $location = $_POST["location"];

  // Query To insert Data into Database


  $sql = "UPDATE members SET 
          name='" . $name . "', 
          email='" . $email . "', 
          location='" . $location . "' 
          WHERE id='" . $id . "'";

  // Query Executed

  mysqli_query($mysqli,$sql);
  $presentId = mysqli_insert_id($mysqli);

  //Message of Execution

  if(!empty($presentId)) {
    $addMessage = "Update Member Add Successfully !";
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
  <h2 class="headerTitle">Edit Member form</h2>
  <form action="" method="POST">

    <input type="hidden" name="id" value="<?php echo $singleMemberDetails[0]; ?>">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name"  name="name" value="<?php echo $singleMemberDetails[1]; ?>">
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email" value="<?php echo $singleMemberDetails[2]; ?>">
    </div>
    
    <div class="form-group">
      <label for="location">Location:</label>
      <input type="text" class="form-control" id="location" name="location" value="<?php echo $singleMemberDetails[3]; ?>">
    </div>

    <button type="submit" class="btn btn-primary">Edit Member</button>
  </form>
</div>

</body>
</html>
