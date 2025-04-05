<?php
session_start();
$user_id = $_SESSION['user_id'];
$conn = mysqli_connect("localhost", "root", "", "taskonedb");


// Remove user from any circles
mysqli_query($conn, "DELETE FROM circle_members WHERE user_id='$user_id'");

// Delete circles created by user (if admin)
$circles = mysqli_query($conn, "SELECT id FROM circles WHERE admin_id='$user_id'");
while ($circle = mysqli_fetch_assoc($circles)) {
    $circle_id = $circle['id'];
    mysqli_query($conn, "DELETE FROM circle_members WHERE circle_id='$circle_id'");
    mysqli_query($conn, "DELETE FROM circles WHERE id='$circle_id'");
}

// Delete user account
mysqli_query($conn, "DELETE FROM users WHERE id='$user_id'");

session_destroy();
echo "Account deleted successfully. <a href='signup.html'>Signup Again</a>";
?>
