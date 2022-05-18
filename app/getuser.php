<?php
require './cors-auth.php';
require './connexion.php';

$getuser = "SELECT * FROM `user`";
$userList = [];

try {
    $query = mysqli_query($db, $getuser);

    while($row = mysqli_fetch_array($query)) {
        $userList[] = $row;
    }

    echo json_encode($userList);

} catch(\Exception $e) {
    die('MySQL Error : ' . $e->getMessage());
}