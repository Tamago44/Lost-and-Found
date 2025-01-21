<?php
// Database connection
$host = 'localhost';
$dbname = 'chat_system';
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Fetch found items
$query = "SELECT * FROM items WHERE item_type = 'found' ORDER BY date_reported DESC LIMIT 6";
$stmt = $conn->prepare($query);
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Loop through items and display them as cards
foreach ($items as $item) {
    $itemId = htmlspecialchars($item['id']); // Add this line to get the item ID
    $itemType = htmlspecialchars($item['item_type']);
    $itemName = htmlspecialchars($item['item_name']);
    $whenLost = htmlspecialchars($item['when_lost']);
    $whereLost = htmlspecialchars($item['where_lost']);
    $description = htmlspecialchars($item['description']);
    $dateReported = htmlspecialchars($item['date_reported']);
    ?>
    <div class="boxes-container" data-id="<?php echo $itemId; ?>">
        <div class="item-lost-txt">Item Found:</div>
        <div class="item-lost-name"><?php echo ucfirst($itemName); ?></div>
        <div class="item-status">Status: <?php echo $itemType; ?></div>
        <div class="date-reported-text">Date: <?php echo $dateReported; ?></div>
    </div>
    <?php
}

// Close database connection
$conn = null;
?>