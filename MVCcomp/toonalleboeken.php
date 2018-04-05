<?php
require_once 'business/BoekService.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$boekServ= new BoekService();
$boekenLijst=$boekServ->getBoekenOverzicht();
include 'presentation/boekenlijst.php';


