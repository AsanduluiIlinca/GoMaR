<?php
    session_start();
    session_destroy();
    /*session_unset($_SESSION['user_id']);
    session_unset($_SESSION['categoryID']);
    session_unset($_SESSION['categoryName']);
    session_unset( $_SESSION['questionAnswer']);
    session_unset($_SESSION['selectedAnswers'] );
    session_unset($_SESSION['username']);*/
    header("Location: home.html");
?>