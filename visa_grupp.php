<?php include 'config.php';
$grupp_id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("SELECT * FROM grupper WHERE id = ?");
$stmt->execute([$grupp_id]);
$grupp = $stmt->fetch();

echo "<h1>Grupp: " . htmlspecialchars($grupp['namn']) . "</h1>";
echo "<a href='lagg_till_mottagare.php?grupp_id=$grupp_id'>+ Lägg till mottagare</a><br>";
echo "<a href='skicka_sms.php?grupp_id=$grupp_id'>✉️ Skicka SMS till grupp</a><br><br>";

$stmt = $pdo->prepare("SELECT m.* FROM mottagare m
    JOIN grupp_mottagare gm ON m.id = gm.mottagare_id
    WHERE gm.grupp_id = ?");
$stmt->execute([$grupp_id]);

while ($row = $stmt->fetch()) {
    echo "<li>" . htmlspecialchars($row['namn']) . " (" . $row['telefonnummer'] . ")</li>";
}
?>
