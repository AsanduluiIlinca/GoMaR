<?php
if ($conn == null) {
    $conn = new mysqli("localhost", "root", "", "gomar");
}

if ($conn->connect_errno) {
    echo "failed to connect to MySql: " . $conn->connect_error . "<br>";
}
?>