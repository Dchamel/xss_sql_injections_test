<?php
    session_start();

    require_once 'connect.php';
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    
    if (($login != '') && ($pass != '')) {  
//        for direct query proc or obj
//        $query = "SELECT * FROM users WHERE login = '$login' AND pass = '$pass'";
        
//        for prep state
        $query = "SELECT * FROM users WHERE login = ? AND pass = ?";
        
//        proc
//        $result = mysqli_query($connect_db, $query);

//        object
//        $result = $connect_db->query($query);
        
//        prep state
        $result = $connect_db->prepare($query);
        $result->bind_param('ss', $login, $pass);
        $result->execute();
//        $result->close();
//        proc 
//        $check_user = mysqli_fetch_assoc($result); 

//        object
//        $check_user = $result->fetch_assoc();
        
//        object for PS(fetch_assoc won`t work in this case)
        $check_user = $result->fetch();
        
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