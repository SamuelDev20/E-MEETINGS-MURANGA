<?php
$host = 'dpg-cqdnvn08fa8c73doeul0-a.oregon-postgres.render.com';
$db = 'njoki_samuel_wamwea_8kcq';
$user = 'njoki_samuel_wamwea_8kcq_user';
$pass = 'N4vzkBtf79vuuOkmoKFu6azDFbEcgdAK';
$port = '5432'; // Default PostgreSQL port

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$db";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $db :" . $e->getMessage());
}
?>
