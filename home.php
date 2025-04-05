<?php
session_start();

// Check if user is logged in
$isLoggedIn = isset($_SESSION['user_id']);

$username=isset($_SESSION['user_name'])?$_SESSION['user_name']:'user';
//$username = $isLoggedIn ? $_SESSION['user_name'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Circle Tracker - Home</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f6f8;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #007bff;
      color: white;
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    h1 {
      margin: 0;
      font-size: 26px;
    }

    .btn {
      padding: 8px 20px;
      background-color: white;
      color: #007bff;
      border: none;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
    }

    .btn:hover {
      background-color: #e6e6e6;
    }

    .container {
      padding: 40px;
      max-width: 900px;
      margin: auto;
      text-align: center;
    }

    .card {
      background: white;
      border-radius: 10px;
      padding: 30px;
      margin: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      transition: transform 0.2s;
    }

    .card:hover {
      transform: scale(1.02);
    }

    footer {
      text-align: center;
      padding: 20px;
      color: gray;
    }
  </style>
</head>
<body>

  <header>
    <div>
      <h1>Circle Tracker</h1>
      
      <p style="margin: 0;"><?php echo $isLoggedIn ? "Welcome, $username!" : "Track and manage your circles easily"; ?></p>
    </div>
    <div>
      <?php if ($isLoggedIn): ?>
        <a class="btn" href="logout.php">Logout</a>
        <a class="btn" href="profile.php">profile</a>

      <?php else: ?>
        <a class="btn" href="login.html">Login</a>
      <?php endif; ?>

      <a class="btn" href="signup.html">Signup</a>
    </div>
  </header>

  <div class="container">
    <div class="card">
      <h2>Create  Circle</h2>
      <p>Create your own circle  using a unique code.</p>
      <a class="btn" href="circle_list.php">ManageCircles</a>

    </div>

   
    <div class="card">
      <h2>View Live Map</h2>
      <p>Track your circle members on a live map with location and battery.</p>
      <a class="btn" href="map.html">View Map</a>
    </div>
    <?php echo $isLoggedIn ?"  <div class='card'>
      <h2>Manage Your Profile</h2>
      <p>Edit your profile, update details or delete your account.</p>
      <a class='btn' href='profile.php'>My Profile</a>
    </div>":''; ?>
  
  </div>

  <footer>
    &copy; <?= date("Y") ?> Circle Tracker App | Made with ❤️ by Kiran
  </footer>

</body>
</html>
