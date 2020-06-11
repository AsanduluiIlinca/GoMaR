<?php
session_start();
include 'databaseConnection.php';
$stmt = $conn->prepare("SELECT score, category_id from category_score WHERE user_id=:user_id");
$stmt->bindParam(':user_id',  $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt2 = $conn->prepare("SELECT * from category WHERE id=:category_id");


function tabel($result,$stmt2)
{
    $leaderboard = '<table class = "tabl">';
    $leaderboard .= '<tr>';
    $leaderboard .= '<th class = "t"> Category </th>';
    $leaderboard .= '<th class = "t"> Score </th>';
    $leaderboard .= '</tr>';
    foreach ($result as $value) {
        $stmt2->bindParam(':category_id', $value['category_id']);
        $stmt2->execute();
        $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        foreach($result2 as $val)
        {
            $leaderboard .= '<tr>';
            $leaderboard .= '<td class = "t">' . $val['name'] . ' </td>';
            $leaderboard .= '<td class = "t">' . $value['score'] . ' </td>';
            $leaderboard .= '</tr>';
        }
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
                My progress
            </div>
            <?php echo tabel($result,$stmt2); ?>
        </div>
    </div>
</body>

</html>