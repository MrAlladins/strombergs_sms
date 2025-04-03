<?php include 'config.php';
$grupp_id = $_GET['grupp_id'] ?? 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'];
    $from = $_POST['from'];

    $stmt = $pdo->prepare("SELECT m.telefonnummer FROM mottagare m
        JOIN grupp_mottagare gm ON m.id = gm.mottagare_id
        WHERE gm.grupp_id = ?");
    $stmt->execute([$grupp_id]);
    $nummer = $stmt->fetchAll();

    foreach ($nummer as $row) {
        $data = http_build_query([
            "from" => $from,
            "to" => $row['telefonnummer'],
            "message" => $message
        ]);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.46elks.com/a1/SMS");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, "$elks_user:$elks_pass");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_exec($ch);
        curl_close($ch);
    }

    echo "SMS skickade!";
    exit;
}
?>
<form method="post">
    Från: <input type="text" name="from" value="Gruppen" required><br>
    Meddelande:<br>
    <textarea name="message" rows="5" cols="40" required></textarea><br>
    <button type="submit">Skicka SMS</button>
</form>
