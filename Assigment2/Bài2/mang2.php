<?php
$n = $_POST['so_phan_tu'];
$mang_so = array($n);
for($i=0;$i<$n;$i++)
{
    $mang_so[$i] = mt_rand(0,20);
}

function xuat_mang($mang_so)
{   
      echo implode(" ",$mang_so);  
}

function tim_min($mang_so)
{
    if(isset($mang_so[0]))
    {
        $min = $mang_so[0];
        $n = count($mang_so);
        for($i =1; $i< $n; $i++)
        {
            if($mang_so[$i] < $min)
            {
                 $min = $mang_so[$i];
            }
        }
        echo $min ;
    }
}

function tim_max($mang_so)
{
    if(isset($mang_so[0]))
    {
        $max = $mang_so[0];
        $n = count($mang_so);
        for($i =1; $i< $n; $i++)
        {
            if($mang_so[$i] > $max)
            {
                 $max = $mang_so[$i];
            }
        }
        echo $max ;
    }
}
 
 function tinh_tong($mang_so)
 {
    $tong_so = 0;
    $n = count($mang_so);
    for($i =0 ;$i<$n ; $i++ )
    {
        $tong_so += $mang_so[$i];
    }
    echo $tong_so;
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <div class="header">
            <p>PHÁT SINH MẢNG VÀ TÍNH TOÁN </p>
        </div>
        <form action="mang2.php" method="post">
            <table border="1">
                <tr>
                 <td>Nhập Số Phần Tử</td>
                 <td><input type="text" name="so_phan_tu"></td>
                </tr>
                <tr>
                 <td></td>
                 <td><input type="submit" value="Phát Sinh và tính toán"></td>
                </tr>
                <tr>
                 <td>Mảng</td>
                 <td><input type="text" name="mang_so" 
                     disabled="disabled" value="<?php xuat_mang($mang_so); ?>"></td>
                </tr>
                <tr>
                 <td>GTLN(MAX) trong mảng:</td>
                 <td><input type="text" name="gtln" 
                     disabled="disabled" value="<?php tim_max($mang_so); ?>"></td>
                </tr>
                <tr>
                 <td>GTNN(MIN) trong mảng:</td>
                 <td><input type="text" name="ttnn" 
                     disabled="disabled" value="<?php tim_min($mang_so); ?>"></td>
                </tr>
                <tr>
                 <td>Tổng mảng : </td>
                 <td><input type="text" name="tong" 
                     disabled="disabled" value="<?php tinh_tong($mang_so); ?>"></td>
                </tr>
             </table>
        </form>
    </div>
</body>
</html>