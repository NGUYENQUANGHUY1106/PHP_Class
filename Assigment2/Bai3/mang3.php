<?php
$mang_so = array();
$mang_duy_nhat = array();
$so_lan = array();
$chuoi = "";

if (isset($_POST['nhap_mang'])) {
    $mang_so = explode(",", $_POST['nhap_mang']);
    $mang_duy_nhat = array_unique($mang_so);
    // Dùng để xóa các phần tử lặp lại trong mảng 
    $so_lan = array_count_values($mang_so);
    // Dùng để đếm số lần xuất hiện từng phần tử và trả về một Associative Array

    foreach ($so_lan as $key => $value) {
        $chuoi = $chuoi . $key . ":" . $value . " ";
    }
}

function mang_duy_nhat($mang_so)
{
    if (isset($mang_so[0])) {
        return implode(", ", $mang_so);
    }
    return "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .main {
            width: 450px;
            border: 1px solid;
            padding: 10px;
        }
        .p {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="main"> 
        <div class="p">
            ĐẾM SỐ LẦN XUẤT HIỆN VÀ TẠO MẢNG DUY NHẤT  
        </div>
        <form action="" method="post">
            <table border="1">
                <tr>
                    <td>Nhập mảng</td>
                    <td><input type="text" name="nhap_mang" value="<?php echo isset($_POST['nhap_mang']) ? $_POST['nhap_mang'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>Số Lần Xuất Hiện:</td>
                    <td><input type="text" name="so_lan_xuat_hien" value="<?php echo $chuoi; ?>" disabled="disabled"></td>
                </tr>
                <tr>
                    <td>Mảng duy nhất:</td>
                    <td><input type="text" name="mang_duy_nhat" value="<?php echo mang_duy_nhat($mang_duy_nhat); ?>" disabled="disabled"></td>
                </tr>
                <tr>
                    <td style="text-align: center;" colspan="2"><input type="submit" value="Xử lý"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
