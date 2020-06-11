<?php
    session_start();
    include 'databaseConnection.php';
    // echo '<pre>'; print_r( $_SESSION); echo '</pre>';
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
                Groups
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
                        <div class="title-of-article">Social group</div>
                        <p class="links">(Click on the image if you want to visit our resources.) </p>
                        <a
                            href="https://en.wikipedia.org/wiki/Social_group">
                            <img class="image" src="../resources/group-wiki.png">
                        </a>

                    </li>
                    <li>
                        <div class="title-of-article">Types of Groups</div>
                        <a
                            href="https://courses.lumenlearning.com/sociology/chapter/types-of-groups/">
                            <img class="image" src="../resources/types-group.png">
                        </a>

                    </li>
                    <li>
                        <div class="title-of-article">Groups of people</div>
                        <a href="https://www.macmillanthesaurus.com/topics/groups-of-people">
                            <img class="image" src="../resources/group-of-people.png">
                        </a>
                    </li>
                    <li>
                        <div class="title-of-article">What are social groups and social networks?</div>
                        <a
                            href="https://www.khanacademy.org/test-prep/mcat/society-and-culture/social-structures/a/what-are-social-groups-and-social-networks">
                            <img class="image" src="../resources/what-are-social-groups.png">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>