<?php
    session_start();
    include 'databaseConnection.php';
    echo '<pre>'; print_r( $_SESSION); echo '</pre>';
?>
<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">

    <title>GoMaR</title>
    <link rel="stylesheet" href="../css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
</head>

<body>
    <div class="navbar">
        <div class="container">
            <img alt="GoMar Logo" src="../resources/logo.svg" class="logo" onclick="window.location.href = 'landing.html';">
            <div class="right-section">
                <div class="btn" onclick="window.location.href = 'statistics.html';">
                    <img alt="GoMar Statistics" src="../resources/statistics-icon.svg" class="icon">
                    <div class="btn-label">| Statistics</div>
                </div>
                <div class="btn" onclick="window.location.href = 'home.html';">
                    <img alt="GoMar Logout" src="../resources/logout-icon.svg" class="icon">
                    <div class="btn-label">| Log out</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="central-container scrollable">
            <div class="title">
                Work
            </div>
            <div class="description">
                <ul>
                    <li>
                        <div class="test-div">
                            <p>If you want to test your ability, take a test. Or read our recomandation before.</p>
                            <span class="btnn" onclick="window.location.href = 'test.html';">Test</span>
                        </div>
                    </li>
                    <li>
                        <div class="title-of-article">HoW to behave at work</div>
                        <p class="links">(Click on the image if you want to visit our resources.) </p>
                        <a
                            href="https://www.wikihow.com/Behave-at-Work">
                            <img class="image" src="../resources/how-to-behave-at-work.png">
                        </a>

                    </li>
                    <li>
                        <div class="title-of-article">How to dress at work</div>
                        <a
                            href="http://www.executivestyle.com.au/20-tips-to-dress-appropriately-for-work-2xvcy">
                            <img class="image" src="../resources/how-to-dress.png">
                        </a>

                    </li>
                    <li>
                        <div class="title-of-article">How to Communicate More Effectively in the Workplace</div>
                        <a href="https://blog.dce.harvard.edu/professional-development/how-communicate-more-effectively-workplace">
                            <img class="image" src="../resources/communicate-work.png">
                        </a>
                    </li>
                    <li>
                        <div class="title-of-article">A positive work environment</div>
                        <a
                            href="https://www.hongkiat.com/blog/positive-working-environment/">
                            <img class="image" src="../resources/workplace-environment.png">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>