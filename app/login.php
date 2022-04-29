<?php

declare(strict_types=1);
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

require_once './vendor/autoload.php';
require_once 'headers.php';
require_once 'Classes/PDOFactory.php';
require_once 'Classes/User.php';
require_once 'Classes/CookieHelper.php';

$username = $_SERVER['PHP_AUTH_USER'] ?? '';
$password = $_SERVER['PHP_AUTH_PW'] ?? '';

if (!$username || !$password) {
    echo json_encode([
        'status' => 'error',
        'message' => 'username or password parameters missing'
    ]);
    exit;
}


$pdo = (new PDOFactory())->getPdo();
$query = $pdo->prepare('SELECT * FROM `User` WHERE `username` = :username');
$query->bindValue('username', $username, PDO::PARAM_STR);
$query->setFetchMode(PDO::FETCH_CLASS, User::class);
if ($query->execute()) {
    /** @var User $user */
    $user = $query->fetch();
    if ($user && password_verify($password, $user->getPassword())) {

        $rsaKeysFile = file_get_contents('./rsaKeys/rsaKeys.key'); // extract content from file

        $privateKey = openssl_pkey_get_private($rsaKeysFile); // extract private key
        $publicKey = openssl_pkey_get_details($privateKey)['key']; // extract public key

        $date = new DateTimeImmutable();
        $payload = [
            'exp' => $date->getTimestamp()+10,
            'sub' => 'wesh alors',
            'name' => $user->getUsername()
        ];

        $jwt = JWT::encode($payload, $privateKey, 'RS256');

        CookieHelper::setCookie($jwt,$user->getUsername());

        echo json_encode([
            'status' => 'success',
            'username' => $user->getUsername(),
            'token' => $user->getToken()
        ]);

        exit;
    }
    echo json_encode([
        'status' => 'error',
        'message' => 'Wrong credentials'
    ]);
}

exit;