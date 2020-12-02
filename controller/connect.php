<?php
    
//    Change this to connect to Your DB
    $connect_db = mysqli_connect('127.0.0.1', 'Dchamel', '123', 'test1');
    
    if (!$connect_db) {
        die ('Error connect to the "test" Database.');
    }
?>