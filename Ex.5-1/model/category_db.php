<?php
function get_categories() {
    global $db;
    $query = 'SELECT * FROM categories ORDER BY categoryID';
    $result = $db->query($query);

    if ($result === false) {
        // Xử lý lỗi truy vấn nếu cần
        die("Error retrieving categories: " . $db->error);
    }

    return $result;
}

function get_category_name($category_id) {
    global $db;
    
    // Sử dụng Prepared Statement để bảo mật
    $query = "SELECT categoryName FROM categories WHERE categoryID = ?";
    $stmt = $db->prepare($query);
    
    if ($stmt === false) {
        die("Error preparing statement: " . $db->error);
    }
    
    // Gán tham số với kiểu integer
    $stmt->bind_param("i", $category_id);
    
    // Thực thi câu truy vấn
    if ($stmt->execute()) {
        // Lấy kết quả
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            // Sử dụng fetch_assoc() để lấy dữ liệu dưới dạng mảng kết hợp
            $category = $result->fetch_assoc();
            $category_name = $category['categoryName'];
            $stmt->close();
            return $category_name;
        } else {
            $stmt->close();
            return null; // Hoặc xử lý trường hợp không tìm thấy category
        }
    } else {
        // Xử lý lỗi thực thi nếu cần
        die("Error executing statement: " . $stmt->error);
    }
}
?>
