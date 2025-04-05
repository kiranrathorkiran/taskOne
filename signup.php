<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "taskonedb";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$email_or_phone = $_POST['email_or_phone'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Check if user already exists
$check = mysqli_query($conn, "SELECT * FROM users WHERE email_or_phone = '$email_or_phone'");
if (mysqli_num_rows($check) > 0) {
    echo "User already exists. Please login.";
    header("Location: login.html");
} else {
    $insert = mysqli_query($conn, "INSERT INTO users (name, email_or_phone, password) VALUES ('$name', '$email_or_phone', '$password')");
    if ($insert) {
        echo "Signup successful!";
        header("Location: login.html");
    } else {
        echo "Signup failed: " . mysqli_error($conn);
    }
}
?>
