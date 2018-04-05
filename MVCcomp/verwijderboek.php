<?php
require_once 'business/BoekService.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_GET['id'])){
    $boekSvc= new BoekService();
    $boekSvc->verwijderBoek($_GET['id']);
    header("location: toonalleboeken.php");
    exit(0);
    
}

