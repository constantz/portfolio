<html>
<head>
    <title>Deelnemers</title>
    <style>
        @font-face {
        font-family: Azonix;
        src: url(Azonix.otf);
        }
        #invoer {font-family: Azonix, sans-serif;}
        #ok {font-family: Azonix;}
    </style>
</head>
<body>
    <div>
    <form id="invoer" action="index.php" method="POST">
    <fieldset>
        <h3>Voeg deelnemers toe of verwijder deelnemers:</h3>
        Naam:<input id="naam" name="naam" type="text" required><br><br>
        Woonplaats:<input id="woonplaats" name="woonplaats" type="text"><br><br>
        Aantal kopjes koffie:<input id="kopjes" name="kopjes" type="number" min=0 value=0><br><br>
        <input type="radio" id="voegToe" name="verwijderVoegToe" value="voegToe" required>Voeg toe<br>
        <input type="radio" id="verwijder" name="verwijderVoegToe" value="verwijder" required>Verwijder<br><br>
        <button id="ok" type="submit" name="submitted">OK</button><br><br>
    </fieldset>    
    </form>
    </div>
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $submitted = $_POST['submitted'];
    $naamInvoer = $_POST['naam'];
    $woonplaats = $_POST['woonplaats'];
    $kopjes = $_POST['kopjes'];
    $verwijderVoegToe = $_POST['verwijderVoegToe'];



    // werken met PDO en niet met mysql, mysqli  (wij zijn van deze tijd)

    // connectie met database server
    $conn = new PDO("mysql:host=localhost;dbname=project1", "root", ""); //database naam, user, wachtwoord

    // if ($submitted != null){
    if ($verwijderVoegToe == "voegToe"){
        $submitString = "INSERT INTO deelnemers (naam, woonplaats, aantalkopjes) values ('" . $naamInvoer .  "', '" . $woonplaats . "', '" . $kopjes ."');";
        $conn->exec($submitString);
    }

    if ($verwijderVoegToe == "verwijder"){
        $submitString = "DELETE FROM deelnemers WHERE naam = '" . $naamInvoer . "';";
        $conn->exec($submitString);
    }
    // }

    // stuur SQL QUERY naar database server
    $stmt = $conn->query("SELECT * FROM deelnemers");

    // antwoord van database server opvragen
    // door het antwoord heenlopen
    echo "Alle deelnemers zijn: ";
    while ($row = $stmt->fetch()) {
        // en het weergeven als pagina naar gebruiker als html
        echo "<LI>" . $row["naam"] . "</LI>";
    }

    echo "<br>Waarvan in Enschede wonen: <br>";
    $selecEns = $conn->query("SELECT * FROM deelnemers WHERE woonplaats='Enschede'");
    while ($row = $selecEns->fetch()) {
        echo "<LI>" . $row["naam"] . "</LI>";
    }

    echo "<br>De grootste koffiedrinkers zijn (met meer dan tien kopjes):<br>";
    $selecKoffie = $conn->query("SELECT * FROM deelnemers WHERE aantalkopjes > 10 
                                ORDER BY aantalkopjes DESC;");
    while ($row = $selecKoffie->fetch()) {
        echo "<LI>" . $row["naam"] . ": " . $row["aantalkopjes"] . " kopjes</LI>";
    }
    
    
    // connectie met database server verbreken
    $conn = NULL;
} 

?>