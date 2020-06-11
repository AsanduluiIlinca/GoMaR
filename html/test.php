<?php
    session_start();
    include 'databaseConnection.php';
    // echo '<pre>'; print_r( $_SESSION['categoryID']); echo '</pre>';
//     echo '<pre>'; print_r( $_SESSION['categoryName']); echo '</pre>';

    $stmt = $conn->prepare("SELECT * FROM question WHERE category_id=:categoryID");
    $stmt -> bindParam(':categoryID', $_SESSION['categoryID']);
    $stmt -> execute();
    $results = $stmt -> fetchAll();

    $size = count($results)-1;
    $lower = $results[0][0];
    $higher = $results[$size][0];

    $lowerDiff = array();
    $midleDiff = array();
    $higherDiff = array();

    // echo '<pre>'; print_r( $results[0]['id']); echo '</pre>';
    for ($index = 0 ; $index<=$size ; $index++)
    {
        if ($results[$index][3] == 10)
        {
            $lowerDiff[] = $results[$index][0];
        }

        if ($results[$index][3] == 20)
        {
            $midleDiff[] = $results[$index][0];
        }

        if ($results[$index][3] == 30)
        {
            $higherDiff[] = $results[$index][0];
        }
    }


    function addToArray($questionIDs,$randIndex,$diffArray)
    {
        foreach ($randIndex as $i)
        {
            $questionIDs[]=$diffArray[$i];
            // echo '<pre>'; print_r( $diffArray[$i]); echo '</pre>';

        }
        return $questionIDs;
    }
    $questionIDS = array();
    $randIndex = array_rand($lowerDiff,3);
    $questionIDS=addToArray($questionIDS,$randIndex , $lowerDiff);
    $randIndex = array_rand($midleDiff,2);
    $questionIDS=addToArray($questionIDS,$randIndex , $midleDiff);
    $randIndex = array_rand($higherDiff,2);
    $questionIDS=addToArray($questionIDS,$randIndex , $higherDiff);

    // $questionArray = array();
    foreach ($results as $i) 
    {
        foreach ($questionIDS as $j)
        {
            if($i['id']==$j)
            { 
                $stmt = $conn->prepare("SELECT * FROM answer WHERE question_id=:question_id");
                $stmt -> bindParam(':question_id', $j);
                $stmt -> execute();
                $answersArray = $stmt -> fetchAll();
                //  echo '<pre>'; print_r( $answersArray); echo '</pre>';
                $questionArray[] = array('id'=>$j,'question'=>$i['question'],'score'=>$i['difficulty'], 'answers'=>array('0'=>array('id'=>$answersArray[0]['id'],'answer'=>$answersArray[0]['answer'],'valid'=>$answersArray[0]['valid']),
                                                                                                                         '1'=>array('id'=>$answersArray[1]['id'],'answer'=>$answersArray[1]['answer'],'valid'=>$answersArray[1]['valid'])));
            }
        }
    }

    $_SESSION['questionAnswer']= $questionArray;
    // echo '<pre>'; print_r( $questionArray); echo '</pre>';
    if(isset($_POST['submit']))
    {   
        // echo '<pre>'; print_r( $_POST['answer0']); echo '</pre>';
        if(isset($_POST['answer0']) && isset($_POST['answer1']) && isset($_POST['answer2']) && isset($_POST['answer3']) && isset($_POST['answer4']) && isset($_POST['answer5']) && isset($_POST['answer6']))
        {
            $_SESSION['selectedAnswers'] = array($_POST['answer0'],$_POST['answer1'],$_POST['answer2'],$_POST['answer3'],$_POST['answer4'],$_POST['answer5'],$_POST['answer6']);
            // $_SESSION['test'] = $_POST['answer0'];
            header("Location: score.php");
        }
       
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
                <div class="btn" onclick="window.location.href = 'statistics.html';">
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
    <form class="container" action="./test.php" method="POST">
        <div class="central-container scrollable">
            <div class="quiz-question">
                <p class="question">
                    <?php echo $questionArray[0]['question']; ?>
                </p>
            </div>
            <div class="quiz-selector">
                <div class="answer">
                    <input type="radio" name="answer0" value = "<?= $questionArray[0]['answers'][0]['valid']?>" >
                    <span class="sentence">
                        <?php echo $questionArray[0]['answers'][0]['answer']; ?>
                    </span>
                </div>
                <div class="answer">
                    <input type="radio" name="answer0" value="<?= $questionArray[0]['answers'][1]['valid']?>">
                    <span class="sentence">
                        <?php echo $questionArray[0]['answers'][1]['answer']; ?>
                    </span>
                </div>
            </div>
            <div class="quiz-question">
                <p class="question">
                    <?php echo $questionArray[1]['question']; ?>
                </p>
            </div>
            <div class="quiz-selector">
                <div class="answer">
                    <input type="radio" name="answer1" value="<?= $questionArray[1]['answers'][0]['valid']?>">
                    <span class="sentence">
                        <?php echo $questionArray[1]['answers'][0]['answer']; ?>
                    </span>
                </div>
                <div class="answer">
                    <input type="radio" name="answer1" value="<?= $questionArray[1]['answers'][1]['valid']?>">
                    <span class="sentence">
                        <?php echo $questionArray[1]['answers'][1]['answer']; ?>
                    </span>
                </div>
            </div>
            <div class="quiz-question">
                <p class="question">
                    <?php echo $questionArray[2]['question']; ?>
                </p>
            </div>
            <div class="quiz-selector">
                <div class="answer">
                    <input type="radio" name="answer2" value="<?= $questionArray[2]['answers'][0]['valid']?>">
                    <span class="sentence">
                        <?php echo $questionArray[2]['answers'][0]['answer']; ?>
                    </span>
                </div>
                <div class="answer">
                    <input type="radio" name="answer2" value="<?= $questionArray[2]['answers'][1]['valid']?>">
                    <span class="sentence">
                        <?php echo $questionArray[2]['answers'][1]['answer']; ?>
                    </span>
                </div>
            </div>
            <div class="quiz-question">
                <p class="question">
                <?php echo $questionArray[3]['question']; ?>
                </p>
            </div>
            <div class="quiz-selector">
                <div class="answer">
                    <input type="radio" name="answer3" value="<?= $questionArray[3]['answers'][0]['valid']?>">
                    <span class="sentence">
                        <?php echo $questionArray[3]['answers'][0]['answer']; ?>
                    </span>
                </div>
                <div class="answer">
                    <input type="radio" name="answer3" value="<?= $questionArray[3]['answers'][1]['valid']?>">
                    <span class="sentence">
                        <?php echo $questionArray[3]['answers'][1]['answer']; ?>
                    </span>
                </div>
            </div>
            <div class="quiz-question">
                <p class="question">
                <?php echo $questionArray[4]['question']; ?>
                </p>
            </div>
            <div class="quiz-selector">
                <div class="answer">
                    <input type="radio" name="answer4" value="<?= $questionArray[4]['answers'][0]['valid']?>">
                    <span class="sentence">
                        <?php echo $questionArray[4]['answers'][0]['answer']; ?>
                    </span>
                </div>
                <div class="answer">
                    <input type="radio" name="answer4" value="<?= $questionArray[4]['answers'][1]['valid']?>">
                    <span class="sentence">
                        <?php echo $questionArray[4]['answers'][1]['answer']; ?>
                    </span>
                </div>
            </div>
            <div class="quiz-question">
                <p class="question">
                    <?php echo $questionArray[5]['question']; ?>
                </p>
            </div>
            <div class="quiz-selector">
                <div class="answer">
                    <input type="radio" name="answer5" value="<?= $questionArray[5]['answers'][0]['valid']?>">
                    <span class="sentence">
                        <?php echo $questionArray[5]['answers'][0]['answer']; ?>
                    </span>
                </div>
                <div class="answer">
                    <input type="radio" name="answer5" value="<?= $questionArray[5]['answers'][1]['valid']?>">
                    <span class="sentence">
                        <?php echo $questionArray[5]['answers'][1]['answer']; ?>
                    </span>
                </div>
            </div>
            <div class="quiz-question">
                <p class="question">
                    <?php echo $questionArray[6]['question']; ?>
                </p>
            </div>
            <div class="quiz-selector">
                <div class="answer">
                    <input type="radio" name="answer6" value="<?= $questionArray[6]['answers'][0]['valid']?>">
                    <span class="sentence">
                        <?php echo $questionArray[6]['answers'][0]['answer']; ?>
                    </span>
                </div>
                <div class="answer">
                    <input type="radio" name="answer6" value="<?= $questionArray[6]['answers'][1]['valid']?>">
                    <span class="sentence">
                        <?php echo $questionArray[6]['answers'][1]['answer']; ?>
                    </span>
                </div>
                
                  <p><?php echo "Please make sure all questions have an answer before you submit the test!"; ?></p>
               
            <div>
                <input class="answer-btn" type="submit" name="submit" onclick="post" value='Sent your answers'>
            </div>
        </div>
    </form>
</body>

</html>