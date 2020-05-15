<?php
    $servername = 'localhost';  
    $username = 'root';  
    $password = '';  
    $database = 'gomar';

    try{
            $conn = new PDO("mysql:host=$servername;dbname=$database;", $username, $password);
        } catch(PDOException $e){
        die( "Connection failed: " . $e->getMessage());}

    /*$dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "gomar";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error); */
?>