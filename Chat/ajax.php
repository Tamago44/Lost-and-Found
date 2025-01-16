<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $token = $_POST['token'] ?? '';

    // Validate token and get the logged-in user
    $stmt = $pdo->prepare("SELECT * FROM users WHERE token = ?");
    $stmt->execute([$token]);
    $user = $stmt->fetch();

    if (!$user) {
        die("Access denied: Invalid token.");
    }

    $user_id = $user['id'];
    $is_admin = $user['role'] === 'admin';

    if ($action === 'fetch_messages') {
        $receiver_id = $_POST['receiver_id'] ?? null;

        if ($is_admin) {
            // Admin sees messages with the selected user
            if ($receiver_id) {
                $stmt = $pdo->prepare("
                    SELECT m.*, u.username AS sender_username
                    FROM messages m
                    JOIN users u ON m.sender_id = u.id
                    WHERE (m.sender_id = :receiver_id AND m.receiver_id = :admin_id)
                       OR (m.sender_id = :admin_id AND m.receiver_id = :receiver_id)
                    ORDER BY m.timestamp ASC
                ");
                $stmt->execute(['receiver_id' => $receiver_id, 'admin_id' => $user_id]);
            } else {
                echo "<p>Select a user to start chatting.</p>";
                exit();
            }
        } else {
            // Regular users see only their own messages with the admin
            $stmt = $pdo->prepare("
                SELECT m.*, u.username AS sender_username
                FROM messages m
                JOIN users u ON m.sender_id = u.id
                WHERE (m.sender_id = :user_id AND m.receiver_id = :admin_id)
                   OR (m.sender_id = :admin_id AND m.receiver_id = :user_id)
                ORDER BY m.timestamp ASC
            ");
            $stmt->execute(['user_id' => $user_id, 'admin_id' => 1]); // Admin ID assumed to be 1
        }

        $messages = $stmt->fetchAll();
        foreach ($messages as $message) {
            echo "<p><strong>{$message['sender_username']}:</strong> {$message['message']}</p>";
        }
    }

    if ($action === 'send_message') {
        $receiver_id = $_POST['receiver_id'];
        $message = $_POST['message'];

        // Insert new message into database
        $stmt = $pdo->prepare("INSERT INTO messages (sender_id, receiver_id, message) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $receiver_id, $message]);
    }
}
?>
