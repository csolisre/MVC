<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Persoon{
    private $id;
    private $familienaam;
    private $voornaam;
    private $geboortedatum;
    private $geslacht;
    private $image;
    
    public function __construct($id, $familienaam, $voornaam, $geboortedatum, $geslacht, $image) {
        $this->id=$id;
        $this->familienaam=$familienaam;
        $this->voornaam=$voornaam;
        $this->geboortedatum=$geboortedatum;
        $this->geslacht=$geslacht;
        $this->image=$image;
        
    }
    
    public function getId() {
        return $this->id;
    }

    public function getFamilienaam() {
        return $this->familienaam;
    }

    public function getVoornaam() {
        return $this->voornaam;
    }

    public function getGeboortedatum() {
        return $this->geboortedatum;
    }

    public function getGeslacht() {
        return $this->geslacht;
    }
    function getImage() {
        return $this->image;
    }





}
