<?php
session_start();
if (isset($_SESSION['user'])) 
{
    $user = $_SESSION['user'];


    echo "Welcome, " . $user['Name'] . "!<br>";
    echo "Phone: " . $user['Phone'] . "<br>";
    echo "Email: " . $user['Email_ID'] . "<br>";
} else {
    header('Location: login.php');
}
?>
