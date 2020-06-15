<?php
include 'databaseConnection.php';
session_start();
if( !isset($_SESSION['admin'])){
    header("Location: home.html");
}
if ($_SESSION['admin']==0 ){
    header("Location: landing.php");
}
$records = $conn->prepare('SELECT id, username FROM user');
$records->execute();
$results = $records->fetchAll(PDO::FETCH_ASSOC);
function users($results)
{
    if (!empty($results)) {
        echo "<table>";
        foreach ($results as $value) {
            echo "<tr><th> <input class ='inputs' type='radio' name='user' value= " . $value['id'] . ">" . $value['username'] . "</th> </tr>";
        }
        echo "</table>";
    }
}

    $jsondata = json_decode(file_get_contents('php://input'), true);

    if (isset($jsondata['id'])){
        $records = $conn->prepare("DELETE FROM user WHERE id=:user_id");
        $records -> bindParam(':user_id', $jsondata['id']);
        $records->execute();

        $stmt = $conn->prepare("DELETE FROM category_score WHERE user_id=:user_id");
        $stmt ->bindParam(':user_id', $jsondata['id']);
        $stmt ->execute();
        //$results = $records->fetchAll(PDO::FETCH_ASSOC);

        exit;
    }
?>

<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GoMaR</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script type="text/javascript" src="deleteItem.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
</head>

<body>
<div class="navbar">
        <div class="container">
            <img alt="GoMar Logo" src="../resources/logo.svg" class="logo" href="landingAdmin.php">
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
                Delete a user
            </div>
            <div>
                <?php echo users($results); ?>
                <span class="btn-home" onclick="deleteItem('deleteUser.php')">Delete</span>
            </div>
        </div>
    </div>
</body>

</html>