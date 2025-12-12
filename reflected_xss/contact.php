<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - E-Shop</title>
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
        .container { max-width: 600px; margin: 0 auto; padding: 30px; }
        .card { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        h1 { color: #333; margin-bottom: 20px; }
        .contact-info p { color: #666; margin: 10px 0; }
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
            <h1>📞 Contact Us</h1>
            <div class="contact-info">
                <p>📧 Email: support@eshop.com</p>
                <p>📞 Phone: +1 800 123 4567</p>
                <p>📍 Address: 456 Commerce St, Shop City</p>
                <p>⏰ Hours: Mon-Fri 9AM-6PM</p>
            </div>
        </div>
    </div>
</body>
</html>
