<?php

$usernameError = $passwordError = $loginError = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!preg_match('/^[a-zA-Z0-9._-]{2,}$/', $username)) {
        $usernameError = "Invalid Username. It must contain at least two alphanumeric characters, periods, dashes, or underscores.";
    }


    if (strlen($password) < 8 || !preg_match('/[@#$%]/', $password)) {
        $passwordError = "Invalid Password. It must be at least eight characters long and contain one of the special characters (@, #, $, %).";
    }

    $validUsername = 'user123';
    $validPassword = 'password@123';

    if ($username === $validUsername && $password === $validPassword) {
        // Successful login
        echo "Login successful!";

    } else {
        $loginError = "Invalid credentials. Please try again.";
    }
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
<legend><h1>LOGIN</h1></legend>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  


  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required> <br>
    <span class="error"><?php echo $usernameError; ?></span>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required><br>
    <span class="error"><?php echo $passwordError; ?></span>
        
    <label>
    <span class="error"><?php echo $loginError; ?></span>
        <br><br>
    <input type="checkbox" checked="checked" name="remember"> Remember me<br>
    </label>
    <button type="submit" value="login">Submit</button>
    
    <span class="psw">Forgot <a href="task2.php">password?</a></span>
  </div>

 

 
</form>

</fieldset>

</body>
</html>
