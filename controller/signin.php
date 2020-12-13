<?php
    session_start();

    require_once 'connect.php';
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    
    if (($login != '') && ($pass != '')) {  
        $query = "SELECT * FROM users WHERE login = '$login' AND pass = '$pass'";
        
//        proc
//        $result = mysqli_query($connect_db, $query);

//        object
        $result = $connect_db->query($query);

//        proc 
//        $check_user = mysqli_fetch_assoc($result); 

//        object
        $check_user = $result->fetch_assoc();
        
        if ($check_user) {
            $_SESSION['username'] = $login;
            $_SESSION['creation_time'] = $check_user['creation_time'];
            header('Location: ../news.php');    
        }
        else {
            $_SESSION['msg'] = "Wrong Password or<br>user - $login don't exist.";
            header('Location: ../index.php');
        }     
    }
    else {
        $_SESSION['msg'] = 'Empty field detected';
        header('Location: ../index.php');
    }
?>