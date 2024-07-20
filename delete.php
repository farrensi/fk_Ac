<?php
require_once 'config.php';

// Get the id of the jasa to be deleted
$id = $_GET['id'];

// Check if the id is set and is a valid integer
if (isset($id) && is_numeric($id)) {
    // Delete the jasa from the database
    $sql = "DELETE FROM jasa WHERE id = $id";
    $result = $conn->query($sql);

    // Check if the deletion was successful
    if ($result) {
        echo "Jasa with ID $id has been deleted successfully!";
        header("Location: admin.php"); // Redirect back to the index page
        exit;
    } else {
        echo "Error deleting jasa: " . $conn->error;
    }
} else {
    echo "Invalid ID";
}

$conn->close();
?>