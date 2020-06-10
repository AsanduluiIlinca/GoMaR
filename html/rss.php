<?php
    session_start();
    include 'databaseConnection.php';
    header("Content-Type: application/xml; charset=ISO-8859-1");

    $rssfeed = '<?xml version="1.0" encoding="ISO-8859-1"?>';
    $rssfeed .= '<rss version="2.0">';
    $rssfeed .= '<channel>';
    $rssfeed .= '<title>GoMaR leaderbord</title>';
    $rssfeed .= '<link>http://localhost/Web/GoMaR/GoMaR/html/rss.php</link>';
    $rssfeed .= '<description>This is a RSS feed representing the leaderbord of GoMaR users by scores</description>';
    $rssfeed .= '<language>en-us</language>';
 

 
    $query = "SELECT username,score from user ORDER BY score DESC LIMIT 10 ";
    $stmt = $conn->prepare($query);
    $stmt->execute();
 
    $index = 1;
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
 
        $rssfeed .= '<item>';
        $rssfeed .= '<title> Leaderbord position no.' .$index. '</title>';
        $rssfeed .= '<description> Username: '  . $row['username'].' Score: '. $row['score'] . '</description>';
        $rssfeed .= '</item>';
        $index = $index+1;
    }
 
    $rssfeed .= '</channel>';
    $rssfeed .= '</rss>';
 
    echo $rssfeed;
?>