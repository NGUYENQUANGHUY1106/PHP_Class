<?php
    // Kết nối cơ sở dữ liệu
    $host = "localhost:3366";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "my_guitar_shop1";

    $db = new mysqli($host, $dbusername, $dbpassword, $dbname);

    // Kiểm tra kết nối
    if ($db->connect_error) {
        die("Kết nối thất bại: " . $db->connect_error);
    }

    // Lấy ID danh mục, nếu không có thì gán giá trị mặc định là 1
    $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : 1;

    // Lấy tên cho danh mục hiện tại
    $query = "SELECT categoryName, productName, listPrice 
          FROM categories 
          INNER JOIN products 
          ON categories.categoryID = products.categoryID 
          WHERE listPrice > 800 
          ORDER BY listPrice ASC";;
    $result = $db->query($query);

    // Kiểm tra kết quả truy vấn
    if ($result && $result->num_rows > 0) {
        $category = $result->fetch_assoc();
        $category_name = $category['categoryName'];
    } else {
        die("Lỗi truy vấn: Không tìm thấy danh mục.");
    }

    // Lấy tất cả các danh mục
    $query = 'SELECT * FROM categories ORDER BY categoryID';
    $categories = $db->query($query);

    // Kiểm tra kết quả truy vấn
    if (!$categories) {
        die("Lỗi truy vấn: " . $db->error);
    }

    // Lấy sản phẩm cho danh mục được chọn
    $query = "SELECT * FROM products WHERE categoryID = $category_id ORDER BY productID";
    $products = $db->query($query);

    // Kiểm tra kết quả truy vấn
    if (!$products) {
        die("Lỗi truy vấn: " . $db->error);
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <!-- Phần head -->
    <head>
        <title>My Guitar Shop</title>
        <link rel="stylesheet" type="text/css" href="main.css" />
    </head>

    <!-- Phần body -->
    <body>
    <div id="page">
        <div id="main">

            <h1>Danh sách sản phẩm</h1>

            <div id="sidebar">
                <!-- Hiển thị danh sách các danh mục -->
                <h2>Danh mục</h2>
                <ul class="nav">
                <?php foreach ($categories as $category) : ?>
                    <li>
                    <a href="?category_id=<?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </a>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>

            <div id="content">
                <!-- Hiển thị bảng các sản phẩm -->
                <h2>Sản phẩm</h2>
                <table>
                    <tr>
                        <th>categoryName</th>
                        <th>productName</th>
                        <th class="right">listPrice</th>
                    </tr>
                    <?php foreach ($result as $row) : ?>
                    <tr>
                        <td><?php echo $row['categoryName']; ?></td>
                        <td><?php echo $row['productName']; ?></td>
                        <td class="right"><?php echo number_format($row['listPrice'], 2); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div><!-- kết thúc main -->
        <div id="footer"></div>
    </div><!-- kết thúc page -->
    </body>
</html>
