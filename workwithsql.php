<?php
    try{
        $conn = new PDO("mysql:host=localhost;dbname=blog", "root", "");
        $sql = "SELECT * FROM Users";
        $result = $conn->query($sql);
        echo "<table><tr><th>Id</th><th>Name</th><th>surname</th></tr>";
        while($data = $result->fetch()){
            require("sqlpost.php");
        }
    }
    catch(PDOException $e){
        echo "Database error: " . $e->getMessage();
    }
?>