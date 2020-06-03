<?php
session_start();
$dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "gomar";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error); 
$file = fopen("academic1.txt", "r");
$id = 1;
while(!feof($file)){
    $content = fgets($file);
    $carray = explode("\n", $content);
    list($question) = $carray;
    $sql = "INSERT INTO `question`(`id`, `test_id`, `question`, `difficulty`) VALUES ('$id','1', '$question', '10'); ";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $id =$id+1;
    
}
fclose($file);
    
