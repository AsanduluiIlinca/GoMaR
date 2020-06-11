<?php
    session_start();
    include 'databaseConnection.php';

    function computeCategoryScore($score)
    {
        for($i=0;$i<=6;$i++)
            {
                if($_SESSION['selectedAnswers'][$i] == 1)
                {
                    $score = $score + $_SESSION['questionAnswer'][$i]['score'];
                }
            }
        return $score;
    }

    function computeTotalScore()
    {
        $score = 0;
        for($i=0;$i<=6;$i++)
            {
                $score = $score + $_SESSION['questionAnswer'][$i]['score'];
            }
        return $score;
    }
    $user_id = $_SESSION['user_id'];
    $category_id = $_SESSION['categoryID'];
    echo 'category' . $category_id;

    $records = $conn->prepare('SELECT * FROM category_score WHERE user_id =:user_id AND category_id = :category_id');
    $records->bindParam(':user_id', $_SESSION['user_id']);
    $records->bindParam(':category_id', $category_id);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    echo 'results' ;
    echo print_r($results);

    if($results == false)
    {   $score=0;
        $score = computeCategoryScore($score);
        
        $sql = "INSERT INTO category_score (user_id, category_id, score) VALUES (:user_id, :category_id, :score)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->bindParam(':category_id', $_SESSION['categoryID']);
        $stmt->bindParam(':score', $score);
        $stmt->execute();
        echo $_SESSION['categoryID'];

    }
    else {
            
            $score = computeCategoryScore( $results['score']);

            $sql = "UPDATE category_score SET score=:score WHERE user_id=:user_id AND category_id=:category_id";

            $stmt = $conn->prepare($sql);
            $stmt->execute(array(':score'=>$score, ':user_id'=>$user_id, ':category_id'=>$category_id));
            echo $stmt->rowCount() . " records UPDATED successfully personalData";
    }
    unset($_SESSION['totalScore']);
    unset($_SESSION['lastTest']);
    $_SESSION['totalScore'] = computeTotalScore();
    $zero = 0;
    $_SESSION['lastTest'] = computeCategoryScore($zero);
    header("Location: statistics.php");
?>