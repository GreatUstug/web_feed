<!DOCTYPE html>
<?php

    require_once('validation.php');
    
    $json = file_get_contents('json/posts.json');
    $data = json_decode($json, true);

    $id = isset($_GET['id']) ? $_GET['id'] : null;
    if ((!is_numeric($id)) or ($id === null) or (!array_key_exists($id, $data))){
        echo"<h1>Ой, а вы id пользователя не указали, поэтому ошибка произошла ;c</h1>";
        exit;
    }else{
        require_once("posttemplate.php");
    }        
?>

<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Посты</title>
    </head>
    <body>
    </body>
</html>