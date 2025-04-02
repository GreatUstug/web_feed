<?php
    $json = file_get_contents('json/posts.json');
    $data = json_decode($json, true);
    $id = $_GET['id'];
    $posts = $data[$id];

    foreach($posts as $data) {
        require("postpattern.php");
    }
?>