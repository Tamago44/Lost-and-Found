<?php
// submit.php

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

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $itemType = $_POST['itemType'];
    $itemName = $_POST['itemName'];
    $whenLost = $_POST['whenLost'];
    $whereLost = $_POST['whereLost'];
    $description = $_POST['description'];
    $dateReported = $_POST['dateReported'];

    // Validate form data
    if (empty($itemType) || empty($itemName) || empty($description) || empty($dateReported)) {
        echo 'Please fill in all required fields.';
        exit;
    }

    // Prepare SQL query
    $stmt = $conn->prepare("INSERT INTO items    (item_type, item_name, when_lost, where_lost, description, date_reported) VALUES (:itemType, :itemName, :whenLost, :whereLost, :description, :dateReported)");
    // Bind parameters
    $stmt->bindParam(':itemType', $itemType);
    $stmt->bindParam(':itemName', $itemName);
    $stmt->bindParam(':whenLost', $whenLost);
    $stmt->bindParam(':whereLost', $whereLost);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':dateReported', $dateReported);

    // Execute query
    try {
        $stmt->execute();
         header('Location: report-page.html');
         exit;
    } catch (PDOException $e) {
        echo 'Error submitting report: ' . $e->getMessage();
    }
} else {
    echo 'Invalid request method.';
}

// Close database connection
$conn = null;
?>