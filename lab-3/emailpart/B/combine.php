<?php
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        echo "your email is " . $email;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combine</title>
</head>
<body>
<fieldset>
        <legend>EMAIL</legend>
        Email <br>
        <form action="" method="post">
            <input type="text" name="email"> 
            <input type="submit"  value="i" title="hint: example@example.com">
            <br>
            <input type="submit" name="submit" value="submit" id="">
        </form>
    </fieldset>
</body>
</html>