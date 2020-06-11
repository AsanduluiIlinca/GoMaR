<?php
    session_start();
    include 'databaseConnection.php';
    // echo '<pre>'; print_r( $_SESSION); echo '</pre>';
    // echo '<pre>'; print_r( $_SESSION['selectedAnswers']); echo '</pre>';

    // echo $score_category;
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
            // $score = $results['score'];
            
            $score = computeCategoryScore( $results['score']);

            $sql = "UPDATE category_score SET score=:score WHERE user_id=:user_id AND category_id=:category_id";

            $stmt = $conn->prepare($sql);
            $stmt->execute(array(':score'=>$score, ':user_id'=>$user_id, ':category_id'=>$category_id));
            echo $stmt->rowCount() . " records UPDATED successfully personalData";
            // echo $score;
    }
    // $_SESSION['questionAnswer'] = 0;
    // $_SESSION['selectedAnswers'] = 0;
    //header("Location: statistics.php");
?>