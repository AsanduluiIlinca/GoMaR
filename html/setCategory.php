<?php
    session_start();
    include 'databaseConnection.php';
    echo '<pre>'; print_r($_GET['categoryName']); echo '</pre>';
    // echo '<pre>'; print_r( $_SESSION); echo '</pre>';

    $stmt = $conn -> prepare("SELECT * FROM category WHERE name=:name");
    $stmt -> bindParam(':name', $_GET['categoryName']);
    $stmt -> execute();
    $results = $stmt -> fetch(PDO::FETCH_ASSOC);

    echo '<pre>'; print_r( $results); echo '</pre>';
    $_SESSION['categoryID']= $results['id'];
    $_SESSION['categoryName']= $results['name'];
    echo '<pre>'; print_r( $_SESSION); echo '</pre>';

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