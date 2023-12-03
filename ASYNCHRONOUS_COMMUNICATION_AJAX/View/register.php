<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        div{
            justify-content: space-between;
        }
        div input{
            align-items: center;
            padding: 10px;
            display: flex;
            font-size: 15px;
        }
        div label{
            align-items: center;
            padding: 20px;
        }
    </style>
    <title>Register</title>
</head>
<body>
    <form action="../controller/registraioncheck.php" method="POST" >

        <div id="maiDIv">
            <div>Registration Panel</div>
            <div>
                <label for="">Name</label>
                <input type="text" name="name" id="">
            </div>
            <div>
                <label for="">Phone Number</label>
                <input type="number" name="phnNumber" id="">
            </div>
            <div>
                <label for="">Email</label>
                <input type="email" name="email" id="">
            </div>
            <div>
                <label for="">Password</label>
                <input type="text" name="password" id="">
            </div>
            <div>
                <label for="">Re-Password</label>
                <input type="text" name="repassword" id="">
            </div>
            <div>
                <input type="submit" name="submit" id="" value="SUBMIT VALUE">
            </div>
        </div>

    </form>
</body>
</html>