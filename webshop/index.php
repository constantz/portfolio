<!-- <?php
    include("navbar.php");
?>     -->

<html>
    <head>
        <link rel="stylesheet" href="shop.css">
    </head>
    <body>
        <header>
            
            <div class="zoekveld">
                <form class="searchBox" action="index.php" method="GET">
                    <input  name="naamfilter" placeholder="Naam bevat...">
                    <input  class=searchBoxBtn type="submit" value="Zoek produkt">
                </form>
            </div>
            <h1>Groentewinkel</h1>
        </header>
        <div class="container">
        <h1>Welkom bij mijn fruit- en groentewinkel</h1>

        <ul>
            <a href="producttoevoegen.html"><button>Produkt toevoegen</button></a>
        </ul>
        <div id="artList">
        <h2>Artikellijst</h2>
        <ul>
            <?php
                include 'toonproducten.php';
            ?>
        </ul>
        </div>
        </div>
    </body>
</html>