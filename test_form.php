<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    echo $_SERVER['PHP_SELF'];
    echo '<br>';
    echo htmlentities($_SERVER['PHP_SELF']);
?>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
    <fieldset style="width: 2htmlentities30px;">
        <legend>Животоне</legend>
        <label for="dog">
        <input type="checkbox" id="dog" name="animal[]" value="Собака">
            Собака
        </label>
        <label for="upachka">
        <input type="checkbox" id="upachka" name="animal[]" value="Упячка">
            Упячка
        </label>
        <label for="cat">
        <input type="checkbox" id="cat" name="animal[]" value="Кошак">
            Кошак
        </label>
    </fieldset>
    <input type="submit" value="Послать Нах">

</form>
<?php
    $animal = isset($_POST['animal']) ? $_POST['animal'] : '';
    if (!empty($animal)) {
        echo '<br>Выбрано: ';
        foreach ($animal as $i) {
            echo '<span style="color: red"> '.htmlentities($i).'</span>';
        }
    }
?>

    <form name="lala" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        
    </form>
    
    <?php 
    $a = 'fa"q mazafaka';
    echo addslashes($a);
    ?>
</body>
</html>