<?php
    session_start();
    include 'databaseConnection.php';
    echo '<pre>'; print_r( $_SESSION['categoryID']); echo '</pre>';
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
            <img alt="GoMar Logo" src="../resources/logo.svg" class="logo" onclick="window.location.href = 'landing.php';">
            <div class="right-section">
                <div class="btn" onclick="window.location.href = 'statistics.php';">
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
                Family
            </div>
            <div class="description">
                <ul>
                    <li>
                        <div class="test-div">
                            <p>If you want to test your ability, take a test. Or read our recomandation before.</p>
                            <span class="btnn" onclick="window.location.href = 'test.php';">Test</span>
                        </div>
                    </li>
                    <li>
                        <div class="title-of-article">Meaning of Family</div>
                        <p class="links">(Click on the image if you want to visit our resources.) </p>
                        <a
                            href="https://family.lovetoknow.com/about-family-values/meaning-family">
                            <img class="image" src="../resources/meaningOfFamily.png">
                        </a>

                    </li>
                    <li>
                        <div class="title-of-article">Family</div>
                        <a
                            href="https://en.wikipedia.org/wiki/Family">
                            <img class="image" src="../resources/family-wiki.png.">
                        </a>

                    </li>
                    <li>
                        <div class="title-of-article">What does family mean for you, and how has it shaped you?</div>
                        <a href="https://medium.com/sandbox/what-does-family-mean-for-you-and-how-has-it-shaped-you-8cbc1aaaee02">
                            <img class="image" src="../resources/shaped.png">
                        </a>
                    </li>
                    <li>
                        <div class="title-of-article">What does family mean to you?</div>
                        <a
                            href="https://www.travelance.ca/blog/family-mean/">
                            <img class="image" src="../resources/what-family-meaning.png">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>