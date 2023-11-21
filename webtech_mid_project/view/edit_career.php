<?php

include_once '../model/database.php';
include_once '../model/datafieldmodel.php';  
include_once '../model/session.php'; 

$result = '';
$form_errors = array();

if (isset($_POST['Edit'])) { // Change 'Add' to 'Edit'

    $job_id = $_POST['job_id'];
    $title = $_POST['jobtitle'];
    $job = $_POST['jobdetails'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    $required_fields = array('job_id','jobtitle','jobdetails','day','month','year',);    
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    if(empty($form_errors)){
    try {

        $sqlUpdate = "UPDATE careers SET job_title = :job_title, job_detail = :job_detail, day = :day, month = :month, year = :year WHERE job_id = :job_id";

        $statement = $db->prepare($sqlUpdate);

        $statement->execute(array(':job_id' => $job_id, ':job_title' => $title, ':job_detail' => $job, ':day' => $day, ':month' => $month, ':year' => $year));

        if ($statement->rowCount() == 1) {

            $result = "<p style='color: green'><b>Update Success</b></p>";
        } else {
            $result = "<p style='color: red'><b>No record found for the given job opportunity number</b></p>";
        }
    } catch (PDOException $ex) {

        $result = "<p> An Error Occurred: " . $ex->getMessage() . " </p";
    }
    
}else{
    if(count($form_errors) == 1){
        $result = "<p style='color: red;'> There was 1 error in the form<br>";
    }else{
        $result = "<p style='color: red;'> There were " .count($form_errors). " errors in the form <br>";
    }
}
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Career</title>
</head>

<body>
    <fieldset>
        <legend>
            <h2>Career Panel</h2>
        </legend>
        <pre>
            <a href="add_career.php"><u>Add Career</u></a>
            <a href="edit_career.php"><u>Edit Career</u></a>
            <a href="delete_career.php"><u>Delete Career</u></a>
            <a href="faq.php"><u>FAQ</u></a>
        </pre>
    </fieldset>
    <form action="" method="post">
        <fieldset>
            <legend><b>Edit Career</b></legend>
            <br />
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td>Job opportunity No</td>
                    <td>:</td>
                    <td><input name="job_id" type="number"></td>
                </tr>
                <tr>
                    <td>Job title</td>
                    <td>:</td>
                    <td><input name="jobtitle" type="text"></td>
                </tr>
                <tr>
                    <td>Job details</td>
                    <td>:</td>
                    <td><input name="jobdetails" type="text"></td>
                </tr>
                <tr>
                    <td>Deadline</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="day" size="2" /> /
                        <input type="text" name="month" size="2" /> /
                        <input type="text" name="year" size="4" />
                        <span size="2"><i>(dd/mm/yyyy)</i></span>
                    </td>
                </tr>
            </table>
            <hr />
            <input type="Submit" name="Edit" value="Submit"> <!-- Change 'Add' to 'Edit' -->
        </fieldset>
        <?php
        echo $result;
        ?>
    </form>
    <?php 
        if(!empty($form_errors)) echo "<p>Status:</p>";
        if(!empty($form_errors)) echo show_errors($form_errors);
        // var_dump($_SESSION);
         ?>
</body>

</html>