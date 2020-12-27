<?php 
    session_start();
//    header("Content-Type: text/html; charset=utf-8");
    
    require_once 'controller/connect.php';
    
//    Create table. I made it only for testing SQL_Injections 
//    through Search field on different DB versions
//    Tested versions:
//    MariaDB 5.5, MySQL 5.5 (& x64), 5.6, 5.7, 8.0 x64 (table creation - OK)
//    In versions 5.7 and 8.0 user data won`t write down to the DB
//    For what purpose did I do all this ?
//    - To see for myself if there are any "pitfalls".

    $query_db_create_users = "CREATE TABLE IF NOT EXISTS users("
            . "id INT(11) PRIMARY KEY AUTO_INCREMENT,"
            . "login VARCHAR(100),"
            . "pass VARCHAR(100),"
            . "creation_time DATETIME"
            . ") CHARACTER SET utf8 COLLATE utf8_general_ci";
    
    $query_db_create_news = "CREATE TABLE IF NOT EXISTS news("
            . "id INT(11) AUTO_INCREMENT PRIMARY KEY,"
            . "title VARCHAR(300),"
            . "content VARCHAR(1000),"
            . "creation_time DATETIME"
            . ") CHARACTER SET utf8 COLLATE utf8_general_ci";
    
    $connect_db->query($query_db_create_users) ? print '<div>Table Users - OK</div>' : print $connect_db->error.'</br>';
    $connect_db->query($query_db_create_news) ? print '<div>Table News - OK</div>' : print $connect_db->error.'</br>';
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Authorization form</title>
        <link rel="stylesheet" href="assets/css/main.css">
    </head>
    <body>
        <form class="title" action="controller/signin.php" method="post">
            <fieldset>
                <legend>Authorization</legend>
                <p><input class="auth" type="text" name="login" placeholder="Enter your login"></p>
                <p><input class="auth" type="text" name="pass" placeholder="Enter your password"></p>
                <button type="submit">Enter</button>
                <p><a href="register.php">Register new member</a></p>
            </fieldset>
        </form>
        
        <!--session msg-->
        <?php 
            if(isset($_SESSION['msg'])) {
                echo '<p class="msg">'.$_SESSION['msg'].'</p>';
            }
            unset($_SESSION['msg']);
                
        ?>
        
        <!--Search-->
        <form class="search" action="" method="get">
            <p><input class="search" type="text" name="search" placeholder="Enter word for search news and press Enter"></p>
        </form>
        
        <!--news-->
        <?php 
            echo '<h2>News Time</h2>';
            
            $search_request = $_GET['search'];

//            this two functions changing/deleting dangerous sequences from Search input
//            Bouth of the are the same except that 
//            
//            htmlentities() convert all applicable characters to HTML entitie
//            htmlspecialchars() convert special characters to HTML entities
//
//            For compare made simple test
//            what will get to the DB after this functions from symbols
//            First string without anything, second - htmlentities(), third - htmlspecialchars()
//            ` ~ ! @ # $ % ^ &     * ( ) _ + = - ; '      \ "      : | , . / <    >    ?
//            ` ~ ! @ # $ % ^ &amp; * ( ) _ + = - ; &#039;   &quot; : | , . / &lt; &gt; ?
//            ` ~ ! @ # $ % ^ &amp; * ( ) _ + = - ; &#039;   &quot; : | , . / &lt; &gt; ?
//            
//            With HTML tags both functions doing the same:
//            <a> - &lt;a&gt;
//            <body> - &lt;body&gt;
//            
//            It's better to use both of this functions for output data.
//
//            $search_request = htmlentities($_GET['search'], ENT_QUOTES, 'UTF-8');
//            $search_request = htmlspecialchars($_GET['search'], ENT_QUOTES, 'UTF-8');
            
            if(isset($search_request)) {
                $query = "SELECT * FROM news WHERE title LIKE '%$search_request%' OR content LIKE '%$search_request%'";

//                proc
//                $result = mysqli_query($connect_db, $query);

//                obj
                $result = $connect_db->query($query);

//                proc
//                if (mysqli_num_rows($result)) {

//                obj
                if ($result -> num_rows) {

//                    proc  
//                    while ($news_arr = mysqli_fetch_assoc($result)) {
                      
//                      obj
                    while ($news_arr = $result->fetch_assoc()) {
                        echo '<div class="news_view">';
                        echo '<h3>'.$news_arr['title'].'</h3>';
                        echo '<p>'.$news_arr['content'].'</p>';
                        echo '<p class="news_time">'.$news_arr['creation_time'].'</p>';
                        echo '<br></div>';
                    }
                }
                else {
                    echo '<h3>No results for "'.$search_request.'" </h3>';
                }
            }
            else {
                $query = "SELECT * FROM news";

//                procedural(proc)
//                $result = mysqli_query($connect_db, $query);

//                Object-Oriented Interface(obj)
                $result = $connect_db->query($query);

//                proc
//                while ($news_arr = mysqli_fetch_assoc($result)) {

//                obj
                while ($news_arr = $result->fetch_assoc()) {
                    echo '<div class="news_view">';
                    echo '<h3>'.$news_arr['title'].'</h3>';
                    echo '<p>'.$news_arr['content'].'</p>';
                    echo '<p class="news_time">'.$news_arr['creation_time'].'</p>';
                    echo '<br></div>';
                }
            }
        ?>
        
    </body>
</html>