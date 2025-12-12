<?php
$username = isset($_GET['user']) ? $_GET['user'] : 'Guest';
$avatar = isset($_GET['avatar']) ? $_GET['avatar'] : 'default.png';
$bio = isset($_GET['bio']) ? $_GET['bio'] : 'No bio provided';
$website = isset($_GET['website']) ? $_GET['website'] : '#';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Social Network</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .container { max-width: 600px; margin: 0 auto; }
        .header {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .header h1 { color: #333; }
        .nav { margin: 15px 0; }
        .nav a { color: #f5576c; text-decoration: none; margin: 0 10px; }
        .profile-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            text-align: center;
        }
        .avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid #f5576c;
            margin-bottom: 20px;
            object-fit: cover;
        }
        .username {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }
        .bio {
            color: #666;
            margin-bottom: 20px;
            line-height: 1.6;
        }
        .website-btn {
            display: inline-block;
            padding: 10px 25px;
            background: #f5576c;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            margin-bottom: 20px;
        }
        .website-btn:hover { background: #e0465b; }
        .stats { display: flex; justify-content: center; gap: 30px; margin-top: 20px; }
        .stat { text-align: center; }
        .stat-num { font-size: 24px; font-weight: bold; color: #f5576c; }
        .stat-label { color: #999; font-size: 12px; }
        .customize-form {
            background: white;
            padding: 25px;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .customize-form h3 { color: #333; margin-bottom: 15px; }
        .form-group { margin-bottom: 12px; }
        .form-group label { display: block; color: #666; margin-bottom: 5px; font-size: 14px; }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 5px;
        }
        .form-group input:focus { border-color: #f5576c; outline: none; }
        button {
            background: #f5576c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        button:hover { background: #e0465b; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🌸 Social Network</h1>
            <nav class="nav">
                <a href="index.php">Profile</a>
                <a href="settings.php">Settings</a>
                <a href="friends.php">Friends</a>
            </nav>
        </div>

        <div class="profile-card">
            <!-- VULNERABLE: User input directly in src attribute -->
            <img src="<?php echo $avatar; ?>" alt="Avatar" class="avatar" onerror="this.src='https://via.placeholder.com/120'">
            
            <!-- VULNERABLE: User input directly in attribute without proper escaping -->
            <div class="username" data-user="<?php echo $username; ?>"><?php echo htmlspecialchars($username); ?></div>
            
            <!-- VULNERABLE: User input in title attribute -->
            <p class="bio" title="<?php echo $bio; ?>"><?php echo htmlspecialchars($bio); ?></p>
            
            <!-- VULNERABLE: User input directly in href attribute -->
            <a href="<?php echo $website; ?>" class="website-btn" target="_blank">Visit Website</a>
            
            <div class="stats">
                <div class="stat">
                    <div class="stat-num">1.2K</div>
                    <div class="stat-label">Followers</div>
                </div>
                <div class="stat">
                    <div class="stat-num">847</div>
                    <div class="stat-label">Following</div>
                </div>
                <div class="stat">
                    <div class="stat-num">156</div>
                    <div class="stat-label">Posts</div>
                </div>
            </div>
        </div>

        <div class="customize-form">
            <h3>✏️ Customize Profile</h3>
            <form method="GET" action="index.php">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="user" placeholder="Enter username" value="<?php echo htmlspecialchars($username); ?>">
                </div>
                <div class="form-group">
                    <label>Avatar URL</label>
                    <input type="text" name="avatar" placeholder="Enter avatar URL">
                </div>
                <div class="form-group">
                    <label>Bio</label>
                    <input type="text" name="bio" placeholder="Enter your bio">
                </div>
                <div class="form-group">
                    <label>Website URL</label>
                    <input type="text" name="website" placeholder="Enter your website">
                </div>
                <button type="submit">Update Profile</button>
            </form>
        </div>
    </div>
</body>
</html>
