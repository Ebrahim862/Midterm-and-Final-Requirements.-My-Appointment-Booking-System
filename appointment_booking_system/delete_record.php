<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo json_encode(["success" => "Record Deleted Successfully"]);
    } else {
        echo json_encode(["error" => "Error deleting record"]);
    }
    
    $stmt->close();
} else {
    echo json_encode(["error" => "Invalid request"]);
}
?>