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
                Academic Environment
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
                        <div class="title-of-article">Academic meaning</div>
                        <p class="links">(Click on the image if you want to visit our resources.) </p>
                        <a
                            href="https://www.merriam-webster.com/dictionary/academic">
                            <img class="image" src="../resources/academic-meaning.png">
                        </a>

                    </li>
                    <li>
                        <div class="title-of-article">Hardvard</div>
                        <a
                            href="https://college.harvard.edu/admissions/why-harvard/academic-environment">
                            <img class="image" src="../resources/harvard.png">
                        </a>

                    </li>
                    <li>
                        <div class="title-of-article">Student learning and perceptions of the academic environment</div>
                        <a href="https://link.springer.com/article/10.1007/BF01680529">
                            <img class="image" src="../resources/studentPerceptions.png">
                        </a>
                    </li>
                    <li>
                        <div class="title-of-article">Academic Environment</div>
                        <a
                            href="https://oiss.yale.edu/life-at-yale/cultural-adjustment-transition/academic-environment">
                            <img class="image" src="../resources/academic2.png">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>