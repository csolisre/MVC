<?php

//data/BoekDAO.php
require_once("DBConfig.php");
require_once("entities/Genre.php");
require_once("entities/Boek.php");

class BoekDAO {

    public function getAll() {
        $sql = "select mvc_boeken.id as boek_id, titel, genre_id, genre from mvc_boeken, mvc_genres where genre_id = mvc_genres.id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach ($resultSet as $rij) {
            $genre = Genre::create($rij["genre_id"], $rij["genre"]);
            $boek = Boek::create($rij["boek_id"], $rij["titel"], $genre);//Aqui esta la magia pues jala el objeto Genre por lo que despues puede hacerprint $boek->getGenre()->getGenreNaam())
            array_push($lijst, $boek);
        }
        $dbh = null;
        return $lijst;
        
    }
    
    public function getById($id) {
        $sql= "select mvc_boeken.id as boek_id, titel, genre_id, genre from mvc_boeken, mvc_genres where genre_id = mvc_genres.id and mvc_boeken.id = :id";
        $dbh= new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt=$dbh->prepare($sql);
        $stmt->execute(array(':id'=>$id));
        $rij= $stmt->fetch(PDO::FETCH_ASSOC);
            $genre= Genre::create($rij['genre_id'], $rij['genre']);
            $boek= Boek::create($rij['boek_id'], $rij['titel'], $genre);
        $dbh=null;
        return $boek;
    }
    
    public function create($titel, $genreId) {
        $dbh= new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql= "insert into mvc_boeken (titel, genre_id) values (:titel, :genreId)";
        $stmt= $dbh->prepare($sql);
        $stmt->execute(array(
            ':titel'=>$titel,
            ':genreId'=>$genreId
        ));
        $dbh=null;
        
        $genereDAO= new GenreDAO();
        $genere=$genereDAO->getById($genreId);
        $boek= Boek::create($boekid, $titel, $genre);
        return$boek;
        
    }
    public function delete($id) {
        $dbh= new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql= "delete from mvc_boeken where id = :id";
        $stmt=$dbh->prepare($sql);
        $stmt->execute(array(':id'=>$id));
        $dbh=null;
    }

}
