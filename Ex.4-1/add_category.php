<?php
// Get the category data
$category_id = $_GET['category_id'] ?? 1;
$name = $_POST['name'];
// Validate inputs
if (empty($name)) {
    $error = "Invalid category data. Check all fields and try again.";
    include('error.php');
} else {
    // If valid, add the category to the database
    require_once('database.php');
    
    $query = "INSERT INTO categories (categoryName) VALUES (?)";
    
    // Sử dụng prepared statement
    $stmt = $db->prepare($query);
    if ($stmt === false) {
        $error = "Error preparing query: " . $db->error;
        include('error.php');
    } else {
        $stmt->bind_param("s", $name);
        
        if ($stmt->execute()) {
            // Display the Category List page
            include('category_list.php');
        } else {
            $error = "Error adding category: " . $stmt->error;
            include('error.php');
        }
        
        $stmt->close();
    }
}
?>