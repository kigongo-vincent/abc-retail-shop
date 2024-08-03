<?php
// Set the Content-Type header to application/json
header('Content-Type: application/json');

include("../components/connect.php");

include("../utilities/FILTER.php");

// Create an associative array with some sample data
$data = FILTER($db_connection, "products", "status", "available");

// Encode the array as a JSON object and output it
echo json_encode($data);
?>