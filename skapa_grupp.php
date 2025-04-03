<?php include 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namn = $_POST['namn'];
    $stmt = $pdo->prepare("INSERT INTO grupper (namn) VALUES (?)");
    $stmt->execute([$namn]);
    header("Location: index.php");
    exit;
}
?>
<form method="post">
    Gruppnamn: <input type="text" name="namn" required>
    <button type="submit">Skapa</button>
</form>
