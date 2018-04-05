<?php

//data/PersoonDAO.php
//DAO Data Acces Object
//CRUD= Create, Read, Update, Delete
require_once ('data/DBConfig.php');
require_once("entities/Persoon.php");


class PersoonDAO {

    public function getAll() {
        $data= new DBConfig();
        $sql="select familienaam, voornaam from personen";
        $dbh= new PDO($data->getHost(),$data->getUser(),$data->getPwd());
        $stmt=$dbh->query($sql);
        $res=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $lijst = array();
        foreach($res as $value){
            $persoon= new Persoon($value['familienaam'], $value['voornaam']);
            array_push($lijst, $persoon);
        }
       
        return $lijst;
    }

}
