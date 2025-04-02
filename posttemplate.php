<?php
$Json = file_get_contents('json/posts.json');
$Data = json_decode($Json, true);
$Id = $_GET['id'];
$posts = $Data[$Id];

foreach ($posts as $Data) {
    require("postpattern.php");
}
