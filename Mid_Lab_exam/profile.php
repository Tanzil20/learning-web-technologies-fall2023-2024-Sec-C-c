<?php
    session_start();
    if(!isset($_SESSION['logged_in']) ) header('location: login.php');
    if(!isset($_GET['name'])) header('location: login.php');
    $name = $_GET['name'];

    $con = mysqli_connect('localhost', 'root', '', 'Exam');

    $sql = "SELECT * FROM signup where name='$name';";
    $res = mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($res);

    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
</head>
<body>

    <fieldset>
        <table>
            <tr>
                    <fieldset>
                        <table>
                            <?php
                                if($user['type'] == 'Admin'){
                                    ?>
									<?php	header('location: admin_home.php');?>

                                    <?php
                                }
                                else if($user['type'] == 'User'){
                                    ?>
										<?php	header('location: user_home.php');?>
                                    <?php
                                }
                            ?>
                        </table>
                            
                    </fieldset>
                </td>

                <td width="20"> </td>
                <td width="20"> </td>
                </td>
            </tr>
        </table>
    </fieldset>

    <a href="logout.php">Logut</a>
    
</body>
</html>