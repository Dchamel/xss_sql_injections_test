<?php
    session_start();

    require_once 'connect.php';
    $title = $_POST['title'];
    
    $content = $_POST['content'];
//    $content = htmlentities($_POST['content'], ENT_QUOTES, 'UTF-8');
//    $content = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');
    
    if (($title != '') && ($content != '')) {

//        $creation_time = date('H:i:s d-m-Y');
        
        $query = "INSERT INTO `news` (`id`, `title`, `content`, `creation_time`) VALUES ('NULL', '$title', '$content', now())";
        mysqli_query($connect_db, $query);
        
        $_SESSION['msg'] = "Thr news successfully added .";
        header('Location: ../news.php');
    }
    else {
        $_SESSION['msg'] = 'Empty field detected';      
        header('Location: ../news.php');
    }
?>
