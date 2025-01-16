<?php
// Database connection
$host = 'localhost';
$dbname = 'lost_and_found';
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Fetch item details based on ID
if (isset($_GET['id'])) {
    $itemId = intval($_GET['id']); // Ensure the ID is an integer
    $query = "SELECT * FROM items WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $itemId, PDO::PARAM_INT);
    $stmt->execute();
    $item = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($item) {
        $itemName = htmlspecialchars($item['item_name']);
        $description = htmlspecialchars($item['description']);
        $whenLost = htmlspecialchars($item['when_lost']);
        $whereLost = htmlspecialchars($item['where_lost']);
        $dateReported = htmlspecialchars($item['date_reported']);
        ?>
        <div class="item-lost-name text-center my-1 mb-4">
            <h3 class="fw-bold"><?php echo ucfirst($itemName); ?></h3>
        </div>
        <div class="description-container">
            <p class="fw-bold fs-5 mb-3">Description: <?php echo $description; ?></p>
        </div>
        <div class="etc-labels">
            <p class="m-0">When: <?php echo $whenLost; ?></p>
            <p class="m-0">Status: Found</p>
            <p class="m-0">Date Reported: <?php echo $dateReported; ?></p>
        </div>
        <div class="close-message-buttons">
            <button class="close-button" id="close">Close</button>
            <button class="message-button">Message</button>
        </div>
        <?php
    } else {
        echo "<p>Item not found.</p>";
    }
} else {
    echo "<p>No item ID provided.</p>";
}

// Close database connection
$conn = null;
?>