<?php 

session_start();
require_once "config.php";

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
}
  // Prepare a SQL statement to retrieve the user's data from the database
  $sql = "SELECT * FROM users WHERE username = '$username'";

  // Execute the SQL statement
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // User found, check password
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
      // Password correct, set session variables and redirect to home page
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['username'] = $row['username'];
      header("Location: user.php");
      exit;
    } else {
      
        $error[]='Invalid password or username!!!';
    }
  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/psty.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/utils.css">
</head>
<body>
     <!-- this is the sticky header of the website -->
     <nav class="navbar ">
        <ul>
            <div class="logo">
                <a href="index.html">
                <img src="images/logo.png" alt="webpage logo">
            </a>
              
            </div>
           
            <li><a href="BeginnersGuide.html">Beginners Guide</a></li>
            <li><a href="StockMarket.html">Stocks</a></li>
        </ul>
     
    </nav>
    <!-- header ends here -->
    <div class="card">
       
        <div class="profile-card">
            <img src="images/menu.png"  class="menu-icon">
            <img src="images/setting.png" class="setting-icon" onclick="toggleMenu()">
            <img src="images/profile-pic.png" class="profile-pic">
            <h3><?php if (empty($_SESSION['username'])) {
      echo "login first";
  }
  else{
    echo "Welcome ". $_SESSION['username'];
  }?></h3>
            <p>Welcome to StockMA</p>
            <div class="social-media">
                <img src="images/instagram.png">
                <img src="images/telegram.png">
                <img src="images/dribble.png">
            </div>
            <a href="logout.php">
            <button type="button">LogOut</button>
            </a>
        </div>
        <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <a href="updateProfile.php" class="sub-menu-link">
                        <p>Edit Profile</p>
                    </a>
                </div>
            </div>
    </div>
    <script>
        let subMenu = document.getElementById("subMenu");
        function toggleMenu(){
            subMenu.classList.toggle("open-menu");
        }
    </script>
</body>
</html>