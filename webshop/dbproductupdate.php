<?php
$productid = $_POST['productid'];
$productnaam = $_POST['productnaam'];  
$productprijs = $_POST['productprijs'];

try {
    $conn = new PDO("mysql:host=localhost;dbname=webshopdb", "root", ""); 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement = $conn->prepare('UPDATE producten SET naam=:fnaam, prijs=:fprijs WHERE id = :fproductid'); 

    $statement->execute([
        'fnaam' => $productnaam,
        'fprijs' => $productprijs,
        'fproductid' => $productid
    ]);


}

catch(PDOException $e) {
    echo "Connection failed ".$e->getMessage();
}

$conn = NULL;

header("Location: index.php");

?>