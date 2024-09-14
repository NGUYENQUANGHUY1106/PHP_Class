<?php
// Get IDs
$category_id = $_POST['category_id'];

// Delete the category from the database
require_once('database.php');

$query = "DELETE FROM categories WHERE categoryID = ?";

// Sử dụng prepared statement
$stmt = $db->prepare($query);

if ($stmt === false) {
    die("Error preparing statement: " . $db->error);
}

$stmt->bind_param("i", $category_id);

if ($stmt->execute()) {
    // Xóa thành công
    $stmt->close();
    // Display the Category List page
    include('category_list.php');
} else {
    // Xóa thất bại
    $error = "Error deleting category: " . $stmt->error;
    $stmt->close();
    // Hiển thị trang lỗi
    include('error.php');
}
?>