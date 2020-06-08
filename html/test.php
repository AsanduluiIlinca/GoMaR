<?php
    session_start();
    include 'databaseConnection.php';
    echo '<pre>'; print_r( $_SESSION); echo '</pre>';
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
                    How should we behave at the restaurant?
                </p>
            </div>
            <div class="quiz-selector">
                <div class="answer">
                    <input type="checkbox" id="answer1" name="answer1">
                    <span class="sentence">We should follow a certain etiquette</span>
                </div>
                <div class="answer">
                    <input type="checkbox" id="answer2" name="answer2">
                    <span class="sentence">We should behave normally</span>
                </div>
            </div>
            <div class="quiz-question">
                <p class="question">
                    How should we behave at the restaurant?
                </p>
            </div>
            <div class="quiz-selector">
                <div class="answer">
                    <input type="checkbox" id="answer1" name="answer1">
                    <span class="sentence">We should follow a certain etiquette</span>
                </div>
                <div class="answer">
                    <input type="checkbox" id="answer2" name="answer2">
                    <span class="sentence">We should behave normally</span>
                </div>
            </div>
            <div class="quiz-question">
                <p class="question">
                    How should we behave at the restaurant?
                </p>
            </div>
            <div class="quiz-selector">
                <div class="answer">
                    <input type="checkbox" id="answer1" name="answer1">
                    <span class="sentence">We should follow a certain etiquette</span>
                </div>
                <div class="answer">
                    <input type="checkbox" id="answer2" name="answer2">
                    <span class="sentence">We should behave normally</span>
                </div>
            </div>
            <div class="quiz-question">
                <p class="question">
                    How should we behave at the restaurant?
                </p>
            </div>
            <div class="quiz-selector">
                <div class="answer">
                    <input type="checkbox" id="answer1" name="answer1">
                    <span class="sentence">We should follow a certain etiquette</span>
                </div>
                <div class="answer">
                    <input type="checkbox" id="answer2" name="answer2">
                    <span class="sentence">We should behave normally</span>
                </div>
            </div>
            <div class="quiz-question">
                <p class="question">
                    How should we behave at the restaurant?
                </p>
            </div>
            <div class="quiz-selector">
                <div class="answer">
                    <input type="checkbox" id="answer1" name="answer1">
                    <span class="sentence">We should follow a certain etiquette</span>
                </div>
                <div class="answer">
                    <input type="checkbox" id="answer2" name="answer2">
                    <span class="sentence">We should behave normally</span>
                </div>
            </div>
            <div class="quiz-question">
                <p class="question">
                    How should we behave at the restaurant?
                </p>
            </div>
            <div class="quiz-selector">
                <div class="answer">
                    <input type="checkbox" id="answer1" name="answer1">
                    <span class="sentence">We should follow a certain etiquette</span>
                </div>
                <div class="answer">
                    <input type="checkbox" id="answer2" name="answer2">
                    <span class="sentence">We should behave normally</span>
                </div>
            </div>
            <div class="quiz-question">
                <p class="question">
                    How should we behave at the restaurant?
                </p>
            </div>
            <div class="quiz-selector">
                <div class="answer">
                    <input type="checkbox" id="answer1" name="answer1">
                    <span class="sentence">We should follow a certain etiquette</span>
                </div>
                <div class="answer">
                    <input type="checkbox" id="answer2" name="answer2">
                    <span class="sentence">We should behave normally</span>
                </div>
            </div>
            <div class="quiz-question">
                <p class="question">
                    How should we behave at the restaurant?
                </p>
            </div>
            <div class="quiz-selector">
                <div class="answer">
                    <input type="checkbox" id="answer1" name="answer1">
                    <span class="sentence">We should follow a certain etiquette</span>
                </div>
                <div class="answer">
                    <input type="checkbox" id="answer2" name="answer2">
                    <span class="sentence">We should behave normally</span>
                </div>
            </div>
            <div>
                <span class="answer-btn" onclick="window.location.href = 'test.html';">Sent your answers</span>
            </div>
        </div>
    </div>
</body>

</html>