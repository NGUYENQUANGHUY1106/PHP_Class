<?php
// Get the product data
$category_name = $_POST['category_name'];

// Validate inputs
// Lấy dữ liệu từ form
$category_name = $_POST['category_name'];

// Kiểm tra tính hợp lệ của dữ liệu
if (empty($category_name)) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    // Nếu dữ liệu hợp lệ, thêm danh mục vào cơ sở dữ liệu
    require_once('database.php');
    
    // Sử dụng prepared statement để bảo mật và tránh lỗi cú pháp SQL
    $query = "INSERT INTO categories (categoryName) VALUES (:category_name)";
    $statement = $db->prepare($query);
    $statement->bindValue(':category_name', $category_name);
    $statement->execute();
    $statement->closeCursor();

    // Hiển thị trang danh sách sản phẩm
    include('category_list.php');
}

?>