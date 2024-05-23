<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bildergalerie</title>
    </head>
<!--hir befidet sich der webseiten Style-->
<style type="text/css">

</style>
<?php


module.exports = {
    php: "/usr/bin/php"              // macOS/Ubuntu
    php: "C:\\xampp\\php\\php.exe";  // Windows
?>
   


<!--Hir befidet sich der Php code-->
<?php
    if (isset($_FILES['bild'])) {
        $bildname = $_FILES['bild']['name'];
        $bildpfad = 'bilder/' . $bildname;
        move_uploaded_file($_FILES['bild']['tmp_name'], $bildpfad);}

?>
<!--Hir befidet sich der JavaScript code-->
<script type="text/javascript">
document.getElementById('bildAuswahl').addEventListener('click', function () {
    var input = document.getElementById('bildAuswahl');
    var file = input.file[0];
    var formData = new FormData();
    formData.append('bild', file);
    //es wird der neuen daten bank, die bilder geschikt mit hilfe von PHP code 
    // um die bider zu sehen muss an Aktualisieren 
});
function bildladen(){
$.ajax({
    url: "Projekt.2.sql"




})
}
    

</script>



<body>
    <!--Titel-->
    <h1>Bildergalerie</h1>
<main>
    <div id="Galeri Bilder">
<!--Bider werden hir hinzugefügt -->

    </div>
<input type="file" id="bildAuswahl" accept="image/*">
<button type="submit" id="bildHochladen">Bild bildHochladen</button>
<button id="bildLöshcen">Bild Löschen</button>

</main>
</body>


</html>


