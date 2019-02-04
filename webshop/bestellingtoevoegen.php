<?php
$id = $_GET['id'];

try {
    $conn = new PDO("mysql:host=localhost;dbname=webshopdb", "root", ""); 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->query("SELECT * FROM producten WHERE id = $id"); 
    while ($row = $stmt->fetch()) {
        echo "U bestelt: ". $row['naam'] . "</LI>";
    }
    // $statement = $conn->prepare('INSERT INTO bestellingen (naam, prijs) VALUES(:fnaam, :fprijs)'); 

    // $statement->execute([
    //     'fid' => $id
    // ]);
}

catch(PDOException $e) {
    echo "Connection failed ".$e->getMessage();
}



$conn = NULL;

// header("Location: index.php");

?>
<html>
<form action = "bestellingtoevoegen.php" method="POST">
    <input id="email" type="text" name="email" placeholder="Uw e-mail adres:"><br><br>&emsp;
    U bestelt: <?php echo $id; ?><br><br>
    <input id="aantal" type="number" name="aantal" min=1 placeholder="Aantal">
    <button type="submit" name="submitted">Bestel</button>
</form>
</html>

