<?php
require_once "config.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password using the password_hash function
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare a SQL statement to check if the user's email already exists in the database
    $select_email_sql = "SELECT * FROM users WHERE email= '$email'";

    $result_email = $conn->query($select_email_sql);

    if ($result_email->num_rows > 0) {
        $error[] = 'This email is already registered';
    } else {
        // Prepare a SQL statement to check if the user's username already exists in the database
        $select_username_sql = "SELECT * FROM users WHERE username= '$username'";

        $result_username = $conn->query($select_username_sql);

        if ($result_username->num_rows > 0) {
            $error[] = 'This username is already taken';
        } else {
            // Prepare a SQL statement to insert the user's data into the database
            $insert_sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

            if ($conn->query($insert_sql) === TRUE) {
                // User successfully registered
                $error[] = 'User registered successfully';
                header("Location:login.php");
            } else {
                $error[] ='There was an error registering the user';
}
}
}


// Close the database connection
$conn->close();
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


    <title>userlogin page</title>
</head>

<body>
    <nav class="navbar ">
        <ul>
            <div class="logo">
                <a href="index.html">
                    <img src="images/logo.png" alt="webpage logo">
                </a>
            </div>
            <li><a href="login.html">SignIn</a></li>
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
            <span><a href="login.php">Have an account?</a></span>
            <header>Sign Up</header>
        </div>
        <form name="signup" method="post">
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg" style="color:brown">'.$error.'</span>';
            };
        };
        ?>
        <div class="input-feild">
            <input type="text" name="username"class="input" placeholder="Username" required>
        </div>
        <div class="input-feild">
            <input type="email" name="email"class="input" placeholder="Email" required>
        </div>
        <div class="input-feild">
            <input type="password" name="password"class="input" placeholder="password" required>
        </div>
        
        <div class="input-feild">
            <input type="submit" class="submit" name="submit" value="register">
        </div>
    </form>
        <div class="bottom">
            <div class="left">
                <input type="checkbox" id="check">
                <label for="check">Remember me</label><br>
            </div>
            <div class="right">
                <label><a href="#">Forgot Password?</a></label>
            </div>
        </div>
    </div>
    </div>
    <footer class="flex-all-center">
        <p>&copy;All rights are reserved </p>

    </footer>
</body>

</html>
