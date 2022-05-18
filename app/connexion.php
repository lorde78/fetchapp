<?php

$servername = "db";
$username = "root";
$password = "password";
$database= "data";

// Création de la connexion
$db = mysqli_connect($servername, $username, $password, $database);
if ($db->connect_error) {
    die("Echec de la connexion: " . $db->connect_error);
}