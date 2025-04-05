<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "taskonedb");

$user_id = $_SESSION['user_id']?$_SESSION['user_id']:'';
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email_or_phone = $_POST['email_or_phone'];

    $update = "UPDATE users SET name='$name', email_or_phone='$email_or_phone' WHERE id='$user_id'";
    if (mysqli_query($conn, $update)) {
        echo "Profile updated successfully!<br><br>";
    } else {
        echo "Error updating profile.";
    }
}

$result = mysqli_query($conn, "SELECT * FROM users WHERE id='$user_id'");
$user = mysqli_fetch_assoc($result);
?>

<h2>Your Profile</h2>
<form method="POST" action="">
  Name: <input type="text" name="name" value="<?= $user['name'] ?>" required><br><br>
  Email or Phone: <input type="text" name="email_or_phone" value="<?= $user['email_or_phone'] ?>" required><br><br>
  <input type="submit" value="Update Profile">
</form>

<br>
<a href="delete_account.php" onclick="return confirm('Are you sure you want to delete your account?')">Delete Account</a> |
<a href="logout.php">Logout</a>
