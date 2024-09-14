<?php
function get_products_by_category($category_id) {
    global $db;
    $query = "SELECT * FROM products WHERE categoryID = '$category_id' ORDER BY productID";
    $result = $db->query($query);

    if ($result === false) {
        // Hiển thị lỗi nếu truy vấn thất bại
        die('Query failed: ' . $db->error);
    }

    return $result;
}

function get_products() {
    global $db;
    $query = 'SELECT * FROM products ORDER BY productID';
    $result = $db->query($query);

    if ($result === false) {
        // Hiển thị lỗi nếu truy vấn thất bại
        die('Query failed: ' . $db->error);
    }

    return $result;
}


function get_product($product_id) {
    global $db;
    $query = "SELECT * FROM products WHERE productID = '$product_id'";
    $result = $db->query($query);
    
    if ($result === false) {
        // Hiển thị lỗi nếu truy vấn thất bại
        die('Query failed: ' . $db->error);
    }

    $product = $result->fetch_assoc();
    return $product;
}

function delete_product($product_id) {
    global $db;
    $query = "DELETE FROM products WHERE productID = '$product_id'";
    $result = $db->query($query);

    if ($result === false) {
        // Hiển thị lỗi nếu truy vấn thất bại
        die('Query failed: ' . $db->error);
    }

    return true; // Không cần fetch_assoc() vì DELETE không trả về dữ liệu
}


function add_product($category_id, $code, $name, $price) {
    global $db;
    $query = "INSERT INTO products (categoryID, productCode, productName, listPrice)
              VALUES ('$category_id', '$code', '$name', '$price')";
    
    $result = $db->query($query);

    if ($result === false) {
        // Hiển thị lỗi nếu truy vấn thất bại
        die('Query failed: ' . $db->error);
    }

    return true; // Không cần fetch_assoc() vì INSERT không trả về dữ liệu
}

?>