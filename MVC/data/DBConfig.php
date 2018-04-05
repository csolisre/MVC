<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DBConfig{
    private $host;
    private $user;
    private $pwd;
    private $dbh;
    
    public function __construct() {
        $this->host = "mysql:host=localhost;dbname=cursusphp";
        $this->user = "cursusgebruiker";
        $this->pwd = "cursuspwd";
        
    }
    
    public function getHost() {
        return $this->host;
    }

    public function getUser() {
        return $this->user;
    }

    public function getPwd() {
        return $this->pwd;
    }


}