<?php
 $number = $_POST['number']
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      if(isset($number))
      {
        if(is_numeric($number))
        {
            switch($number)
            {
                case 0 ;
                $chu = "Khong";
                break;

                case 1 ;
                $chu = "Một";
                break;

                case 2 ;
                $chu = "Hai";
                break;

                case 3 ;
                $chu = "Ba";
                break;

                case 4 ;
                $chu = "Bốn";
                break;

                case 5 ;
                $chu = "Năm";
                break;

                case 6 ;
                $chu = "Sáu";
                break;

                case 7 ;
                $chu = "Bảy";
                break;

                case 8 ;
                $chu = "Tám ";
                break;

                case 9 ;
                $chu = "Chín";
                break;
            }
        }
      }
    ?>

    <form action="switch_case.php" method="post">
            <table border="">
                <tr>
                    <td colspan="3">Đọc số</td>
                </tr>
                <tr>
                <tr>
                    <td>Nhập Số (0-9)</td>
                    <td rowspan="2"><input type="submit" name="submit"></td>
                    <td>Bằng Chữ</td>
                </tr>
                <tr>
                    <td><input type="text" name="number"></td>
                    <td><label > <?php echo $chu ?></label></td>
                </tr>
                </tr>
            </table>
   </form>
</body>