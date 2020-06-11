<?php
    session_start();
    include 'databaseConnection.php';

    $stmt = $conn -> prepare("SELECT * FROM category WHERE name=:name");
    $stmt -> bindParam(':name', $_GET['categoryName']);
    $stmt -> execute();
    $results = $stmt -> fetch(PDO::FETCH_ASSOC);

    unset($_SESSION['categoryID']);
    unset($_SESSION['categoryName']);
    $_SESSION['categoryID']= $results['id'];
    $_SESSION['categoryName']= $results['name'];

    if(isset($_SESSION['categoryID']) && $_SESSION['categoryName'] == "academic")
    {
        header("Location: academic.php");
    }
    if(isset($_SESSION['categoryID']) && $_SESSION['categoryName'] == "family")
    {
        header("Location: family.php");
    }
    if(isset($_SESSION['categoryID']) && $_SESSION['categoryName'] == "group")
    {
        header("Location: group.php");
    }
    if(isset($_SESSION['categoryID']) && $_SESSION['categoryName'] == "work")
    {
        header("Location: work.php");
    }
    if(isset($_SESSION['categoryID']) && $_SESSION['categoryName'] == "society")
    {
        header("Location: society.php");
    }
    
    
?>