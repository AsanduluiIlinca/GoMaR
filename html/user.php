<?php
session_start();
include 'databaseConnection.php';
$stmt = $conn->prepare("SELECT social_status, employed, job from user WHERE id=:user_id");
$stmt->bindParam(':user_id',  $_SESSION['user_id']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$social = $row['social_status'];
$employed = $row['employed'];
$job = $row['job'];

function married($social)
{
    if ($social == 'Married') {
        return <<<HTML
        <html>
        <body><div> <span class="btn-home" onclick="window.location.href = 'setCategory.php?categoryName=family';">Read about family</span></div>
        </body>
        </html>
    HTML;
    }
}
function employed($employed)
{
    if ($employed == 'Yes') {
        return <<<HTML
            <html>
            <body><div> <span class="btn-home" onclick="window.location.href = 'setCategory.php?categoryName=work';">Read about work</span></div>
            </body>
            </html>
        HTML;
    }
}
function job($job)
{
    if ($job == 'Professor' || $job == 'professor' || $job == 'profesor' || $job == 'profesoara' || $job == 'Profesor' || $job == 'Profesoara') {
        return <<<HTML
            <html>
            <body><div> <span class="btn-home" onclick="window.location.href = 'setCategory.php?categoryName=academic';">Read about academic environment</span></div>
            </body>
            </html>
        HTML;
    }
}
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
                Recommendations based on your profile
            </div>
            <div>
                <span class="btn-home" onclick="window.location.href = 'setCategory.php?categoryName=society';">Read about society</span>
                <?php echo married($social);
                echo employed($employed);
                echo job($job) ?>
            </div>
        </div>
    </div>

</body>

</html>