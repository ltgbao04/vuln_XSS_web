<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - E-Shop</title>
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
        .container { max-width: 1000px; margin: 0 auto; padding: 30px; }
        .card { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        h1 { color: #333; margin-bottom: 20px; }
        .products { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 20px; }
        .product { background: #f8f9fa; padding: 20px; border-radius: 10px; text-align: center; }
        .product img { width: 100%; height: 150px; object-fit: cover; border-radius: 8px; margin-bottom: 10px; }
        .product h3 { color: #333; font-size: 16px; margin-bottom: 5px; }
        .product .price { color: #ff6b6b; font-weight: bold; }
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
        <div class="card">
            <h1>All Products</h1>
            <div class="products">
                <div class="product">
                    <img src="https://via.placeholder.com/200x150/ff6b6b/fff?text=Headphones" alt="Product">
                    <h3>Wireless Headphones</h3>
                    <p class="price">$49.99</p>
                </div>
                <div class="product">
                    <img src="https://via.placeholder.com/200x150/4ecdc4/fff?text=Watch" alt="Product">
                    <h3>Smart Watch</h3>
                    <p class="price">$129.99</p>
                </div>
                <div class="product">
                    <img src="https://via.placeholder.com/200x150/45b7d1/fff?text=Speaker" alt="Product">
                    <h3>Bluetooth Speaker</h3>
                    <p class="price">$39.99</p>
                </div>
                <div class="product">
                    <img src="https://via.placeholder.com/200x150/96ceb4/fff?text=Hub" alt="Product">
                    <h3>USB-C Hub</h3>
                    <p class="price">$29.99</p>
                </div>
                <div class="product">
                    <img src="https://via.placeholder.com/200x150/ffeaa7/333?text=Keyboard" alt="Product">
                    <h3>Mechanical Keyboard</h3>
                    <p class="price">$89.99</p>
                </div>
                <div class="product">
                    <img src="https://via.placeholder.com/200x150/dfe6e9/333?text=Mouse" alt="Product">
                    <h3>Gaming Mouse</h3>
                    <p class="price">$59.99</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
