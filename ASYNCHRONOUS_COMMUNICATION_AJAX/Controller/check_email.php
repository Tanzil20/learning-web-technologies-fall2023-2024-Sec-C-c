<?php
include '../model/personinfoModel.php';

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    getEmail($email);
}
?>
