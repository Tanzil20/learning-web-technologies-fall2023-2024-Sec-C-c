<?php
include_once '../model/database.php';
include_once '../model/datafieldmodel.php';  
include_once '../model/session.php'; 

$result = '';
$form_errors = array();

if (isset($_POST['Delete'])) {
    $job_id = $_POST['job_id']; 
    
       
$required_fields = array('job_id');    
$form_errors = array_merge($form_errors, check_empty_fields($required_fields));


if(empty($form_errors)){

    
    try {
        $sqlDelete = "DELETE FROM careers WHERE job_id = :job_id";

        $statement = $db->prepare($sqlDelete);
        $statement->execute(array(':job_id' => $job_id));

        if ($statement->rowCount() == 1) {
            $result = "<p style='color: green'><b>Delete Success</b></p>";
        } else {
            $result = "<p style='color: red'><b>.No record found for the given job opportunity number</b></p>";
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
    <title>Delete Career</title>
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
    <form action="delete_career.php" method="post">
        <fieldset>
            <legend><b>Delete Career</b></legend>
            <br />
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td>Job opportunity No</td>
                    <td>:</td>
                    <td><input name="job_id" type="number"></td> <!-- Use the correct input name -->
                </tr>
            </table>
            <hr />
            <input type="Submit" name="Delete" value="Submit">
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