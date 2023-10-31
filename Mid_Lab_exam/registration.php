<?php

$err = false;
    if(isset($_GET['err'])){
        $err = true;
    }

?>
<center>
<form method="POST" action="signup_process.php">
	<table border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td>
				<fieldset>
					<legend><h3>REGISTRATION</h3></legend>
					Id<br/><input type="text" name="id"><br/>
					Password<br/><input type="password" name="password"><br/>
					Confirm Password<br/><input type="password" name="confrimpassword"><br/>
					Name<br/><input type="text" name="name"><br/>
					User Type<hr/>
					<select id="role" name="role" required>
                            <option value="User">USER</option>
                            <option value="Admin">ADMIN</option>
                        </select>
					<hr/>
					<input type="submit" name="submit"value="Sign Up">
					<a href="login.php">Sign In</a>
				</fieldset>
			</td>
		</tr>                                
	</table>
</form>
</center>
		