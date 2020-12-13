<?php
//    There will be different types of connection to the DB from old to new

//    Change this to connect to Your DB
    $host = '127.0.0.1';
    $db_name = 'test1';
    $user = 'Dchamel';
    $pass = '123';

//    1. First type (procedural)
//    $connect_db = mysqli_connect($host, $user, $pass, $db_name);
//    !$connect_db ? die ('Error connect to the "test" Database.') : '';
    
//    2. Second type (Object-Oriented Interface(obj))
    $connect_db = new mysqli($host, $user, $pass, $db_name);
    $connect_db->connect_errno ? print('Error connect to the "test" Database.'.$connect_db->connect_error) : '';
    
//    Connection trough PDO
//    $dsn = 'mysql:host=127.0.0.1;dbname=test';
//    $connect_db = new PDO($dsn, 'Dchamel', '123');
    
?>