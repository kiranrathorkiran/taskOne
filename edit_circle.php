<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "taskonedb");

if (isset($_GET['id'])) {
    $circle_id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM circles WHERE id = '$circle_id'");
    $circle = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $circle_name = $_POST['circle_name'];
    $circle_id = $_POST['circle_id'];
    mysqli_query($conn, "UPDATE circles SET circle_name='$circle_name' WHERE id='$circle_id'");
    echo "Circle updated successfully! <a href='circle_list.php'>Go back</a>";
    exit();
}
?>

<form method="POST" action="">
  <input type="hidden" name="circle_id" value="<?php echo $circle['id']; ?>">
  <input type="text" name="circle_name" value="<?php echo $circle['circle_name']; ?>" required>
  <input type="submit" value="Update">
</form>
