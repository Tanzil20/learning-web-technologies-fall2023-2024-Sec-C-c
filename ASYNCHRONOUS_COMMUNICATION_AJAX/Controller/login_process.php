<?php

include '../model/personinfoModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    login($email,$password);

}
?>
