<?php
session_start();
$records = $conn->prepare('SELECT admin FROM user WHERE id = :user_id');
$records->bindParam(':user_id', $_SESSION['user_id']);
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC);
if($result['admin'] == 0){
    header("Location: login.php");
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
            <img alt="GoMar Logo" src="../resources/logo.svg" class="logo">
            <div class="right-section">
                <div class="btn" onclick="window.location.href = 'home.html';">
                    <img alt="GoMar Logout" src="../resources/logout-icon.svg" class="icon">
                    <div class="btn-label">| Log out</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="central-container scrollable">
            <span class="admin-button" onclick="window.location.href = '';">Add new questions</span>
            <form name="form" action="" method="POST">
                <input class="i" type="text" placeholder="Enter the question">
                <input class="i" type="text" placeholder="Enter the right answer">
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
            <span class="admin-button " onclick="window.location.href = '';">Set the score of a question</span>
        </div>
    </div>
</body>

</html>