<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "taskonedb";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$email_or_phone = $_POST['email_or_phone'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email_or_phone = '$email_or_phone'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);

    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        echo "Login successful! Welcome, " . $user['name'];
        // Redirect to dashboard or home
         header("Location: home.php");
    } else {
        echo "Incorrect password.";
    }
} else {
    echo "User not found.";
}
?>
