<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script>
        function checkEmailAvailability() {
            var email = document.getElementById('email').value;
            var xhr = new XMLHttpRequest() || new ActiveXObject("Microsoft.XMLHTTP");

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        document.getElementById('emailAvailabilityMessage').innerHTML = xhr.responseText;
                    }
                }
            };

            xhr.open('GET', '../controller/check_email.php?email=' + email, true);
            xhr.send();
        }
    </script>
</head>
<body>
    <h2>Login</h2>
    <form action="../controller/login_process.php" method="post">
        Email: <input type="text" name="email" id="email" onblur="checkEmailAvailability()">
        <span id="emailAvailabilityMessage"></span><br><br>
        Password: <input type="password" name="password"><br><br>
        <input type="submit" value="Login">
        <button><a href="register.php">Registration</a></button>
    </form>
</body>
</html>
