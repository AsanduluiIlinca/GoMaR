<?php
include 'databaseConnection.php';
session_start();
$records = $conn->prepare('SELECT admin FROM user WHERE id = :user_id');
$records->bindParam(':user_id', $_SESSION['user_id']);
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC);

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
                Admin attributes
            </div>
            <span class="admin-button " onclick="window.location.href = 'deleteUser.php';">Delete a user</span>
            <span class="admin-button" onclick="window.location.href = 'addQuestion.php';">Add new questions</span>
            <span class="admin-button " onclick="window.location.href = 'deleteQuestion.php';">Delete a question</span>
            <span class="admin-button " onclick="window.location.href = 'addInformation.php';">Add information</span>
        </div>
    </div>
</body>

</html>