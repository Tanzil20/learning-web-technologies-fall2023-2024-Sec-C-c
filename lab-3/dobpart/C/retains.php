<?php
    $date = $mnth = $year = '';
    if(isset($_POST['submit'])){
        $date = $_POST['date'];
        $mnth = $_POST['month'];
        $year = $_POST['year'];
        echo "Date: {$date}/{$mnth}/{$year}";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<fieldset>
        <form action="" method="post">
            <legend>Date of Birth</legend>
            &nbsp; dd &nbsp; &nbsp; &nbsp; mm   &nbsp;yyyy <br>
            <input type="text" name="date" value="<?php echo $date ?>" id="" size="1"> /
            <input type="text" name="month" value="<?php echo $mnth ?>" id="" size="1"> /
            <input type="text" name="year" value="<?php echo $year ?>" id="" size="1">
            <hr>
            <input type="submit" value="submit" name="submit">
        </form>
    </fieldset>
</body>
</html>