<?php
$host = 'localhost';
$nameBD = 'my_project';
$userBD = 'root';
$passwordBD = 'root';
$link = mysqli_connect($host, $userBD, $passwordBD, $nameBD);

return $link;
?>