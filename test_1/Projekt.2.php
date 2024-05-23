


<?php
if (isset($_FILES['bild'])) {
        $bildname = $_FILES['bild']['name'];
        $bildpfad = 'bilder/' . $bildname;
        move_uploaded_file($_FILES['bild']['tmp_name'], $bildpfad);

        $conn = new mysqli("localhost", "Benutzername", "Passwort", "Datenbankname");

        if ($conn->connect_error) {
            die("Verbindungsfehler: " . $conn->connect_error);
        }
    
        // SQL-Abfrage zum Einfügen der Bildinformationen in die Datenbank
        $sql = "INSERT INTO bilder (bildname, bildpfad) VALUES (?, ?)";
    
        // SQL-Abfrage vorbereiten
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $bildname, $bildpfad); // "ss" steht für zwei Zeichenketten (String)
    
        // SQL-Abfrage ausführen
        if ($stmt->execute()) {
            echo "Bild erfolgreich hochgeladen und in die Datenbank eingefügt.";
        } else {
            echo "Fehler beim Hochladen und Speichern des Bildes: " . $stmt->error;
        }
        $stmt->close();
        $conn->close();

        ladeBilder();
    }
    
function ladeBilder() {
    // Verbindung zur Datenbank herstellen (passen Sie die Verbindungsinformationen an)
    $conn = new mysqli("localhost", "Benutzername", "Passwort", "Datenbankname");

if ($conn->connect_error) {
    die("Verbindungsfehler: " . $conn->connect_error);
}

// Bildinformationen aus der Datenbank abrufen
$result = $conn->query("SELECT * FROM bilder");

$bilder = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $bilder[] = $row;
    }
}

// Datenbankverbindung schließen
// JSON-Daten zurückgeben
header('Content-Type: application/json');
echo json_encode($bilder);
$conn->close();}
?>


