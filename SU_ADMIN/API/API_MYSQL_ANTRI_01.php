<?php
    $dbHost = "192.168.3.22";
    $dbName = "antrian";
    $dbUser = "admin";
    $dbPass = "12345678";

try {
    $dbConn = new PDO("mysql:host=$dbHost;port=3308;dbname=$dbName", $dbUser, $dbPass);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch(PDOException $e) {
    echo $e->getMessage();
}

?>