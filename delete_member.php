<?php
// Create database connection using config file
include_once("config.php");
$memberId = $_GET["memberId"];
$sql = "DELETE FROM members WHERE id = '".  $memberId ."'";
$result = mysqli_query($mysqli,$sql);

//Redirect to 

header("Location: http://localhost/crud_php/member_list.php");
exit();