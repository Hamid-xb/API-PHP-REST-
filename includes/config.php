<?php 
    $dbuser = 'root';
    $dbpass = '';

    try {
        $conn = new PDO('mysql:host=127.0.0.1;dbname=phprest', $dbuser, $dbpass);

        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, TRUE);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch (PDOException $e) {
        echo 'Connection error'. $e->getMessage();
    }
?>