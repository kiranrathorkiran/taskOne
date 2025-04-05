<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "taskonedb");

$circle_id = $_GET['id'];

// Delete members of this circle first
mysqli_query($conn, "DELETE FROM circle_members WHERE circle_id='$circle_id'");

// Delete the circle
mysqli_query($conn, "DELETE FROM circles WHERE id='$circle_id'");

echo "Circle deleted successfully! <a href='circle_list.php'>Go back</a>";
?>
