<?php
    session_start();
    include 'databaseConnection.php';

    $records = $conn->prepare('SELECT score FROM user WHERE user_id =:user_id');
    $records->bindParam(':user_id', $_SESSION['user_id']);
    $records_exec=$records->execute();
    $results = $records->fetchAll();

    $records2 = $conn->prepare('SELECT score FROM category_score WHERE user_id =:user_id');
    $records2->bindParam(':user_id', $_SESSION['user_id']);
    $records2_exec=$records2->execute();
    $results2 = $records2->fetchAll();

    if( $results == false)
    {
       $total_score=0;
    }
    else 
    {
        $total_score = $results['score'];
    }
   
    for($i=0;$i<sizeof($results2);$i++)
    { 
        $total_score = $total_score + $results2[$i][0];
    } 
    $user_id = $_SESSION['user_id'];
    $sql = "UPDATE user SET score=:score WHERE id=:user_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(':score'=>$total_score, ':user_id'=>$user_id));
    
 
    if (isset($_POST["submit_1"]))
    {
        header("Location: leaderboard.php");
    }

    if (isset($_POST["submit_2"]))
    {
        header("Location: myprogress.php");
    }
?>
<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GoMaR</title>
    <link rel="stylesheet" href="../css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1"/>
</head>

<body>
    <div class="navbar">
        <div class="container">
            <img alt="GoMar Logo" src="../resources/logo.svg" class="logo" onclick="window.location.href = 'landing.php';">
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
        <form class="central-container scrollable" name="form" action="statistics.php" method="POST">
            <?php echo "Score for last  test was: ".$_SESSION['lastTest']." from a total of ".$_SESSION['totalScore'];?></br>
            <span class="b" type="submit" name="submit_1" onclick="window.location.href = 'leaderboard.php';"> Leaderboard</span>
            <span class="b" type="submit" name="submit_2" onclick="window.location.href = 'myprogress.php';"> Score by category</span>
    </form>
    </div>
</body>

</html>