document.getElementById('bildHochladen').addEventListener('click', function () {
    var input = document.getElementById('bildAuswahl');
    var file = input.files[0];
    var formData = new FormData();
    formData.append('bild', file);

    // Senden Sie das Bild an den Server (mit Hilfe von PHP oder einem anderen Server-Skript).

    // Aktualisieren Sie die Bildergalerie nach dem Hochladen.
});

// Funktion zum Abrufen und Anzeigen der Bilder aus der Datenbank.
function ladeBilder(){
    // Senden Sie eine Anfrage an den Server (z. B. über PHP) und erhalten Sie die Bildinformationen aus der Datenbank.

    // Fügen Sie die Bilder in den HTML-Code ein.

    $.ajax({
        url: 'Projekt.2.php', // Name der PHP-Datei, die die Datenbankabfrage durchführt
        method: 'POST', // Sie können hier auch POST verwenden, je nach Ihren Bedürfnissen
        dataType: 'json',
        success: function (data) {
            var galerie = document.getElementById('galerie');
            galerie.innerHTML = ''; // Löschen Sie den vorherigen Inhalt der Galerie.

            // Iterieren Sie durch die empfangenen Daten und fügen Sie die Bilder in die Galerie ein.
            for (var i = 0; i < data.length; i++) {
                var bild = data[i];
                var img = document.createElement('img');
                img.src = bild.bildpfad;
                galerie.appendChild(img);
            }
        },
        error: function (error) {
            console.error('Fehler beim Abrufen der Bilder: ' + error);
        }
    });
}