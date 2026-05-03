<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antwi Tech Store - Cart</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background-color: #1a1a2e;
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 { font-size: 1.8rem; }

        header a {
            color: white;
            text-decoration: none;
            background-color: #e94560;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
        }

        header a:hover { background-color: #c73652; }

        main {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        main h2 {
            margin-bottom: 24px;
            font-size: 1.4rem;
            color: #1a1a2e;
        }

        .alert {
            padding: 12px 20px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .alert-success { background-color: #d4edda; color: #155724; }
        .alert-info { background-color: #d1ecf1; color: #0c5460; }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        th {
            background-color: #1a1a2e;
            color: white;
            padding: 14px 16px;
            text-align: left;
        }

        td {
            padding: 14px 16px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }

        tr:last-child td { border-bottom: none; }

        .qty-input {
            width: 65px;
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }

        .btn {
            padding: 8px 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.85rem;
            font-weight: bold;
        }

        .btn-update { background-color: #1a1a2e; color: white; }
        .btn-update:hover { background-color: #16213e; }
        .btn-remove { background-color: #e94560; color: white; margin-left: 6px; }
        .btn-remove:hover { background-color: #c73652; }

        .cart-footer {
            margin-top: 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn-clear {
            background-color: #6c757d;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.95rem;
        }

        .btn-clear:hover { background-color: #5a6268; }

        .btn-checkout {
            background-color: #28a745;
            color: white;
            padding: 12px 28px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: bold;
        }

        .btn-checkout:hover { background-color: #218838; }

        .empty-cart {
            background: white;
            padding: 60px;
            text-align: center;
            border-radius: 10px;
            color: #999;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .empty-cart p { font-size: 1.1rem; margin-bottom: 16px; }

        .empty-cart a {
            color: #e94560;
            text-decoration: none;
            font-weight: bold;
        }

        .total-row td {
            font-weight: bold;
            font-size: 1rem;
            background-color: #f8f9fa;
        }

        footer {
            text-align: center;
            padding: 30px;
            color: #aaa;
            font-size: 0.85rem;
            margin-top: 60px;
        }
    </style>
</head>
<body>

<header>
    <h1>Antwi Tech Store</h1>
    <a href="index.php">← Back to Catalog</a>
</header>

<main>
    <h2>Your Shopping Cart</h2>

    <?php if (isset($_GET['updated'])): ?>
        <div class="alert alert-success">Cart updated!</div>
    <?php elseif (isset($_GET['removed'])): ?>
        <div class="alert alert-info">Item removed from cart.</div>
    <?php endif; ?>

    <?php if (empty($cart)): ?>
        <div class="empty-cart">
            <p>Your cart is empty.</p>
            <a href="index.php">Browse Products →</a>
        </div>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $product_id => $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($product_id); ?></td>
                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                    <td>
                        <form method="POST" style="display:inline-flex; gap:6px; align-items:center;">
                            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product_id); ?>">
                            <input type="number" name="quantity" class="qty-input" value="<?php echo (int)$item['quantity']; ?>" min="0" max="99">
                            <button type="submit" name="update_cart" class="btn btn-update">Update</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product_id); ?>">
                            <button type="submit" name="remove_item" class="btn btn-remove">Remove</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                <tr class="total-row">
                    <td colspan="2">Total Items</td>
                    <td colspan="2"><?php echo $total_items; ?></td>
                </tr>
            </tbody>
        </table>

        <div class="cart-footer">
            <form method="POST">
                <button type="submit" name="clear_cart" class="btn-clear">🗑️ Clear Cart</button>
            </form>
            <button class="btn-checkout" onclick="alert('Checkout coming soon!')">Checkout →</button>
        </div>
    <?php endif; ?>
</main>

<footer>
    &copy; 2026 Antwi Tech Store. All rights reserved.
</footer>

</body>
</html>