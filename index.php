<?php
// Read messages from JSON file
$messages = [];
if (file_exists('messages.json')) {
    $messages = json_decode(file_get_contents('messages.json'), true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatter</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        input { padding: 10px; width: 300px; }
        button { padding: 10px; }
        ul { list-style-type: none; padding: 0; }
        li { background: #f4f4f4; margin: 5px 0; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <h1>Chatter</h1>
    <form id="messageForm" action="post.php" method="POST">
        <input type="text" name="message" placeholder="Type your message..." required>
        <button type="submit">Post</button>
    </form>

    <h2>Messages:</h2>
    <ul>
        <?php foreach ($messages as $msg): ?>
            <li><?php echo htmlspecialchars($msg); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
