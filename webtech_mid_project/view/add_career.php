<?php 
 
include_once '../model/database.php';
include_once '../model/datafieldmodel.php';  
include_once '../model/session.php'; 

?>

<?php
    $result='';
    $form_errors = array();

   

	if(isset($_POST['Add'])){

        $title      = $_POST['jobtitle'];		
        $job        = $_POST['jobdetails'];		
		$day        = $_POST['day'];
		$month      = $_POST['month'];
		$year       = $_POST['year'];



    
        
 
$required_fields = array('jobtitle','jobdetails','day','month','year',);    
$form_errors = array_merge($form_errors, check_empty_fields($required_fields));



if(empty($form_errors)){


        try {

            $sqlInsert = "INSERT INTO careers (job_title,job_detail	,day,month,year)
            VALUES (:job_title, :job_detail, :day, :month, :year)";
        
            $statement = $db->prepare($sqlInsert);
        
            $statement->execute(array(':job_title'=>$title ,':job_detail'=> $job, ':day' => $day, ':month'=> $month, 'year'=> $year,));
        
            if ($statement->rowCount()==1) {
        
                $result= "<p style='color:Green'><b>Registration Success</b></p>";
                
            }
                
            } catch (PDOException $ex) {
        
                 $result=  "<p> An Error Occured:".$ex->getMessage()." </p>";
                  
            }
}else{
    if(count($form_errors) == 1){
        $result = "<p style='color: red;'> There was 1 error in the form<br>";
    }else{
        $result = "<p style='color: red;'> There were " .count($form_errors). " errors in the form <br>";
    }
}
        
		

	}else{
		// echo 'not pressed';
	}

    $_SESSION['reg_result'] = $result;
$_SESSION['reg_form_error'] = $form_errors;

?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Career</title>
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
            <legend><b>Add Career</b></legend>
            <br />
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td>Job title</td>
                    <td>:</td>
                    <td><input name="jobtitle" type="text" /></td>
                    <td>
                        <?php 
                    if(isset($_SESSION['form_error'][0])) {        
                    echo ($_SESSION['form_error'][0]);                 
                    }                
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>Job details</td>
                    <td>:</td>
                    <td><input name="jobdetails" type="text" /></td>
                    <td>
                        <?php 
                    if(isset($_SESSION['form_error'][1])) {        
                    echo ($_SESSION['form_error'][1]);                 
                    }                
                    ?>
                    </td>
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
                    <td>
                    </td>
                </tr>
            </table>
            <hr />
            <input type="submit" name="Add" value="submit" />
        </fieldset>
        <?php
        echo $result;
        ?>


        <?php 
        if(!empty($form_errors)) echo "<p>Status:</p>";
        if(!empty($form_errors)) echo show_errors($form_errors);
        // var_dump($_SESSION);
         ?>
    </form>
</body>

</html>