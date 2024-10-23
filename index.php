<?php
// Initialize $messages as an empty array by default
$messages = [];

// Read messages from JSON file if it exists and is valid
if (file_exists('messages.json')) {
    $file_content = file_get_contents('messages.json');
    if (!empty($file_content)) {
        $decoded_messages = json_decode($file_content, true);
        if (is_array($decoded_messages)) {
            $messages = $decoded_messages;
        }
    }
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
    <form id="messageForm">
        <input type="text" name="message" id="messageInput" placeholder="Type your message..." required>
        <button type="submit">Post</button>
    </form>

    <h2>Messages:</h2>
    <ul id="messageList">
        <?php if (!empty($messages)): ?>
            <?php foreach ($messages as $msg): ?>
                <li><?php echo htmlspecialchars($msg); ?></li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No messages yet!</li>
        <?php endif; ?>
    </ul>

    <script>
        document.getElementById('messageForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Get the input message value
            const message = document.getElementById('messageInput').value;

            // Prepare the AJAX request
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'post.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            // Handle the response
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Parse the JSON response
                    const response = JSON.parse(xhr.responseText);

                    // Clear the input field
                    document.getElementById('messageInput').value = '';

                    // Update the message list
                    const messageList = document.getElementById('messageList');
                    const newMessage = document.createElement('li');
                    newMessage.textContent = response.message;
                    messageList.appendChild(newMessage);
                }
            };

            // Send the message data
            xhr.send('message=' + encodeURIComponent(message));
        });
    </script>
</body>
</html>
