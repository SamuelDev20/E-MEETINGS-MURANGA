<?php
// Database connection parameters
$host = 'dpg-cqdnvn08fa8c73doeul0-a.oregon-postgres.render.com';
$db = 'njoki_samuel_wamwea_8kcq';
$user = 'njoki_samuel_wamwea_8kcq_user';
$pass = 'N4vzkBtf79vuuOkmoKFu6azDFbEcgdAK';
$port = '5432'; // Default PostgreSQL port

try {
    // Create a new PDO instance
    $dsn = "pgsql:host=$host;port=$port;dbname=$db";
    $pdo = new PDO($dsn, $user, $pass);
    
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Connected to PostgreSQL successfully";
} catch (PDOException $e) {
    // Handle connection error
    die("Could not connect to the database $db: " . $e->getMessage());
}
?>


