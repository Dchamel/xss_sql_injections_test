<?php
    session_start();
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
    $username=='' ? header('Location: index.php') : '';
    require_once 'controller/connect.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Panel for News</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="assets/css/main.css">
    </head>
    <body>
        <form class="news" action="controller/news_controller.php" method="post">
            <fieldset>
                <legend>Add news</legend>
                <p style="line-height: 0.1;">Title:</p>
                <p><textarea class="title" name="title" placeholder="Enter your title" required></textarea></p>
                <p style="line-height: 0.1;">News text:</p>
                <p><textarea class="content" name="content" placeholder="Enter your content here" required></textarea></p>
                <button type="submit">Add news</button>
            </fieldset>
        </form>
        
        <!--session msg-->
        <?php 
            if(isset($_SESSION['msg'])) {
                echo '<p class="msg_news">'.$_SESSION['msg'].'</p>';
            }
            unset($_SESSION['msg']);      
        ?>
        
        <!--news-->
        <?php 
            require_once 'controller/connect.php';
            
            echo '<h2>News Time</h2>';
            
            $query = "SELECT * FROM news";
            $result = mysqli_query($connect_db, $query);
            while ($news_arr = mysqli_fetch_assoc($result)) {
                echo '<div class="news_view">';
                echo '<h3>'.$news_arr['title'].'</h3>';
                echo '<p>'.$news_arr['content'].'</p>';
                echo '<p class="news_time">'.$news_arr['creation_time'].'</p>';
                echo '<br></div>';
            }
        ?>
        
    </body>
</html>