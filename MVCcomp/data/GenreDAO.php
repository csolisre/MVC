<?php

require_once 'DBConfig.php';
require_once 'entities/Genre.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class GenreDAO {

    public function getAll() {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select id, genre from mvc_genres";
        $resultset= $dbh->query($sql);
        $lijst=array();
        foreach ($resultset as $rij) {
            $genre= Genre::create($rij['id'], $rij['genre']);
            array_push($lijst, $genre);
        }
        $dbh=null;
        return $lijst;
    }
    
    public function getById($id) {
        $dbh= new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql= "select id, genre from genres where id = :id";
        $stmt=$dbh->prepare($sql);
        $stmt->execute(array(':id'=>$id));
        $rij=$stmt->fetch(PDO::FETCH_ASSOC);
            $genre= Genre::create($rij['id'], $rij['genre']);
        $dbh=NULL;
        return $genre;
        
    }

}
