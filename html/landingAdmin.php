<?php 
include 'databaseConnection.php';
session_start();
if( !isset($_SESSION['admin'])){
    header("Location: home.html");
}
if ($_SESSION['admin']==0 ){
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
                GoMaR
            </div>
            <div class="description">
                <p>This application is intended for people of all ages and wants to inform and test the user
                    on good manners. For a start, you need to register to have a better view on your points of
                    interest. There is a section with articles worth reading to enrich your behavior in different
                    situations. After reading more articles and information on the site, there are several tests
                    depending on the category you choose to test what you have left after reading.
                    At the same time, there is a section where you can view the score obtained according to the
                    category chosen.
                </p>
                <p>
                    You can access from here some things :
                </p>
                <div>
                    <span class="btn-home" onclick="window.location.href = 'category.php';">Category</span>
                    <span class="btn-home" onclick="window.location.href = 'user.php';">Recommendations based on profile</span>
                    <span class="btn-home" onclick="window.location.href = 'statistics.php';">Statistics</span>
                    <span class="btn-home" onclick="window.location.href = 'admin.php';">Admin</span>
                    <span class="btn-home" onclick="window.location.href = 'profile.php';">Update Profile</span>
                </div>
            </div>
        </div>
    </div>

</body>

</html>