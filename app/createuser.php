<?php
require './cors-auth.php';
require './connexion.php';

try {
    $token = strval(bin2hex(random_bytes(25)));
} catch (Exception $e) {
}

$username = $_SERVER['PHP_AUTH_USER'];
$passwd = $_SERVER['PHP_AUTH_PW'];

$adduser = "INSERT INTO `user` (`idUser`, `username`, `password`, `token`) VALUES (NULL, '{$username}', '{$passwd}', '{$token}' );";
if ($_SERVER['PHP_AUTH_USER'] != "" && $_SERVER['PHP_AUTH_PW'] != "") {
    try {
        mysqli_query($db, $adduser);
    } catch (\Exception $e) {
        die('MySQL Error : ' . $e->getMessage());
    }
}