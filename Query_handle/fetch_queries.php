<?php
$pdo = new PDO('mysql:host=localhost;dbname=query_db', 'root', '');

$query = $pdo->query("SELECT * FROM queries ORDER BY created_at DESC");
$result = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
?>
