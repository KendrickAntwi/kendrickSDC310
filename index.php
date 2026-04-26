<?php
session_start();
require_once 'db_connect.php' ;
$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antwi Tech Store - Catalog</title>
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
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        main h2 {
            margin-bottom: 24px;
            font-size: 1.4rem;
            color: #1a1a2e;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 24px;
        }

        .product-card {
            background: white;
            border-radius: 10px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .product-card h3 { font-size: 1.1rem; color: #1a1a2e; }

        .product-card p { font-size: 0.9rem; color: #666; flex-grow: 1; }

        .product-card .product-id { font-size: 0.75rem; color: #aaa; }

        .quantity-row {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 6px;
        }

        .quantity-row label { font-size: 0.9rem; }

        .quantity-row input {
            width: 60px;
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }

        .add-btn {
            background-color: #1a1a2e;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.95rem;
            width: 100%;
            margin-top: 4px;
        }

        .add-btn:hover { background-color: #e94560; }

        .success-msg {
            background-color: #d4edda;
            color: #155724;
            padding: 12px 20px;
            border-radius: 6px;
            margin-bottom: 20px;
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
    <h1>🖥️ Antwi Tech Store</h1>
    <a href="cart.php">🛒 View Cart (<?php echo isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'quantity')) : 0; ?>)</a>
</header>

<main>
    <h2>Product Catalog</h2>

    <?php if (isset($_GET['added'])): ?>
        <div class="success-msg"> Item added to cart!</div>
    <?php endif; ?>

    <div class="product-grid">
        <?php foreach ($products as $product): ?>
        <div class="product-card">
            <span class="product-id">ID: <?php echo htmlspecialchars($product['ProductId']); ?></span>
            <h3><?php echo htmlspecialchars($product['ProductName']); ?></h3>
            <p><?php echo htmlspecialchars($product['ProductDescription']); ?></p>

            <form method="POST" action="cart.php">
                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['ProductId']); ?>">
                <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product['ProductName']); ?>">
                <div class="quantity-row">
                    <label for="qty_<?php echo $product['ProductNo']; ?>">Qty:</label>
                    <input type="number" id="qty_<?php echo $product['ProductNo']; ?>" name="quantity" value="1" min="1" max="99">
                </div>
                <button type="submit" name="add_to_cart" class="add-btn">Add to Cart</button>
            </form>
        </div>
        <?php endforeach; ?>
    </div>
</main>

<footer>
    &copy; 2026 Antwi Tech Store
</footer>

</body>
</html>
