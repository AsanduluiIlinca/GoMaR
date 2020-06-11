<?php
    session_start();
    include 'databaseConnection.php';
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
                Society
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
                        <div class="title-of-article">Society</div>
                        <p class="links">(Click on the image if you want to visit our resources.) </p>
                        <a
                            href="https://en.wikipedia.org/wiki/Society">
                            <img class="image" src="../resources/society-wiki.png">
                        </a>
                    </li>
                    <li>
                        <div class="title-of-article">Importance of Communication in Society</div>
                        <a
                            href="https://www.academia.edu/20198715/Importance_of_Communication_in_Society">
                            <img class="image" src="../resources/importance-of-communication.png">
                        </a>
                    </li>
                    <li>
                        <div class="title-of-article">How Does Society Influence One’s Behavior?</div>
                        <a href="https://thedecisionlab.com/impact-social-components-human-behaviour/">
                            <img class="image" src="../resources/society-influence.png">
                        </a>
                    </li>
                    <li>
                        <div class="title-of-article">Communication in Today’s Society</div>
                        <a
                            href="https://www.fnu.edu/communication-todays-society/">
                            <img class="image" src="../resources/communication-society.png">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>