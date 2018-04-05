<?php
/*
 * /business
 * /data
 * /entities
 * /presentation
 */


//Controller qa lo que el usuario accesa 
//toonallepersonen.php
require_once("business/PersoonService.php");
$pService = new PersoonService();
$personen = $pService->getPersonenOverzicht();
include("presentation/personenlijst.php");
