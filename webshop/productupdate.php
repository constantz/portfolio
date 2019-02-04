<html>

<?php
    $productid = $_GET['id'];

    try {
        $conn = new PDO("mysql:host=localhost;dbname=webshopdb", "root", ""); 
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $statement = $conn->query("SELECT * FROM producten WHERE id =" . $productid); 
        while ($row = $statement->fetch()) {
            $productnaam = $row['naam'];
            $productprijs = $row['prijs'];
        }
    }

    catch(PDOException $e) {
        echo "Connection failed ".$e->getMessage();
    }

    $conn = NULL;

?>

<form action = "dbproductupdate.php" method="POST">
    <input id="productid" type="number" name="productid" value="<?php echo $productid ?>">
    <input id="productnaam" type="text" name="productnaam" value="<?php echo $productnaam ?>">
    <input id="productprijs" type="number" name="productprijs" min=0 value="<?php echo $productprijs ?>">
    <button type="submit" name="submitted">Update</button>
</form>

</html>