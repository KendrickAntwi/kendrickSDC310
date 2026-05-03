<?php
require_once __DIR__ . '/database.php';

function get_all_products() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM products");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>