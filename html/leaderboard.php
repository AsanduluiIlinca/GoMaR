<?php
session_start();
include 'databaseConnection.php';
$stmt = $conn->prepare("SELECT username, score from user ORDER BY score DESC LIMIT 10");
$stmt->bindParam(':user_id',  $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
function tabel($result)
{
    $leaderboard = '<table class = "tabl">';
    $leaderboard .= '<tr>';
    $leaderboard .= '<th class = "t"> Username </th>';
    $leaderboard .= '<th class = "t"> Score </th>';
    $leaderboard .= '</tr>';
    foreach ($result as $value) {
        $leaderboard .= '<tr>';
        $leaderboard .= '<td class = "t">' . $value['username'] . ' </td>';
        $leaderboard .= '<td class = "t">' . $value['score'] . ' </td>';
        $leaderboard .= '</tr>';
    }
    $leaderboard .= '</table>';
    return $leaderboard;
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
            <img alt="GoMar Logo" src="../resources/logo.svg" class="logo" onclick="window.location.href = 'landing.html';">
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
                LeaderBoard
            </div>
            <?php echo tabel($result); ?>
        </div>
    </div>
</body>

</html>