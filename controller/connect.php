<?php
//    $connect = new mysqli("localhost", "dchamel", "123", "test");
//    $connect->query("SET NAMES 'utf8");
//
//    if ($_POST['login'] && $_POST['pass']) {
//        $login = $_POST['login'];
//        $pass = $_POST['pass'];
//        echo $login.' '.$pass;
//    }

    $connect_db = mysqli_connect('127.0.0.1', 'Dchamel', '123', 'test1');
    
    if (!$connect_db) {
        die ('Error connect to the "test" Database.');
    }
?>