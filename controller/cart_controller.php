<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['add_to_cart'])) {
    $product_id   = htmlspecialchars($_POST['product_id']);
    $product_name = htmlspecialchars($_POST['product_name']);
    $quantity     = max(1, (int)$_POST['quantity']);

    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity'] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = ['name' => $product_name, 'quantity' => $quantity];
    }
    header("Location: index.php?added=1");
    exit();
}

if (isset($_POST['update_cart'])) {
    $product_id = htmlspecialchars($_POST['product_id']);
    $quantity   = (int)$_POST['quantity'];
    if ($quantity <= 0) {
        unset($_SESSION['cart'][$product_id]);
    } else {
        $_SESSION['cart'][$product_id]['quantity'] = $quantity;
    }
    header("Location: cart.php?updated=1");
    exit();
}

if (isset($_POST['remove_item'])) {
    $product_id = htmlspecialchars($_POST['product_id']);
    unset($_SESSION['cart'][$product_id]);
    header("Location: cart.php?removed=1");
    exit();
}

if (isset($_POST['clear_cart'])) {
    $_SESSION['cart'] = [];
    header("Location: cart.php");
    exit();
}

$cart        = $_SESSION['cart'];
$total_items = array_sum(array_column($cart, 'quantity'));

require_once __DIR__ . '/../view/cart_view.php';
?>