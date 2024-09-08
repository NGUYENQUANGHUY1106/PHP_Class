<?php
   $ket_qua = 0;
   $mang_so = [];
   $mang_nhan = isset($_POST['nhap_mang']) ? $_POST['nhap_mang'] : ""; 
   $check = isset($_POST['click']);

   if ($check) {
       $mang_so = explode(",", $mang_nhan);
       $n = count($mang_so); 
       for ($i = 0; $i < $n; $i++) {
           $ket_qua += (float)$mang_so[$i]; 
       }
   }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/Assigment2/Bai1/main.css">
</head>
<body>
    <div class="main">
    <link rel="stylesheet" href="/Assigment2/Bai1/main.css">
        <div class="header">
            <p>NHẬP VÀ TÍNH DÃY SỐ TRÊN</p>
        </div>
        <form action="mang1.php" method="post">
            <table>
                <tr>
                    <td>Nhập Dãy Số: </td>
                    <td><input type="text" name="nhap_mang" value="<?php echo htmlspecialchars($mang_nhan); ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Tổng Dãy Số" name="click"></td>
                </tr>
                <tr>
                    <td>Tổng Dãy Số: </td>
                    <td><input type="text" name="ket_qua" disabled="disabled" value="<?php echo $ket_qua; ?>"></td>               
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
