<?php
   if(isset($_POST['submit'])){
        $gender = $_POST['gender'];
        echo "your gender is " . $gender;
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
<form action="" method="post">
        <fieldset>
            <legend>Gender</legend>
            <input type="radio" name="gender" id="" value="Male"> Male
            <input type="radio" name="gender" id="" value="Female"> Female
            <input type="radio" name="gender" id="" value="Other"> Other
        </fieldset>
        <input type="submit" name="submit" value="submit" id="">
    </form>
</body>
</html>