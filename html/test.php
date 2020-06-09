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
                $answwersArray = $stmt -> fetchAll();
                //  echo '<pre>'; print_r( $answwersArray); echo '</pre>';
                $questionArray[] = array('id'=>$j,'question'=>$i['question'], 'answers'=>array('0'=>$answwersArray[0]['answer'],'1'=>$answwersArray[1]['answer'],'valid_0'=>$answwersArray[0]['valid'],'valid_1'=>$answwersArray[1]['valid']));
            }
        }
    }

  
    
    // array_push($randIndex, array_rand($midleDiff,2));
    // array_push($randIndex, array_rand($higherDiff,1));
    // echo '<pre>'; print_r( $questionArray); echo '</pre>';
    // echo '<pre>'; print_r($lowerDiff)."scazut"; echo '</pre>';
    // echo '<pre>'; print_r($midleDiff)."medium"; echo '</pre>';
    // echo '<pre>'; print_r($higherDiff)."ridicat"; echo '</pre>';

    // echo '<pre>'; echo $size; echo '</pre>';

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
                    <!-- How should we behave at the restaurant? -->
                    <?php echo $questionArray[0]['question']; ?>
                </p>
            </div>
            <div class="quiz-selector">
                <div class="answer">
                    <input type="checkbox" id="answer1" name="answer1">
                    <span class="sentence">
                        <!-- We should follow a certain etiquette -->
                        <?php echo $questionArray[0]['answers'][0]; ?>
                    </span>
                </div>
                <div class="answer">
                    <input type="checkbox" id="answer2" name="answer2">
                    <span class="sentence">
                        <!-- We should behave normally -->
                        <?php echo $questionArray[0]['answers'][1]; ?>
                    </span>
                </div>
            </div>
            <div class="quiz-question">
                <p class="question">
                    <!-- How should we behave at the restaurant? -->
                    <?php echo $questionArray[1]['question']; ?>
                </p>
            </div>
            <div class="quiz-selector">
                <div class="answer">
                    <input type="checkbox" id="answer1" name="answer1">
                    <span class="sentence">
                        <!-- We should follow a certain etiquette -->
                        <?php echo $questionArray[1]['answers'][0]; ?>
                    </span>
                </div>
                <div class="answer">
                    <input type="checkbox" id="answer2" name="answer2">
                    <span class="sentence">
                        <!-- We should behave normally -->
                        <?php echo $questionArray[1]['answers'][1]; ?>
                    </span>
                </div>
            </div>
            <div class="quiz-question">
                <p class="question">
                    <!-- How should we behave at the restaurant? -->
                    <?php echo $questionArray[2]['question']; ?>
                </p>
            </div>
            <div class="quiz-selector">
                <div class="answer">
                    <input type="checkbox" id="answer1" name="answer1">
                    <span class="sentence">
                        <!-- We should follow a certain etiquette -->
                        <?php echo $questionArray[2]['answers'][0]; ?>
                    </span>
                </div>
                <div class="answer">
                    <input type="checkbox" id="answer2" name="answer2">
                    <span class="sentence">
                        <!-- We should behave normally -->
                        <?php echo $questionArray[2]['answers'][1]; ?>
                    </span>
                </div>
            </div>
            <div class="quiz-question">
                <p class="question">
                <?php echo $questionArray[3]['question']; ?>
                    <!-- How should we behave at the restaurant? -->
                </p>
            </div>
            <div class="quiz-selector">
                <div class="answer">
                    <input type="checkbox" id="answer1" name="answer1">
                    <span class="sentence">
                        <!-- We should follow a certain etiquette -->
                        <?php echo $questionArray[3]['answers'][0]; ?>
                    </span>
                </div>
                <div class="answer">
                    <input type="checkbox" id="answer2" name="answer2">
                    <span class="sentence">
                        <!-- We should behave normally -->
                        <?php echo $questionArray[3]['answers'][1]; ?>
                    </span>
                </div>
            </div>
            <div class="quiz-question">
                <p class="question">
                <?php echo $questionArray[4]['question']; ?>
                    <!-- How should we behave at the restaurant? -->
                </p>
            </div>
            <div class="quiz-selector">
                <div class="answer">
                    <input type="checkbox" id="answer1" name="answer1">
                    <span class="sentence">
                        <!-- We should follow a certain etiquette -->
                        <?php echo $questionArray[4]['answers'][0]; ?>
                    </span>
                </div>
                <div class="answer">
                    <input type="checkbox" id="answer2" name="answer2">
                    <span class="sentence">
                        <!-- We should behave normally -->
                        <?php echo $questionArray[4]['answers'][1]; ?>
                    </span>
                </div>
            </div>
            <div class="quiz-question">
                <p class="question">
                    <!-- How should we behave at the restaurant? -->
                    <?php echo $questionArray[5]['question']; ?>
                </p>
            </div>
            <div class="quiz-selector">
                <div class="answer">
                    <input type="checkbox" id="answer1" name="answer1">
                    <span class="sentence">
                        <!-- We should follow a certain etiquette -->
                        <?php echo $questionArray[5]['answers'][0]; ?>
                    </span>
                </div>
                <div class="answer">
                    <input type="checkbox" id="answer2" name="answer2">
                    <span class="sentence">
                        <!-- We should behave normally -->
                        <?php echo $questionArray[5]['answers'][1]; ?>
                    </span>
                </div>
            </div>
            <div class="quiz-question">
                <p class="question">
                    <!-- How should we behave at the restaurant? -->
                    <?php echo $questionArray[6]['question']; ?>
                </p>
            </div>
            <div class="quiz-selector">
                <div class="answer">
                    <input type="checkbox" id="answer1" name="answer1">
                    <span class="sentence">
                        <!-- We should follow a certain etiquette -->
                        <?php echo $questionArray[6]['answers'][0]; ?>
                    </span>
                </div>
                <div class="answer">
                    <input type="checkbox" id="answer2" name="answer2">
                    <span class="sentence">
                        <!-- We should behave normally -->
                        <?php echo $questionArray[6]['answers'][1]; ?>
                    </span>
                </div>
            <div>
                <span class="answer-btn" onclick="window.location.href = 'test.html';">Sent your answers</span>
            </div>
        </div>
    </div>
</body>

</html>