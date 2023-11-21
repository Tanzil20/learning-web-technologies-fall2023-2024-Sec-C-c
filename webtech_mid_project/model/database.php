<?php
$username = 'root';
$dsn = 'mysql:host=localhost;dbname=career';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
    

    
} catch (PDOException $ex) {
   
    echo "Status: Connection failed"." ".$ex->getMessage();
}

?>