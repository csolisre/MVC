<?php

class Personel {

    public function getLijst() {
        $dbh= new PDO("mysql:host=localhost;dbname=cursusphp", "cursusgebruiker", "cursuspwd");
        $sql= "select * from personen";
        $resultset= $dbh->query($sql);
        $lijst=array();
        foreach ($resultset as $value) {
            array_push($lijst, $value);
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
        $pl= new Personel();
        $tab=$pl->getLijst();
        
        foreach ($tab as $value) {
            print $value['voornaam']. ', '.$value['familienaam']. '<br>';
        }
        ?>
    </body>
</html>
