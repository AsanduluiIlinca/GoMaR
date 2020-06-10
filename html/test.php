<?php
    session_start();
    include 'databaseConnection.php';
// echo '<pre>'; print_r( $_SESSION); echo '</pre>';

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
    // echo '<pre>'; print_r( $_POST['answer1']); echo '</pre>';
    // echo '<pre>'; print_r( $_POST['answer2']); echo '</pre>';
    // if(!empty($_POST['answer1']))
    // {
    //     echo '<pre>'; print_r( $_POST['answer1']); echo '</pre>';
    // }
    $_SESSION['questionAnswer']= $questionArray;
    // echo '<pre>'; print_r( $questionArray); echo '</pre>';
   

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
    <div class="container">
        <div class="central-container scrollable">
            <div class="quiz-question">
                <p class="question">
                    <?php echo $questionArray[0]['question']; ?>
                </p>
            </div>
            <div class="quiz-selector">
                <div class="answer">
                    <input type="checkbox" id="answer1" name="answer1" value="$questionArray[0]['answer'][0]['valid']">
                    <span class="sentence">
                        <?php echo $questionArray[0]['answers'][0]['answer']; ?>
                    </span>
                </div>
                <div class="answer">
                    <input type="checkbox" id="answer2" name="answer2" value="$questionArray[0]['answer'][1]['valid']">
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
                    <input type="checkbox" id="answer1" name="answer3" value="$questionArray[1]['answer'][0]['valid']">
                    <span class="sentence">
                        <?php echo $questionArray[1]['answers'][0]['answer']; ?>
                    </span>
                </div>
                <div class="answer">
                    <input type="checkbox" id="answer2" name="answer4" value="$questionArray[1]['answer'][1]['valid']">
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
                    <input type="checkbox" id="answer1" name="answer5" value="$questionArray[2]['answer'][0]['valid']">
                    <span class="sentence">
                        <?php echo $questionArray[2]['answers'][0]['answer']; ?>
                    </span>
                </div>
                <div class="answer">
                    <input type="checkbox" id="answer2" name="answer6" value="$questionArray[2]['answer'][1]['valid']">
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
                    <input type="checkbox" id="answer1" name="answer7" value="$questionArray[3]['answer'][0]['valid']">
                    <span class="sentence">
                        <?php echo $questionArray[3]['answers'][0]['answer']; ?>
                    </span>
                </div>
                <div class="answer">
                    <input type="checkbox" id="answer2" name="answer8" value="$questionArray[3]['answer'][1]['valid']">
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
                    <input type="checkbox" id="answer1" name="answer9" value="$questionArray[4]['answer'][0]['valid']">
                    <span class="sentence">
                        <?php echo $questionArray[4]['answers'][0]['answer']; ?>
                    </span>
                </div>
                <div class="answer">
                    <input type="checkbox" id="answer2" name="answer10" value="$questionArray[4]['answer'][1]['valid']">
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
                    <input type="checkbox" id="answer1" name="answer11" value="$questionArray[5]['answer'][0]['valid']">
                    <span class="sentence">
                        <?php echo $questionArray[5]['answers'][0]['answer']; ?>
                    </span>
                </div>
                <div class="answer">
                    <input type="checkbox" id="answer2" name="answer12" value="$questionArray[5]['answer'][1]['valid']">
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
                    <input type="checkbox" id="answer1" name="answer13" value="$questionArray[6]['answer'][0]['valid']">
                    <span class="sentence">
                        <?php echo $questionArray[6]['answers'][0]['answer']; ?>
                    </span>
                </div>
                <div class="answer">
                    <input type="checkbox" id="answer2" name="answer14" value="$questionArray[6]['answer'][1]['valid']">
                    <span class="sentence">
                        <?php echo $questionArray[6]['answers'][1]['answer']; ?>
                    </span>
                </div>
            <div>
                <span class="answer-btn" onclick="window.location.href = 'test.php';">Sent your answers</span>
            </div>
        </div>
    </div>
</body>

</html>