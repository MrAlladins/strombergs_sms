<?php
// Databasinställningar
$host = 'localhost';
$db   = 'u357300497_sms_utskick';
$user = 'u357300497_smsjonas';
$pass = 'Jonas366#';

// 46elks API-inställningar
$elks_user = 'ub3a5595fb0bd91f85c51134d630fd260';
$elks_pass = 'D1EE9E067C31165AA4D9140B02C56DEF';

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
