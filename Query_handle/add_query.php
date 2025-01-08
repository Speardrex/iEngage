<?php
$pdo = new PDO('mysql:host=localhost;dbname=query_db', 'root', '');

$data = json_decode(file_get_contents('php://input'), true);
$stmt = $pdo->prepare("INSERT INTO queries (title, query_type, tag, content) VALUES (?, ?, ?, ?)");
$stmt->execute([$data['title'], $data['query_type'], $data['tag'], $data['content']]);

echo json_encode(['success' => true]);
?>
