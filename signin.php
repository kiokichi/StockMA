<?php

@include 'config.php';

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    // $email = mysqli_real_escape_string($conn, $_POST['email']);
   
    $pass=$_POST['password'];
    $password = $_POST['password'];
   

    $select = "SELECT * FROM user_log WHERE name= '$name' && password ='$password'";


    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result)>0){
        $error[]='successfully logged in!!!';
       
    }else{
        if($pass!=$pass)
        {
            $error[]='Invalid user or password...!';
        }
       
    }

};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sty.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/mobile.css">


    <title>login page</title>
</head>

<body>
    <nav class="navbar ">
        <ul>
            <div class="logo">
                <a href="/">
                    <img src="images/logo.png" alt="webpage logo">
                </a>
            </div>
            <li><a href="signin.php">SignIn</a></li>
            <li><a href="BeginnersGuide.php">Beginners Guide</a></li>
            <li><a href="StockMarket.php">Stocks</a></li>
        </ul>
        <div class="search">
            <form action="searchArticle.php" method="get">
                <input type="text" name="query" placeholder="Article search">
                <button class="btn">search</button>
            </form>
        </div>
    </nav>

    <div class="box">
        <div class="containerLogin">
            <span><a href="signup.php">new User?</a></span>
            <header>Sign In</header>
        </div>
        <form name="signup" method="post">
        <?php
        
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        ?>
        <div class="input-feild">
            <input type="text" name='name' class="input" placeholder="Username" required/>

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
            <form name="signup" method="post">
        </div>
    </div>

    </div>
    <footer class="flex-all-center">
        <pre>&copy;All rights are reserved  </pre>
    </footer>
</body>

</html>