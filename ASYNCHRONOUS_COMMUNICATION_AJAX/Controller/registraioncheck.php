<?php
require_once("../model/personinfoModel.php");



$Username = $_POST['name'];
$Useremail = $_POST['email'];
$UserPhoneNumber = $_POST['phnNumber'];
$Userpassword = $_POST['password'];
$repassword = $_POST['repassword'];


//Form validation using PHP

$UsernameCondition = ((ctype_alpha($Username)) && (strlen($Username > 2)));
$UserPasswordCondition = (strlen($Userpassword) > 8);
$UserPhoneNumberCondition = ((strlen($UserPhoneNumber) == 11 || strlen($UserPhoneNumber) > 10) && (strlen($UserPhoneNumber) < 12) && is_numeric($UserPhoneNumber));

if (isset($_POST['submit'])) {
    if ($Username != "" && $Useremail != ""  && $UserPhoneNumber != "" && $Userpassword != "")
    {
        if ($UsernameCondition && $UserPasswordCondition && $UserPhoneNumberCondition) {
            if ($Userpassword == $repassword) {

                $result =  createMember($Username, $Useremail, $UserPhoneNumber,$Userpassword);
                if($result == true)
                {
                    header("location: ../view/login.php");
                }
            } 
            elseif ($Userpassword != $repassword) {
                echo "Please provide the password properly";
            }
        } 
        else
        {

            echo "Please fill the values properly1";
        }

    }
    else
    {

        echo "Please fill the values properly2";
    }

}

?>