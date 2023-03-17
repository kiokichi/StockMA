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
      header("Location:profile.php");
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/mobile.css">
    <link rel="stylesheet" href="css/sty.css">


    <title>login page</title>
</head>

<body>
    <nav class="navbar ">
        <ul>
            <div class="logo">
                <a href="index.html">
                    <img src="images/logo.png" alt="webpage logo">
                </a>
            </div>
            <li><a href="register.php">SignUp</a></li>
            <li><a href="BeginnersGuide.html">Beginners Guide</a></li>
            <li><a href="StockMarket.html">Stocks</a></li>
        </ul>
        <div class="search">
            <form action="searchArticle.html" method="get">
                <input type="text" name="query" placeholder="Article search">
                <button class="btn">search</button>
            </form>
        </div>
    </nav>

    <div class="box">
        <div class="containerLogin">
            <span><a href="register.php">new User?</a></span>
            <header>Sign In</header>
        </div>
        <form name="signin" method="post">
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg" style="color:brown">'.$error.'</span>';
            };
        };
        ?>
        <div class="input-feild">
            <input type="text" name='username' class="input" placeholder="Username" required/>

        </div>
        <div class="input-feild">
            <input type="password" name="password" class="input" placeholder="password" required/>
        </div>
        <div class="input-feild">
            <input type="submit" name="submit" class="submit" value="Login"/>
        </div>
        </form>
        <div class="bottom">
            <div class="left">
                <input type="checkbox" id="check">
                <label for="check">Remember me</label>
            </div>
            <div class="right">
                <label><a href="#">Forgot Password?</a></label>
            </div>
        </div>
    </div>

    </div>
    <footer class="flex-all-center">
        <pre>&copy;All rights are reserved  </pre>
    </footer>
</body>

</html>