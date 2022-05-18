<?php
require './cors-auth.php';
require './connexion.php';

$addpost = "INSERT INTO `post` (`idPost`, `title`, `content`, `idUser`) VALUES (NULL, 'hello', 'ieijeijegijgijgigje', 3);";

echo $_POST;
// try {
//     mysqli_query($db, $addpost);
// } catch (\Exception $e){
//     die('MySQL Error : ' . $e->getMessage());
// }