<?php
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
<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
<body>
    <fieldset>
        <form action="" method="post">
            <legend>Date of Birth</legend>
            &nbsp; dd &nbsp; &nbsp; &nbsp; mm   &nbsp;yyyy <br>
            <input type="text" name="date" id="" size="1"> /
            <input type="text" name="month" id="" size="1"> /
            <input type="text" name="year" id="" size="1">
            <hr>
            <input type="submit" value="submit" name="submit">
        </form>
    </fieldset>
</body>
</html>

</body>
</html>