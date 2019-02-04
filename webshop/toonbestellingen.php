<?php

try {
    $conn = new PDO("mysql:host=localhost;dbname=webshopdb", "root", ""); 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement = $conn->query("SELECT * FROM bestellingen"); 
    while ($row = $statement->fetch()) {
        echo "<LI>" . $row['id'] . " :  ". $row['email'];
        echo " " . $row['productid'] . " " . $row['prijs'] . "</LI>";
    }
}

catch(PDOException $e) {
    echo "Connection failed ".$e->getMessage();
}

$conn = NULL;

?>
