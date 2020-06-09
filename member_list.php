<?php
  // Create database connection using config file
  include_once("config.php");
  $sql = "SELECT * FROM members";
  $result = mysqli_query($mysqli,$sql);
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
    .headerTitle{
      text-align: center;
      margin-top: 5%;
      margin-bottom: 2%;
    }
  </style>
</head>

<body>

<div class="container">
  <h2 class="headerTitle">Member List</h2>        
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Location</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      
      <?php  foreach ($result as $singleResult) { ?>

      <tr>
        <td><?php echo $singleResult['name']; ?></td>
        <td><?php echo $singleResult['email']; ?></td>
        <td><?php echo $singleResult['location']; ?></td>
        <td>
          <a href="edit_member.php?memberId=<?php echo $singleResult['id']; ?>">Edit</a> | 
          <a href="delete_member.php?memberId=<?php echo $singleResult['id']; ?>">Delete</a>
        </td>
      </tr>

      <?php } ?>
 
    </tbody>
  </table>
</div>

</body>
</html>
