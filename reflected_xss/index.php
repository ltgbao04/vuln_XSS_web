<?php
$searchQuery = isset($_GET['q']) ? $_GET['q'] : '';
$errorMsg = isset($_GET['error']) ? $_GET['error'] : '';
$welcomeMsg = isset($_GET['welcome']) ? $_GET['welcome'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Shop - Your Online Store</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
            min-height: 100vh;
        }
        .navbar {
            background: white;
            padding: 15px 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo { font-size: 24px; font-weight: bold; color: #ff6b6b; }
        .nav-links a { color: #333; text-decoration: none; margin-left: 20px; }
        .nav-links a:hover { color: #ff6b6b; }
        .container { max-width: 1000px; margin: 0 auto; padding: 30px; }
        .hero {
            background: white;
            padding: 40px;
            border-radius: 15px;
            text-align: center;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .hero h1 { color: #333; margin-bottom: 10px; }
        .hero p { color: #666; margin-bottom: 20px; }
        .search-box {
            display: flex;
            max-width: 500px;
            margin: 0 auto;
        }
        .search-box input {
            flex: 1;
            padding: 15px;
            border: 2px solid #ddd;
            border-radius: 10px 0 0 10px;
            font-size: 16px;
        }
        .search-box input:focus { border-color: #ff6b6b; outline: none; }
        .search-box button {
            padding: 15px 30px;
            background: #ff6b6b;
            color: white;
            border: none;
            border-radius: 0 10px 10px 0;
            cursor: pointer;
            font-size: 16px;
        }
        .search-box button:hover { background: #ee5a5a; }
        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .alert-error { background: #ffe0e0; color: #c00; border: 1px solid #fcc; }
        .alert-success { background: #e0ffe0; color: #060; border: 1px solid #cfc; }
        .search-result {
            background: white;
            padding: 25px;
            border-radius: 15px;
            margin-bottom: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .search-result h2 { color: #333; margin-bottom: 15px; }
        .products { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 20px; }
        .product {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
        .product img { width: 100%; height: 150px; object-fit: cover; border-radius: 8px; margin-bottom: 10px; }
        .product h3 { color: #333; font-size: 16px; margin-bottom: 5px; }
        .product .price { color: #ff6b6b; font-weight: bold; }
        .no-results { text-align: center; color: #666; padding: 40px; }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">🛒 E-Shop</div>
        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="products.php">Products</a>
            <a href="cart.php">Cart</a>
            <a href="contact.php">Contact</a>
        </div>
    </nav>

    <div class="container">
        <?php if ($welcomeMsg): ?>
            <!-- VULNERABLE: Reflected XSS in welcome message -->
            <div class="alert alert-success">Welcome, <?php echo $welcomeMsg; ?>!</div>
        <?php endif; ?>

        <?php if ($errorMsg): ?>
            <!-- VULNERABLE: Reflected XSS in error message -->
            <div class="alert alert-error"><?php echo $errorMsg; ?></div>
        <?php endif; ?>

        <div class="hero">
            <h1>Welcome to E-Shop</h1>
            <p>Find the best products at amazing prices</p>
            <form method="GET" action="index.php" class="search-box">
                <input type="text" name="q" placeholder="Search products..." value="<?php echo htmlspecialchars($searchQuery); ?>">
                <button type="submit">Search</button>
            </form>
        </div>

        <?php if ($searchQuery): ?>
            <div class="search-result">
                <!-- VULNERABLE: Reflected XSS - user input directly echoed -->
                <h2>Search results for: <?php echo $searchQuery; ?></h2>
                <div class="no-results">
                    <p>No products found matching your search.</p>
                    <p>Try different keywords or browse our categories.</p>
                </div>
            </div>
        <?php else: ?>
            <div class="search-result">
                <h2>Featured Products</h2>
                <div class="products">
                    <div class="product">
                        <img src="https://via.placeholder.com/200x150/ff6b6b/fff?text=Product+1" alt="Product">
                        <h3>Wireless Headphones</h3>
                        <p class="price">$49.99</p>
                    </div>
                    <div class="product">
                        <img src="https://via.placeholder.com/200x150/4ecdc4/fff?text=Product+2" alt="Product">
                        <h3>Smart Watch</h3>
                        <p class="price">$129.99</p>
                    </div>
                    <div class="product">
                        <img src="https://via.placeholder.com/200x150/45b7d1/fff?text=Product+3" alt="Product">
                        <h3>Bluetooth Speaker</h3>
                        <p class="price">$39.99</p>
                    </div>
                    <div class="product">
                        <img src="https://via.placeholder.com/200x150/96ceb4/fff?text=Product+4" alt="Product">
                        <h3>USB-C Hub</h3>
                        <p class="price">$29.99</p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
