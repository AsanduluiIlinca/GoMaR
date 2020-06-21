<?php
include 'databaseConnection.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: home.html");
}
if ($_SESSION['admin'] == 0) {
    header("Location: landing.php");
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
            <img alt="GoMar Logo" src="../resources/logo.svg" class="logo" onclick="window.location.href = 'landingAdmin.php';">
            <div class="right-section">
                <div class="btn" onclick="window.location.href = 'statistics.php';">
                    <img alt="GoMar Statistics" src="../resources/statistics-icon.svg" class="icon">
                    <div class="btn-label">| Statistics</div>
                </div>
                <div class="btn" onclick="window.location.href = 'logout.php';">
                    <img alt="GoMar Logout" src="../resources/logout-icon.svg" class="icon">
                    <div class="btn-label">| Log out</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="central-container scrollable">
            <div class="title">
                Add a question
            </div>
            <form name="form" action="" method="POST">
                <p>Enter the question.</p>
                <input class="i" type="text" placeholder="Enter the question">
                <p>Enter the right answer.</p>
                <input class="i" type="text" placeholder="Enter the right answer">
                <p>Enter the wrong answer.</p>
                <input class="i" type="text" placeholder="Enter the wrong answer">
                <p>Select the category:</p>
                <select class="i" type="text" name="category">
                    <option value="1">academic</option>
                    <option value="2">family</option>
                    <option value="3">group</option>
                    <option value="4">society</option>
                    <option value="5">work</option>
                </select>
            </form>
            <span class="admin-button " onclick="window.location.href = '';">Add question</span>
        </div>
    </div>
</body>

</html>