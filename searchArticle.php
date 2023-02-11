<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/utils.css">
    <link rel="stylesheet" href="css/mobile.css">

</head>
<style>
    .container {
        padding: 0 15vw 0 15vw;
    }
</style>

<body>
    <!-- this is the sticky header of the website -->
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
            <form action="../searchArticle.php" method="get">
                <input type="text" name="query" placeholder="Article search">
                <button class="btn">search</button>
            </form>
        </div>
    </nav>
    <!-- header ends here -->
    <div class="container">
        <h1>Search Result for Articles</h1>

        <div class="home-article">
            <img src="images/ar1.jpg" alt="image">
            <p><a href="https://www.nuvamawealth.com/insight/inside-the-mind-of-3/A-Balanced-Budget-2023-fca1d7"> A
                    Balanced Budget 2023</a><br>Click the above link to read the whole Article by&copy; nuvama</p>
        </div>

        <div class="home-article">
            <img src="images/ar2.jpg" alt="image">
            <p><a
                    href="https://www.nuvamawealth.com/insight/today-s-perspective-1/Read-The-Fine-Print-Carefully-Before-Investing-bd9a17">Read
                    The Fine Print Carefully Before Investing</a><br>Click the above link to read the whole Article
                by&copy; nuvama</p>
        </div>

        <div class="home-article">
            <img src="images/ar5.jpg" alt="image">
            <p><a
                    href="https://www.nuvamawealth.com/insight/today-s-perspective-1/Weekly-Analysis---A-Market-Snapshot-8dba9d">Weekly
                    Analysis - A Market Snapshot</a><br>Click the above link to read the whole Article by&copy; nuvama
            </p>
        </div>

        <div class="home-article">
            <img src="images/ar3.jpg" alt="image">
            <p><a
                    href="https://www.nuvamawealth.com/insight/chart-of-the-day-2/Global-Shipping-Costs-Gradually-Returning-To-Pre-pandemic-Levels-884508">
                    What is Share Market?Global Shipping Costs Gradually Returning To Pre-pandemic Levels</a><br>Click
                the above link to read the whole Article by&copy; nuvama</p>
        </div>
        <div class="home-article">
            <img src="images/55.jpg" alt="image">
            <p><a
                    href="https://www.nuvamawealth.com/insight/inside-the-mind-of-3/3-ways-to-become-successful-investors-and-avoid-herd-mentality-1fc52a">3
                    Ways To Become Successful Investors And Avoid Herd Mentality</a><br>Click the above link to read the
                whole Article by&copy; nuvama</p>
        </div>
    </div>
</body>
<footer class="flex-all-center">
    <pre>&copy;All rights are reserved   <a href="https://www.vecteezy.com/free-vector/stock-market">Stock Market Vectors by Vecteezy</a></pre>
</footer>
</body>

</html>