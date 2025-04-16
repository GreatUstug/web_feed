<!DOCTYPE html>
<?php

require_once('validation.php');

$Json = file_get_contents('json/posts.json');
$Data = json_decode($Json, true);

$Id = isset($_GET['id']) ? $_GET['id'] : null;
if ((!is_numeric($Id)) or ($Id === null) or (!array_key_exists($Id, $Data))) {
    $id = 1;
    $posts = $Data[$id];
    foreach ($posts as $Data) {
        require("postpattern.php");
    }
} else {
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