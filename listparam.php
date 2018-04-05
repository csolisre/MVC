<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Personen{
    
    public function getPersoonById($id) {
        $dbh= new PDO("mysql:host=localhost;dbname=cursusphp", "cursusgebruiker", "cursuspwd");
        $sql= "select * from personen where id = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $resultSet= $stmt->fetchAll(PDO::FETCH_ASSOC);
        $lijst=array();
        foreach ($resultSet as $rij) {
            
            array_push($lijst, $rij);
        }
        $dbh=null;
        return $lijst;
    }
}

?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $per= new Personen();
        $tab=$per->getPersoonById(2);
        foreach ($tab as $value) {
            print $value['voornaam'] . ', '. $value['geslacht'];
        }
        
        ?>
    </body>
</html>

