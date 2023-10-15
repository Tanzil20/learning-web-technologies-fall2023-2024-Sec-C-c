<?php

$currentPasswordError = $newPasswordError = $retypePasswordError = $matchError = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $currentPasswordInput = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $retypeNewPassword = $_POST['retype_new_password'];

   

    $currentPassword = 'user123';
 
    if ($currentPasswordInput !== $currentPassword) {
        $currentPasswordError = "Current Password is incorrect";
    }


    if ($newPassword === $currentPassword) {
        $newPasswordError = "New Password should not be the same as the Current Password";
    }

    if ($newPassword !== $retypeNewPassword) {
        $retypePasswordError = "Retyped Password does not match the New Password";
    }

    if (empty($currentPasswordError) && empty($newPasswordError) && empty($retypePasswordError)) {
        echo "Password change validation successful!";
        
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
<legend><h2>CHANGE PASSWORD</h2></legend>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
   

  <div class="container">
    <label for="uname"><b>Current Password: </b></label>
    &nbsp &nbsp &nbsp &nbsp &nbsp<input type="text" placeholder="" name="current_password" required> <br>
    <span class="error"><?php echo $currentPasswordError; ?></span>
    <label for="psw"><b>New Password:</b></label>
    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type="password" placeholder="" name="new_password" required><br>
    <span class="error"><?php echo $newPasswordError; ?></span>
    
    <label for="psw"><b> Retype New Password:</b></label>
    <input type="password" placeholder="" name="retype_new_password"><br>
    <span class="error"><?php echo $retypePasswordError; ?></span>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me<br>
    </label>
    <button type="submit">Submit</button>
 
  </div>

 

 
</form>

</fieldset>
</body>
</html>