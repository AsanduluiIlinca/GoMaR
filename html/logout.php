<?php
    session_start();
    session_unset($_SESSION['user_id']);
    header("Location: home.html");
?>