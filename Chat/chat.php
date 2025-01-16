<?php
require 'db.php';

// Validate token
if (!isset($_GET['token'])) {
    die("Access denied: No token provided.");
}

$token = $_GET['token'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE token = ?");
$stmt->execute([$token]);
$user = $stmt->fetch();

if (!$user) {
    die("Access denied: Invalid token.");
}

$is_admin = $user['role'] === 'admin';
$user_id = $user['id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>
    <script>
function fetchMessages() {
    const receiverId = document.getElementById('receiver_id') ? document.getElementById('receiver_id').value : null;
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (this.status === 200) {
            document.getElementById('chat-box').innerHTML = this.responseText;
        }
    };

    // Include receiver_id for admin, null for regular users
    const params = `action=fetch_messages&receiver_id=${receiverId || ''}&token=<?= $token ?>`;
    xhr.send(params);
}

function sendMessage() {
    const message = document.getElementById('message').value;
    const receiverId = document.getElementById('receiver_id') ? document.getElementById('receiver_id').value : 1; // Admin ID is 1
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (this.status === 200) {
            fetchMessages();
            document.getElementById('message').value = '';
        }
    };
    const params = `action=send_message&message=${message}&receiver_id=${receiverId}&token=<?= $token ?>`;
    xhr.send(params);
}

setInterval(fetchMessages, 1000); // Refresh messages every second

    </script>
</head>
<body>
    <h2>Welcome, <?= $user['username'] ?>!</h2>
    <?php if ($is_admin): ?>
    <h3>Chat with a User</h3>
    <select id="receiver_id" onchange="fetchMessages()">
        <?php
        $stmt = $pdo->query("SELECT * FROM users WHERE role = 'user'");
        while ($u = $stmt->fetch()) {
            echo "<option value='{$u['id']}'>{$u['username']}</option>";
        }
        ?>
    </select>
    <div id="chat-box" style="border: 1px solid #000; height: 300px; overflow-y: scroll;">
        <!-- Messages will be dynamically loaded here -->
    </div>
    <textarea id="message" placeholder="Type your message"></textarea>
    <button onclick="sendMessage()">Send</button>
<?php else: ?>
    <h3>Chat with Admin</h3>
    <div id="chat-box" style="border: 1px solid #000; height: 300px; overflow-y: scroll;">
        <!-- Messages will be dynamically loaded here -->
    </div>
    <textarea id="message" placeholder="Type your message"></textarea>
    <button onclick="sendMessage()">Send</button>
<?php endif; ?>

    <a href="logout.php">Logout</a>
</body>
</html>
