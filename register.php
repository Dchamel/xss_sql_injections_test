<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Authorization form</title>
        <link rel="stylesheet" href="assets/css/main.css">
    </head>
    <body>
        <form class="title" action="controller/signup.php" method="post">
            <fieldset>
                <legend>Registration form</legend>
                <p><input type="text" name="login" placeholder="Enter your login"></p>
                <p><input type="text" name="pass" placeholder="Enter your password"></p>
                <button type="submit">Enter</button>
                <p><a href="index.php">Back to Login</a></p>
            </fieldset>
        </form>
        
        <?php 
            if(isset($_SESSION['msg'])) {
                echo '<p class="msg">'.$_SESSION['msg'].'</p>';
            }
            unset($_SESSION['msg']);
                
        ?>
        
    </body>
</html>