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

$user_id = $_SESSION['user_id'];
$circle_id = $_POST['circle_id'];

//check circle  exit  please enter valid circle id
$checkisexit = mysqli_query($conn, "SELECT * FROM circles  WHERE  id='$circle_id'");
if (!mysqli_num_rows($checkisexit) > 0) {
    echo "circle does not exit  please enter valid circle id";
    header("Location: joincircle.html");
}

else{

// Check if already a member
$check = mysqli_query($conn, "SELECT * FROM circle_members WHERE user_id='$user_id' AND circle_id='$circle_id'");
if (mysqli_num_rows($check) > 0) {
    echo "You are already a member of this circle.";

    header("Location: joincircle.html");

} else {
    $sql = "INSERT INTO circle_members (user_id, circle_id) VALUES ('$user_id', '$circle_id')";
    if (mysqli_query($conn, $sql)) {
        echo "Joined the circle successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}


}


?>
