<?php
include '../model/db_connection.php';



function login($email,$password)
{       $con=getConnection();
    // Validate the user credentials (You should hash the password in a real scenario)
    $query = "SELECT * FROM persons WHERE Email_ID = '$email' AND password = '$password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        // Successful login
        $user = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['user'] = $user;
        header('Location: ../view/home.php');
    } else {
        // Unsuccessful login
        header('Location: register.php');
    }
}
function getEmail($email)
{

    $con = getConnection();
    $sql = "SELECT * FROM persons WHERE Email_ID = '$email'";
    $result = mysqli_query($con, $sql);
    $emails = [];
    if (mysqli_num_rows($result) > 0) {
        echo '<span style="color: red;">Email already exists</span>';
    } else {
        echo '<span style="color: green;">Email available</span>';
    } 
    return $emails;
}

function createMember($Username, $Useremail, $UserPhoneNumber,$Userpassword){
    
    
    $con = getConnection(); 
    $sql = " insert into persons values ('{$Username}','{$UserPhoneNumber}',,'{$Useremail}','{$Userpassword}')";
    $result = mysqli_query($con, $sql);

    if ($result == true) {
        header("location: ../view/login.php");
    } else {
        echo "User can not created";
    }
}


?>