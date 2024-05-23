<!DOCTYPE html>
<html>
<head>
    <title>Bildergalerie</title>
    <style>
        /* CSS-Styling für die Bildergalerie */
        .gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 20px;
        }
        .gallery img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Bildergalerie</h1>
    
    <!-- Formular zum Hochladen von Bildern -->
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*" required>
        <input type="submit" value="Bild hochladen">
    </form>
    
        <!-- Formular zum Löschen von Bildern -->
    <form action="delete.php" method="post">
        <input type="text" name="image_id" placeholder="Bild-ID" required>
        <input type="submit" value="Bild löschen">
    </form>

    <!-- Anzeige der verfügbaren Bilder -->
    <div class="gallery">
        <?php
            // Verbindung zur MongoDB-Datenbank herstellen
            $mongoClient = new MongoDB\Client("mongodb://localhost:27017");
            $database = $mongoClient->selectDatabase("bildergalerie");
            $collection = $database->selectCollection("bilder");
            
            // Alle Bilder aus der Datenbank abrufen
            $images = $collection->find();
            
            // Bilder anzeigen
            foreach ($images as $image) {
                echo '<img src="data:image/jpeg;base64,'.base64_encode($image['data']).'">';
            }
        ?>
    </div>
    

    
</body>
</html>
