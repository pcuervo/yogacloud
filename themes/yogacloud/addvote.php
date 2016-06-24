<?php
$conexion = new mysqli('localhost', 'USER_BD', 'YOUR-PASSWORD', 'BD_NAME');

$rating_id = $_POST['id'];
$rating = $_POST['rating'];
$ip = $_SERVER['REMOTE_ADDR'];

$insert_rating = 'INSERT INTO ratings (rating_id, rating_num, IP) VALUES ('.$rating_id.', '.$rating.', "'.$ip.'")';
$conexion->query($insert_rating);

echo 'Gracias por emitir tu voto';
?>