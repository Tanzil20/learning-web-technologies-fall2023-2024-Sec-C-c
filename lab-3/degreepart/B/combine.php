<?php
    if(isset($_POST['submit'])){
        $ssc = $hsc = $bsc = $msc = '';
        if(isset($_POST['ssc'])) $ssc = $_POST['ssc'];
        if(isset($_POST['hsc'])) $hsc = $_POST['hsc'];
        if(isset($_POST['bsc'])) $bsc = $_POST['bsc'];
        if(isset($_POST['msc'])) $msc = $_POST['msc'];

        echo "Your degree(s) are {{$ssc} {$hsc} {$bsc} {$msc}}";
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
            <legend>Degree</legend>
            <input type="checkbox" name="ssc" value="SSC" size="1"> SSC
            <input type="checkbox" name="hsc" value="HSC" size="1"> HSC
            <input type="checkbox" name="bsc" value="BSc" size="1"> BSc
            <input type="checkbox" name="msc" value="MSc" size="1"> MSc
        </fieldset>
        <input type="submit" name="submit" value="submit" id="">
    </form>
</body>
</html>