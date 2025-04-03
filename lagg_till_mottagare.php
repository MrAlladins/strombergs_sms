<?php include 'config.php';
$grupp_id = $_GET['grupp_id'] ?? 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namn = $_POST['namn'];
    $telefon = $_POST['telefon'];
    $stmt = $pdo->prepare("INSERT INTO mottagare (namn, telefonnummer) VALUES (?, ?)");
    $stmt->execute([$namn, $telefon]);
    $mottagare_id = $pdo->lastInsertId();
    $stmt = $pdo->prepare("INSERT INTO grupp_mottagare (grupp_id, mottagare_id) VALUES (?, ?)");
    $stmt->execute([$grupp_id, $mottagare_id]);
    header("Location: visa_grupp.php?id=$grupp_id");
    exit;
}
?>
<form method="post">
    Namn: <input type="text" name="namn"><br>
    Telefonnummer: <input type="text" name="telefon" required><br>
    <button type="submit">Lägg till</button>
</form>
