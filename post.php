<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = trim($_POST['message']);

    if (!empty($message)) {
        // Read existing messages from JSON file
        $messages = [];
        if (file_exists('messages.json')) {
            $messages = json_decode(file_get_contents('messages.json'), true);
        }

        // Add the new message to the array
        $messages[] = $message;

        // Save the updated messages back to JSON file
        file_put_contents('messages.json', json_encode($messages));

        // Return the posted message as JSON response
        echo json_encode(['message' => $message]);
    }
}


?>
