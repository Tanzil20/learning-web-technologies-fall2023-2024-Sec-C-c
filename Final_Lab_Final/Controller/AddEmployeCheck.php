<?php
require_once('../model/AdminModel.php');

if (isset($_POST['submit'])) {

    if (isset($_POST['empName']) && isset($_POST['contactNo']) && isset($_POST['userName']) && isset($_POST['password']))
    {
        
        $percelName = $_POST['empName'];
        $percelType = $_POST['contactNo'];
        $percelType = $_POST['userName'];
        $percelType = $_POST['password'];

        addEmployee($empName, $contactNo, $userName, $password);
    }
} else {
    echo 'Invlaid';
}

?>