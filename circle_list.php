<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<div class="container">
        <div class="card">
            <h2>Create  Circle</h2>
            <p>Create your new circle </p>
            <a class="btn" href="create_circle.html">Create  Circle</a>
      
            <h2> Join Circle</h2>
            <p> join circle using a unique ID.</p>
            <a class="btn" href="joincircle.html">Join Circle</a>
          </div>
          </div>
</body>
</html>







<?php
session_start();
$admin_id = $_SESSION['user_id'];

$conn = mysqli_connect("localhost", "root", "", "taskonedb");
if (!$conn) die("Connection failed");

$result = mysqli_query($conn, "SELECT * FROM circles WHERE admin_id = '$admin_id'");

echo "<h2>Your Circles</h2>";
if(!mysqli_fetch_assoc($result)){
    echo "No circles found.";
   
}
while ($row = mysqli_fetch_assoc($result)) {
    echo "ID: " . $row['id'] . " | Name: " . $row['circle_name'] . " 
          <a href='edit_circle.php?id=".$row['id']."'>Edit</a> | 
          <a href='delete_circle.php?id=".$row['id']."' onclick='return confirm(\"Are you sure?\")'>Delete</a><br>";
}
?>
