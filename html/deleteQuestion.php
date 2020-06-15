<?php
include 'databaseConnection.php';
session_start();
$records = $conn->prepare('SELECT id, question FROM question');
$records->execute();
$results = $records->fetchAll(PDO::FETCH_ASSOC);
function questions($results)
{
    if (!empty($results)) {
        echo "<table>";
        foreach ($results as $value) {
            echo "<tr><th> <input class ='inputs' type='radio' name='question' value= " . $value['id'] . ">" . $value['question'] . "</th> </tr>";
        }
        echo "</table>";
    }
}

    $jsondata = json_decode(file_get_contents('php://input'), true);

    if (isset($jsondata['ajax']) && isset($jsondata['id'])){
        $records = $conn->prepare("DELETE FROM question WHERE id=:question_id");
        $records -> bindParam(':question_id', $jsondata['id']);
        $records->execute();

        $stmt = $conn->prepare("DELETE FROM answer WHERE question_id=:question_id");
        $stmt ->bindParam(':question_id', $jsondata['id']);
        $stmt ->execute();

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
                Delete a question
            </div>
            <div>
                <?php echo questions($results); ?>
                <span class="btn-home" onclick="deleteItem('deleteQuestion.php')">Delete</span>
            </div>
        </div>
    </div>
</body>

</html>