<?php
$id = $_GET['id'];  
try {
    $conn = new PDO("mysql:host=localhost;dbname=webshopdb", "root", ""); 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement = $conn->prepare('DELETE FROM producten WHERE id = :fid'); 

    $statement->execute([
        'fid' => $id
    ]);


}

catch(PDOException $e) {
    echo "Connection failed ".$e->getMessage();
}

$conn = NULL;

header("Location: index.php");

?>