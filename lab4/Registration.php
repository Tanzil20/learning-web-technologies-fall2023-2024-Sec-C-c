<?php
// Initialize variables to store user data and validation messages
$username = $name = $email = $password = $confirmPassword = $gender = $dob = '';
$usernameError = $nameError = $emailError = $passwordError = $confirmPasswordError = $genderError = $dobError = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];

    // Validation for username
    if (!preg_match('/^[a-zA-Z0-9._-]{2,}$/', $username)) {
        $usernameError = "Invalid Username. It must contain at least two alphanumeric characters, periods, dashes, or underscores.";
    }

    // Validation for name
    if (empty($name)) {
        $nameError = "Name is required.";
    }

    // Validation for email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid Email address.";
    }

    // Validation for password
    if (strlen($password) < 8) {
        $passwordError = "Password must be at least eight characters long.";
    }

    // Validation for confirm password
    if ($password !== $confirmPassword) {
        $confirmPasswordError = "Passwords do not match.";
    }

    // Validation for gender
    if (empty($gender)) {
        $genderError = "Please select a gender.";
    }

    // Validation for date of birth
    if (empty($dob)) {
        $dobError = "Date of Birth is required.";
    }

    // If all validations pass, you can process the registration here
    // ...
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>
<body>
    <fieldset>
<legend><h4>Registration</h4></legend>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Username: <input type="text" name="username" value="<?php echo $username; ?>">
        <span class="error"><?php echo $usernameError; ?></span>
        <br><br>
        Name: <input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error"><?php echo $nameError; ?></span>
        <br><br>
        Email: <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error"><?php echo $emailError; ?></span>
        <br><br>
        Password: <input type="password" name="password">
        <span class="error"><?php echo $passwordError; ?></span>
        <br><br>
        Confirm Password: <input type="password" name="confirm_password">
        <span class="error"><?php echo $confirmPasswordError; ?></span>
        <br><br>
      <fieldset><legend>  Gender:</legend> 
        <input type="radio" name="gender" value="male" <?php if ($gender === "male") echo "checked"; ?>> Male
        <input type="radio" name="gender" value="female" <?php if ($gender === "female") echo "checked"; ?>> Female
        <input type="radio" name="gender" value="other" <?php if ($gender === "other") echo "checked"; ?>> Other
        <span class="error"><?php echo $genderError; ?></span>
        <br><br>
</fieldset>
     <fieldset><legend>   Date of Birth</legend><br> <input type="date" name="dob" value="<?php echo $dob; ?>">
        <span class="error"><?php echo $dobError; ?></span>
        <br><br></fieldset><br>
        <input type="submit" name="submit" value="Submit">
        <input type="reset" name="reset" value="Reset">
    </form>
</fieldset>
</body>
</html>
