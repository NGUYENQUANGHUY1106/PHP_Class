<?php
 
 $start = $_POST['start'];
 $end = $_POST ['end'];

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
 if(isset($start) && isset($end))
 {
    $tong = 0 ;
    $tong_chan = 0;
    $tong_le = 0;
    $tich = 1;

    for($i = $start ; $i <= $end; $i++)
    {
        $tong+= $i;
    }
    
    for($i = $start ; $i <= $end; $i++)
    {
        $tich*= $i;
    }
    for($i = $start ; $i <= $end; $i++)
    {
        if($i%2==0)
        {
            $tong_chan += $i;
        }
        elseif ($i%2 !=0)
        {
            $tong_le += $i;
        }
    }
 }
?>
     <table border="1">
      <form action="sum_number.php" method="post">
       <tr>
        <td style="width: 70px;"></td>
        <td>Số Bắt Đầu </td>
        <td><input type="text" name="start"></td>
        <td>Số Kết Thúc</td>
        <td><input type="text" name="end"></td>
       </tr>

       <tr>
        <td colspan="5">Kết Quả</td>
       </tr>

       <tr>
        <td style="text-wrap: nowrap;">Tổng Các Số </td>
        <td  colspan="5"><label for=""> <?php echo $tong ?></label></td>

       </tr>

       <tr>
        <td style="text-wrap: nowrap;">Tích Các Số </td>
        <td  colspan="5"><label for=""><?php echo $tich ?></label></td>

       </tr>

       <tr>
        <td style="text-wrap: nowrap;">Tổng Các Số Chẳn </td>
        <td  colspan="5"><label for=""><?php echo $tong_chan ?></label></td>

       </tr>

       <tr>
        <td style="text-wrap: nowrap;">Tổng Các Số Lẻ </td>
        <td  colspan="5"><label for=""><?php echo $tong_le?></label></td>

       </tr>
       <tr>
        <td style="text-align: center;" colspan="5"><input type="submit" name="submit" value="Tính Toán"></td>
       </tr>

      </form>
    </table>

</body>