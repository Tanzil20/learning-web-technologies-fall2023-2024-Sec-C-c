<?php

    if(!isset($_POST['submit'])) {header('location: signup_process.php');}

    $con = mysqli_connect('localhost', 'root', '', 'Exam');
    
    $id=$_POST['id'];
    $password = $_POST['password'];
    $confrimpassword = $_POST['confrimpassword'];
    $name = $_POST['name'];
    $type = $_POST['role'];
    
    if($password != $confrimpassword) header('location: registration.php?err=1');

    else{
        $sql = "INSERT INTO signup Values(
                '$id',
                '$password',
                '$name',
                '$type'
            );";

        if(mysqli_query($con, $sql) === false){
            
        }
        else{
            header('location: registration.php');
        }
    }

    
?>