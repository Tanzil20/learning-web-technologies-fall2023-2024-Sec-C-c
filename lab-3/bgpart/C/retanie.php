<?php
    $group = '';
    if(isset($_POST['submit'])){
        $group = $_POST['group'];
        echo "Your Blood group is {$group}";
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
        Blood Group &nbsp;
        <select name="group" id="" >
            <option value="A+" <?php if($group=='A+') echo 'selected' ?>>A+</option>
            <option value="A-" <?php if($group=='A-') echo 'selected' ?>>A-</option>
            <option value="AB+" <?php if($group=='AB+') echo 'selected' ?>>AB+</option>
            <option value="B+" <?php if($group=='B+') echo 'selected' ?>>B+</option>
            <option value="B-" <?php if($group=='B-') echo 'selected' ?>>B-</option>
        </select>
        <hr>
        <input type="submit" value="submit" name="submit" id="">
    </form>
</body>
</html>