<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "taskonedb";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$circle_name = $_POST['circle_name'];
$admin_id = $_SESSION['user_id']; // Must be logged in

$sql = "INSERT INTO circles (circle_name, admin_id) VALUES ('$circle_name', '$admin_id')";
if (mysqli_query($conn, $sql)) {
    $circle_id = mysqli_insert_id($conn);
    // Add admin as member
    mysqli_query($conn, "INSERT INTO circle_members (user_id, circle_id) VALUES ('$admin_id', '$circle_id')");
    echo "Circle created successfully! your circle id is =  $circle_id  ";
    header("Location: circle_list.php");
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
