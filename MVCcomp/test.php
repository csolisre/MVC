<?php
//test.php
require_once("data/DBConfig.php");
$dbh=new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
$sql="SELECT mvc_boeken.id, mvc_boeken.titel, mvc_genres.genre from mvc_boeken INNER JOIN mvc_genres ON mvc_boeken.genre_id = mvc_genres.id";
$resultSet=$dbh->query($sql);

$lijst=array();
foreach ($resultSet as $value) {
    array_push($lijst, $value);
}
$dbh=null;

foreach ($lijst as $value) {
    print $value['titel']. ', '. $value['genre'].'<br>';
}
