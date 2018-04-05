<?php
require_once 'Personenlist.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_GET['action']) && $_GET['action'] == 'add') {
    $npers = new PersonelLijst();
    //image
    $nombre = $_FILES['imagen']['name'];
    $tipo = $_FILES['imagen']['type'];
    $tamano = $_FILES['imagen']['size'];
    $destino = $_SERVER['DOCUMENT_ROOT'] . '/PHPrepaso/deel9/imagenes/img/';
    move_uploaded_file($_FILES['imagen'] ['tmp_name'], $destino . $nombre);
    $url = $nombre;
    $npers->addPerson($_POST['familienaam'], $_POST['voornaam'], $_POST['geboortedatum'], $_POST['geslacht'], $url);

    header("location: Personenlist.php");
}
?>

<!DOCTYPE HTML> 

<html>
    <head>
        <title>
            
        </title>
    </head>
    <body>
        <form action="personenform.php?action=add" method="post">
            Familienaam <input type="text" name="familienaam">
            Voornaam <input type="text" name="voornaam">
            Geboortedatum <input type="date" name="geboortedatum">
            Geslacht <select name="geslacht">
                <option value="M">Men</option>
                <option value="V">Vrouw</option>
            </select>
            <br>
            <input type="file" name="imagen">
            <input type="submit" value="add">
        </form>
    </body>
</html>