<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Personen{
    public function personDelete($id) {
        $dbh= new PDO("mysql:host=localhost;dbname=cursusphp", "cursusgebruiker", "cursuspwd");
        $sql= "delete from personen where id = :id";
        $stmt= $dbh->prepare($sql);
        $stmt->execute(array(':id'=>$id));
        $dbh=null;
    }
}

$del=new Personen();
$del->personDelete(9);
