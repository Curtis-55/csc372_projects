<?php

//database connection
$type = "mysql";
$server = "192.185.2.183; // from Remote MySQL (%)
$DB = "curtispa_client_site";
$port = "3306";
$charset = "utf8mb4";
$username = "curtispa_curtis";
$password = "Moto28%55";

$dsn = "$type:host=$server;dbname=$DB;port=$port;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // throw exceptions on errors
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // return rows as arrays
    PDO::ATTR_EMULATE_PREPARES => false // ensures proper data types (integers stay integers)
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    // Rethrow exception (do NOT show sensitive info)
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
?>