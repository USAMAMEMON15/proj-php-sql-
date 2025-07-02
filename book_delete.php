<?php
include("connection.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Validate ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid book ID");
}

$id = intval($_GET['id']);


$getImageQuery = $conn->prepare("SELECT bookImage FROM books WHERE id = ?");
$getImageQuery->bind_param("i", $id);
$getImageQuery->execute();
$getImageQuery->bind_result($bookImage);
$getImageQuery->fetch();
$getImageQuery->close();


$deleteQuery = $conn->prepare("DELETE FROM books WHERE id = ?");
$deleteQuery->bind_param("i", $id);

if ($deleteQuery->execute()) {
    
    if (!empty($bookImage) && file_exists("images/books/" . $bookImage)) {
        unlink("images/books/" . $bookImage);
    }

    
    echo "<script>
            alert('Book deleted successfully!');
            window.location.href = 'book_show.php';
          </script>";
} else {
    echo "<script>
            alert('Error deleting book.');
            window.location.href = 'book_show.php';
          </script>";
}

$deleteQuery->close();
?>