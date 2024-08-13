<?php

require("connect.php");

$nazwa = $_POST['nazwa'];
$rok = $_POST['rok'];
$silnik = $_POST['silnik'];
$przebieg = $_POST['przebieg'];
$telefon = $_POST['telefon'];
$komentarz = $_POST['komentarz'];


$sql = "INSERT INTO dane(nazwa, rok, silnik, przebieg, telefon, komentarz) VALUES ('$nazwa','$rok','$silnik','$przebieg','$telefon','$komentarz')" ;
$result = $conn->query($sql);

?>