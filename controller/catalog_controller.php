<?php
session_start();
require_once __DIR__ . '/../model/product_model.php';

$products = get_all_products();
$cart_count = isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantity')) : 0;

require_once __DIR__ . '/../view/catalog_view.php';
?>