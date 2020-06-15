<?php
    session_start();
    include 'databaseConnection.php';

    $stmt = $conn->prepare("SELECT * from informations WHERE category_id=:category_id");
    $stmt->bindParam(':category_id',  $_SESSION['categoryID']);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


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
                <div class="btn" onclick="window.location.href = 'statistics.html';">
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
            <?php echo ucfirst($_SESSION['categoryName']).' references';?>
            </div>
            <div class="description">
                <ul>
                    <li>
                        <div class="test-div">
                            <p>If you want to test your ability, take a test. Or read our recomandation before.</p>
                            <span class="btnn" onclick="window.location.href = 'test.php';">Test</span>
                        </div>
                    </li>
                    <li>
                        <p class="links">(Click on the image if you want to visit our resources.) </p>
                    </li>
                    <?php
                        foreach ($result as $value){
                    ?>
                    <li>
                        <a
                            href=<?= $value['link_site'];?>>
                            <img alt="img" class="image" src=<?= $value['path_image'];?>>
                        </a>
                    <?php }?>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
</body>

</html>