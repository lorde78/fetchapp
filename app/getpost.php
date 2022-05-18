<?php
require './cors-auth.php';
require './connexion.php';

$getpost = "SELECT Title, Content, Username FROM `post` LEFT JOIN `user` on `post`.idUser = `user`.idUser";
$postList = [];

try {
    $query = mysqli_query($db, $getpost);

    while($row = mysqli_fetch_array($query)) {
        $postList[] = $row;
    }

    echo json_encode($postList);

} catch(\Exception $e) {
    die('MySQL Error : ' . $e->getMessage());
}