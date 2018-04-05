<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Personen{
    public function addPersoon($familienaam, $voornaam, $geboortedatum, $geslacht) {
        $dbh= new PDO("mysql:host=localhost;dbname=cursusphp", "cursusgebruiker", "cursuspwd");
        $sql= "insert into personen (familienaam, voornaam, geboortedatum, geslacht) values (:fnaam, :vnaam, :geboorte, :geslacht)";
        $stmt= $dbh->prepare($sql);
        $stmt->execute(array(
            ':fnaam'=>$familienaam,
            ':vnaam'=>$voornaam,
            ':geboorte'=>$geboortedatum,
            ':geslacht'=>$geslacht
        ));
        $dbh=null;
    }
}
if (isset($_GET['action']) && $_GET['action']=='add'){
    print 'added';
    $per= new Personen();
    $per->addPersoon($_POST['familienaam'], $_POST['voornaam'], $_POST['geboortedatum'], $_POST['geslacht']);
   header("location: list.php");
}

?>

<!DOCTYPE HTML>
<html>
    <body>
        <h1>Add persoon</h1>
        <form action="personeninsert.php?action=add" method="post">
            Familienaam <input type="text" name="familienaam">
            Voornaam <input type="text" name="voornaam">
            Geboortedatum <input type="date" name="geboortedatum">
            Geslacht 
            <select name="geslacht">
                <option value="M">Man</option>
                <option value="V">Vrouw</option>
            </select>
            <input type="submit" value="add">
            
        </form>
    </body>
</html>
