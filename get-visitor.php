<?php
header('Content-Type: application/json');

// Include the DBConnection class
require_once 'db/DBConnection.php';

try {
    // Create a new DBConnection instance and connect to the database
    $database = new DBConnection();
    $pdo = $database->connect();

    // Get the POST data
    $input = json_decode(file_get_contents("php://input"));
    $code = $input->code ?? '';

    // Prepare and execute the query
    $stmt = $pdo->prepare("SELECT `name`,  `company` FROM visitors_shorted WHERE Entry_Code = :code");
    $stmt->execute(['code' => $code]);

    // Fetch the visitor data
    $visitor = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Return the response
    echo json_encode(['visitor' => $visitor ? [$visitor] : []]);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>