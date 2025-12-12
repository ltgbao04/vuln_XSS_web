<?php
session_start();

// Simple file-based storage for comments
$commentsFile = 'comments.json';

function getComments() {
    global $commentsFile;
    if (file_exists($commentsFile)) {
        return json_decode(file_get_contents($commentsFile), true) ?: [];
    }
    return [];
}

function saveComment($name, $comment) {
    global $commentsFile;
    $comments = getComments();
    $comments[] = [
        'name' => $name,  // VULNERABLE: No sanitization
        'comment' => $comment,  // VULNERABLE: No sanitization
        'date' => date('Y-m-d H:i:s')
    ];
    file_put_contents($commentsFile, json_encode($comments));
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && isset($_POST['comment'])) {
    saveComment($_POST['name'], $_POST['comment']);
    header('Location: index.php');
    exit;
}

$comments = getComments();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Blog - Share Your Thoughts</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .header {
            background: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .header h1 { color: #333; margin-bottom: 10px; }
        .header p { color: #666; }
        .nav { margin: 20px 0; }
        .nav a { color: #11998e; text-decoration: none; margin: 0 15px; font-weight: 500; }
        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .card h2 { color: #333; margin-bottom: 20px; border-bottom: 2px solid #11998e; padding-bottom: 10px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; color: #333; font-weight: 500; }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        .form-group textarea { min-height: 100px; resize: vertical; }
        .form-group input:focus, .form-group textarea:focus { border-color: #11998e; outline: none; }
        button {
            background: #11998e;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover { background: #0d7a6e; }
        .comment {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 15px;
            border-left: 4px solid #11998e;
        }
        .comment-header { display: flex; justify-content: space-between; margin-bottom: 10px; }
        .comment-name { font-weight: bold; color: #11998e; }
        .comment-date { color: #999; font-size: 12px; }
        .comment-text { color: #333; line-height: 1.6; }
        .no-comments { text-align: center; color: #999; padding: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🌿 Community Blog</h1>
            <p>Share your thoughts with our community</p>
            <nav class="nav">
                <a href="index.php">Home</a>
                <a href="about.php">About</a>
                <a href="rules.php">Rules</a>
            </nav>
        </div>

        <div class="card">
            <h2>💬 Leave a Comment</h2>
            <form method="POST" action="index.php">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" required placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label for="comment">Your Comment</label>
                    <textarea id="comment" name="comment" required placeholder="Share your thoughts..."></textarea>
                </div>
                <button type="submit">Post Comment</button>
            </form>
        </div>

        <div class="card">
            <h2>📝 Recent Comments</h2>
            <?php if (empty($comments)): ?>
                <div class="no-comments">No comments yet. Be the first to share!</div>
            <?php else: ?>
                <?php foreach (array_reverse($comments) as $c): ?>
                    <div class="comment">
                        <div class="comment-header">
                            <!-- VULNERABLE: Direct output without escaping -->
                            <span class="comment-name"><?php echo $c['name']; ?></span>
                            <span class="comment-date"><?php echo $c['date']; ?></span>
                        </div>
                        <!-- VULNERABLE: Direct output without escaping -->
                        <div class="comment-text"><?php echo $c['comment']; ?></div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
