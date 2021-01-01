<?php
    session_start();

    require_once 'connect.php';
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    
    if (($login != '') && ($pass != '')) {
        
//        All works on versions: MariaDB 5.5, MySQL 5.5 (& x64), 5.6, 8.0

//        $creation_time = date('H:i:s d-m-Y');
        
        $query = "INSERT INTO `users` (`login`, `pass`, `creation_time`) VALUES ('$login', '$pass', now())";
        if ($connect_db->query($query)) {
            $_SESSION['msg'] = "User - $login was Succesfully registered.";
            header('Location: ../index.php');
        }
        else {
            $_SESSION['msg'] = $connect_db->error;
            header('Location: ../index.php');
        }
        
    }
    else {
        $_SESSION['msg'] = 'Empty field detected';      
        header('Location: ../register.php');
    }
?>