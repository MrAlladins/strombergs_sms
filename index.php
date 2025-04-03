<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>SMS-panel</title>
</head>
<body>
    <h1>Grupper</h1>
    <a href="skapa_grupp.php">+ Skapa ny grupp</a>
    <ul>
        <?php
        $stmt = $pdo->query("SELECT * FROM grupper ORDER BY skapad DESC");
        while ($row = $stmt->fetch()) {
            echo "<li><a href='visa_grupp.php?id={$row['id']}'>" . htmlspecialchars($row['namn']) . "</a></li>";
        }
        ?>
    </ul>
</body>
</html>
