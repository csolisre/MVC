<?php
require_once 'Persoon.php';
require_once 'Personenlist.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_GET['action']) && isset($_GET['id'])){
    //imagen 
    $nombre = $_FILES['imagen']['name'];
    $tipo = $_FILES['imagen']['type'];
    $tamano = $_FILES['imagen']['size'];
    $destino = $_SERVER['DOCUMENT_ROOT'] . '/kul/deleteobject/img/';
    move_uploaded_file($_FILES['imagen'] ['tmp_name'], $destino . $nombre);
    $url = $nombre;
    //
    $pers= new Persoon($_GET['id'], $_POST['familienaam'], $_POST['voornaam'], $_POST['geboortedatum'], $_POST['geslacht'], $url);
    $create= new PersonelLijst();
    $create->editPerson($pers);//en vez de pasar un Id pasa un array que contiene el objeto persona
    header("location: Personenlist.php");
    
}else{
$persona= new PersonelLijst();
$tab=$persona->getPersonById($_GET['id']);
}
?>

<!DOCTYPE HTML>
<html>
    <body>
        <form action="editperson.php?action=edit&id=<?php print $tab->getId(); ?>" method="post" enctype="multipart/form-data">
            <img src="img/<?php print $tab->getImage()?>" alt="logo">
            familienaam <input type="text" name="familienaam" value="<?php print $tab->getFamilienaam(); ?>">
            Voornaam <input type="text" name="voornaam" value="<?php print $tab->getVoornaam(); ?>">
            geboortedatum <input type="date" name="geboortedatum" value="<?php print $tab->getGeboortedatum(); ?>">
            geslacht 
            <select name="geslacht">
                <option value="M" <?php if($tab->getGeslacht()=="M"){print 'selected';} ?>>Men</option>
                <option value="V" <?php if($tab->getGeslacht()=="V"){print 'selected';}?>>Vrouw</option>
            </select>
            <br>
            <input type="file" name="imagen">
            <input type="submit" value="save">
        </form>
    </body>
</html>
