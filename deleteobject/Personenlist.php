<?php
require_once 'Persoon.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_GET['action'])&& $_GET['action']=='del'){
    //print'delete';
    $per=new PersonelLijst();
    $per->delPersoon($_GET['id']);
}

class PersonelLijst{
    

    public function getLijst() {
        $sql = "select * from personen";
        
        $dbh= new PDO("mysql:host=localhost;dbname=cursusphp", "cursusgebruiker", "cursuspwd");
        
        $resultSet=$dbh->query($sql);
        $lijst=array();
        foreach ($resultSet as $rij) {
            $pers= new Persoon($rij['id'], $rij['familienaam'], $rij['voornaam'], $rij['geboortedatum'], $rij['geslacht'], $rij['image']);
            array_push($lijst, $pers);
        }
        $dbh=null;
        return $lijst;
    }
    public function delPersoon($id) {
        $dbh= new PDO("mysql:host=localhost;dbname=cursusphp", "cursusgebruiker", "cursuspwd");
        $sql= "delete from personen where id = :id";
        $stmt= $dbh->prepare($sql);
        $stmt->execute(array(':id'=>$id));
        $dbh=null;
    }
    public function addPerson($familienaam, $voornaam, $gebortadatum, $geslacht) {
        $dbh= new PDO("mysql:host=localhost;dbname=cursusphp","cursusgebruiker","cursuspwd");
        $sql= "insert into personen (familienaam, voornaam, geboortedatum, geslacht) values (:fnaam, :vnaam, :geboorte, :geslacht)";
        $stmt= $dbh->prepare($sql);
        $stmt->execute(array(
            ':fnaam'=>$familienaam,
            ':vnaam'=>$voornaam,
            ':geboorte'=>$gebortadatum,
            ':geslacht'=>$geslacht
        ));
        $dbh=null;
    }
    
    public function getPersonById($id) {
        $dbh=new PDO("mysql:host=localhost;dbname=cursusphp", "cursusgebruiker", "cursuspwd");
        $sql= "select * from personen where id = :id";
        $stmt=$dbh->prepare($sql);
        $stmt->execute(array(':id'=>$id));
        $tab =$stmt->fetchAll(PDO::FETCH_ASSOC);
        $lijst=array();
        foreach ($tab as $result) {
           $persoon = new Persoon($result['id'], $result['familienaam'], $result['voornaam'], $result['geboortedatum'], $result['geslacht'], $result['image']); 
           array_push($lijst, $persoon);
        }
        
        $dbh=null;
        return $persoon;
        
    }
    public function editPerson($persoon) {//aqui lo que pasamos es una array del objeto personas en vez de dar solo el parametro ID
         $dbh=new PDO("mysql:host=localhost;dbname=cursusphp", "cursusgebruiker", "cursuspwd");
         $sql="update personen set familienaam = :fnaam, voornaam = :vnaam, geboortedatum = :geboorte, geslacht = :geslacht, image = :image where id =:id";
         $stmt= $dbh->prepare($sql);
         $stmt->execute(array(
             ':fnaam'=>$persoon->getFamilienaam(),
             ':vnaam'=>$persoon->getVoornaam(),
             ':geboorte'=>$persoon->getGeboortedatum(),
             ':geslacht'=>$persoon->getGeslacht(),
             ':image'=>$persoon->getImage(),
             ':id'=>$persoon->getId()    
         ));
         $dbh=null;
    }
}
?>
<!DOCTYPE HTML>
<html>
    
    <body>
        <ul>
            <?php
            $per= new PersonelLijst();
            $tab=$per->getLijst();
            foreach ($tab as $value) {
            print '<li>'.$value->getVoornaam()
                    . ', '.$value->getFamilienaam()
                    .'<a href="Personenlist.php?action=del&id='
                    .$value->getId().'">Delte</a>' .', '
                    .'<a href="editperson.php?id='. $value->getId().'">Edit</a>'
                    .'</li>';
}
            
            ?>
        </ul>
        <button onclick="location.href='personenform.php';">Add</button>
    </body>
</html>

