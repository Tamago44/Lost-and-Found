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
$query = "SELECT * FROM items WHERE item_type = 'found' ORDER BY date_reported DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Loop through items and display them as cards
foreach ($items as $item) {
    $itemType = htmlspecialchars($item['item_type']);
    $itemName = htmlspecialchars($item['item_name']);
    $whenLost = htmlspecialchars($item['when_lost']);
    $whereLost = htmlspecialchars($item['where_lost']);
    $description = htmlspecialchars($item['description']);
    $dateReported = htmlspecialchars($item['date_reported']);
    ?>
        <div class="item-lost-name text-center my-1 mb-4">
           <h3 class="fw-bold"><?php echo ucfirst($itemName) ?></h3>
        </div>
        <div class="description-container">
           <p class="fw-bold fs-5 mb-3">Description: <?php echo $description ?></p>
        </div>  
        <div class="etc-labels">
           <p class="m-0">When: <?php echo $whenLost ?> </p>
           <p class="m-0">Status:Found<p>                                                  <p class="m-0">Date Reported: <?php echo $dateReported ?> </p>
        </div> 
        <div class="close-message-buttons">
           <button class="close-button" id="close">Close</button>                                                       
          <button class="message-button" >Message</button>                                                     
        </div>                                             
    <?php
}

// Close database connection
$conn = null;
?>
