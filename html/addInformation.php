<?php
include 'databaseConnection.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: home.html");
}
if ($_SESSION['admin'] == 0) {
    header("Location: landing.php");
}

if (isset($_POST['upload'])){
    echo "Intra in if";
    echo $_POST['category'];
    $target = "../resources/".basename($_FILES['image']['name']);
    $image  = $_FILES['image']['name'];
    $link = $_POST['link_information'];
    $category = $_POST['category'];
    $sql = "INSERT INTO informations (category_id, link_site, path_image) VALUES (:category, :link_site ,:path_image)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':link_site', $link);
    $stmt->bindParam(':path_image', $target);
    $stmt->bindParam(':category', $category);
    $stmt->execute();
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
                Add a new link for information page
            </div>
            <form method="POST" action="addInformation.php" enctype="multipart/form-data">
                <div>
                <p>Choose a image for the information link.</p>
                    <input type="file" name="image">
                </div>
                <div>
                <p>Link to the site with information:</p>
                    <input class="input-information" type="text" placeholder="Enter the new link" name="link_information">
                </div>
                <div>
                    <p>Select a category:</p>
                    <select class="input-information" type="text" name="category">
                        <option value="1" name = "academic">academic</option>
                        <option value="2">family</option>
                        <option value="3">group</option>
                        <option value="4">society</option>
                        <option value="5">work</option>
                    </select>
                </div>
                <input class="admin-button" name="upload" type ="submit" onclick="window.location.href = 'addInformation.php';" value="Add">
            </form>
        </div>
    </div>
</body>

</html>