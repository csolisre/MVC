<?php
require_once 'data.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$database= new Database();
$sql="select * from modules";
$database->query($sql);
$rows=$database->resultset();
print 'rows '. $database->rowCount().'<br>';
foreach ($rows as $value) {
    print $value['prijs'].'<br>';
}




