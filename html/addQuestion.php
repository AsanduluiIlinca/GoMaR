<?php
include 'databaseConnection.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: home.html");
}
if ($_SESSION['admin'] == 0) {
    header("Location: landing.php");
}
$jsondata = json_decode(file_get_contents('php://input'), true);
if (isset($jsondata['question']) && isset($jsondata['rightAnswer']) && isset($jsondata['wrongAnswer']) && isset($jsondata['category']) && isset($jsondata['difficulty'])) {
    echo $jsondata['category'];
    $sql = "INSERT INTO question (category_id, question, difficulty) VALUES (:category_id, :question, :difficulty)";
    $records = $conn->prepare($sql);
    $records->bindParam(':category_id', $jsondata['category']);
    $records->bindParam(':question', $jsondata['question']);
    $records->bindParam(':difficulty', $jsondata['difficulty']);
    $records->execute();

    $stmt = $conn->prepare("SELECT id from question WHERE question=:question");
    $stmt->bindParam(':question', $jsondata['question']);
    $stmt->execute();
    $id = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $valid = 1;
    $sql1 = "INSERT INTO answer (question_id, answer, valid) VALUES (:question_id, :answer,:valid)";
    $record = $conn->prepare($sql1);
    $record->bindParam(':question_id',$id['id']);
    $record->bindParam(':answer', $jsondata['rightAnswer']);
    $record->bindParam(':valid', $valid);
    $record->execute();

    $valid = 0;
    $sql2 = "INSERT INTO answer (question_id, answer, valid) VALUES (:question_id, :answer,:valid)";
    $record = $conn->prepare($sql2);
    $record->bindParam(':question_id',$id['id']);
    $record->bindParam(':answer', $jsondata['wrongAnswer']);
    $record->bindParam(':valid', $valid);
    $record->execute();


    // $stmt = $conn->prepare("DELETE FROM answer WHERE question_id=:question_id");
    // $stmt->bindParam(':question_id', $jsondata['id']);
    // $stmt->execute();
    exit;
}
?>

<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GoMaR</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script type="text/javascript" src="addItem.js"></script>
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
                <input class="input-information" type="text" placeholder="Enter the question">
                <p>Enter the right answer.</p>
                <input class="input-information" type="text" placeholder="Enter the right answer">
                <p>Enter the wrong answer.</p>
                <input class="input-information" type="text" placeholder="Enter the wrong answer">
                <p>Select the category:</p>
                <select class="input-information" type="text" id="category" name="category">
                    <option value="1">academic</option>
                    <option value="2">family</option>
                    <option value="3">group</option>
                    <option value="4">society</option>
                    <option value="5">work</option>
                </select>
                <p>Select the difficulty:</p>
                <select class="input-information" type="text" id="difficulty" name="difficulty">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                </select>
            </form>
            <span class="admin-button " onclick="addItem()">Add question</span>
        </div>
    </div>
</body>

</html>