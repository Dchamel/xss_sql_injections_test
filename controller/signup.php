<?php
    session_start();

    require_once 'connect.php';
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    
    if (($login != '') && ($pass != '')) {

//        $creation_time = date('H:i:s d-m-Y');
        
        $query = "INSERT INTO `users` (`id`, `login`, `pass`, `creation_time`) VALUES ('NULL', '$login', '$pass', now())";
        mysqli_query($connect_db, $query);
        
        $_SESSION['msg'] = "User - $login was Succesfully registered.";
        header('Location: ../index.php');
    }
    else {
        $_SESSION['msg'] = 'Empty field detected';      
        header('Location: ../register.php');
    }
?>