<?php
// Databasinställningar
$host = 'localhost';
$db   = 'u357300497_sms_utskick';
$user = 'u357300497_smsjonas';
$pass = 'Jonas366#';

// 46elks API-inställningar
$elks_user = 'DIN_46ELKS_API_USER';
$elks_pass = 'DIN_46ELKS_API_LÖSENORD';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    echo "DB-anslutning misslyckades: " . $e->getMessage();
    exit;
}
?>
