<?php
    try{
        $conn = new PDO("mysql:host=localhost;dbname=blog", "root", "");
        $sql = "SELECT * FROM Users";
        $result = $conn->query($sql);
        echo "<table><tr><th>Id</th><th>Name</th><th>surname</th></tr>";
        while($row = $result->fetch()){
            echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["first_name"] . "</td>";
                echo "<td>" . $row["sur_name"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    catch(PDOException $e){
        echo "Database error: " . $e->getMessage();
    }
    
?>