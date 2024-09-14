<?php
// Get the product data
$category_id = $_POST['category_id'];
$code = $_POST['code'];
$name = $_POST['name'];
$price = $_POST['price'];

// Validate inputs
if (empty($code) || empty($name) || empty($price)) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    // If valid, add the product to the database
    require_once('database.php');
    $query = "INSERT INTO products 
              (categoryID, productCode, productName, listPrice)
              VALUES 
              (?, ?, ?, ?)";
    
    // Sử dụng prepared statement để tránh SQL injection
    $stmt = $db->prepare($query);
    $stmt->bind_param("issd", $category_id, $code, $name, $price);
    
    if ($stmt->execute()) {
        // Display the Product List page
        include('index.php');
    } else {
        $error = "Error adding product: " . $db->error;
        include('error.php');
    }
    
    $stmt->close();
}
?>