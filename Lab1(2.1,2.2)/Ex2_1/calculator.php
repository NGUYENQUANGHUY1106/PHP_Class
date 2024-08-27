<?php
 // lấy giá trị từ form 
 
 $product_description = $_POST['product_description'];
 // biến mô tả sản phẩm 
 $list_price = $_POST ['list_price'];
 // biến giá niêm yết   
 $discount_percent = $_POST['discount_percent'];
 // phần trăm giảm giá 

 // TÍNH TOÁN CHIẾT KHẤU 

 $discount  = $list_price * $discount_percent * .01 ;

 // số tiền giảm giá = giá niêm yết nhân với phần trăm giảm giá *  0.01 ;

 $discount_price = $list_price - $discount ;

 // giá cuối cùng = giá niêm yết  - giá đã giảm giá 

 $list_price_formatted = "$".number_format($list_price, 2);
 // định dạng giá niêm yết 1 số thành chuổi  với 2 chữ số thập phân
 $discount_percent_formatted = $discount_percent."%";
 // định dạng phần trăm giảm giá ở kí hiệu %
 $discount_formatted = "$".number_format($discount, 2);
 // định giá , số tiên giảm giá ở dạng 2 chữ số thập phân 

 $discount_price_formatted = "$".number_format($discount_price, 2); 
 // định giá , số tiền cuối cùng ở dạng 2 chữ số thập phân
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/main.css">
    <title>Calculator</title>
</head>
<body>
 <div class="div">
    <div class="content">
        <h1>Product Discount Calculator</h1>

        <label>Product Description:</label>
        <span><?php echo $product_description ?></span> <br />

        <label>List Price:</label>
        <span><?php echo $list_price_formatted ?></span> <br />

        <label>Standard Discount:</label>
        <span><?php echo $discount_percent_formatted ?></span> <br />

        <label>Discount Amount:</label>
        <span><?php echo $discount_formatted ?></span> <br />

        <label>Discount Price:</label>
        <span><?php echo $discount_price_formatted ?></span> <br />
    </div>
</div>

</body>
</html>

