<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friends - Social Network</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .container { max-width: 600px; margin: 0 auto; }
        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        h1 { color: #333; margin-bottom: 20px; text-align: center; }
        .nav { margin: 15px 0; text-align: center; }
        .nav a { color: #f5576c; text-decoration: none; margin: 0 10px; }
        .friend { display: flex; align-items: center; padding: 15px 0; border-bottom: 1px solid #eee; }
        .friend:last-child { border-bottom: none; }
        .friend img { width: 50px; height: 50px; border-radius: 50%; margin-right: 15px; }
        .friend-name { color: #333; font-weight: 500; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>👥 Friends</h1>
            <nav class="nav">
                <a href="index.php">Profile</a>
                <a href="settings.php">Settings</a>
                <a href="friends.php">Friends</a>
            </nav>
            <div class="friend">
                <img src="https://via.placeholder.com/50" alt="Friend">
                <span class="friend-name">Alice Johnson</span>
            </div>
            <div class="friend">
                <img src="https://via.placeholder.com/50" alt="Friend">
                <span class="friend-name">Bob Smith</span>
            </div>
            <div class="friend">
                <img src="https://via.placeholder.com/50" alt="Friend">
                <span class="friend-name">Carol Williams</span>
            </div>
        </div>
    </div>
</body>
</html>
