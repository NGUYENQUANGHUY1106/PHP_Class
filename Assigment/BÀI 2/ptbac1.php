<?php
 $a = $_POST['a'];
 $b =$_POST['b'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/main.css">
</head>
<body>
    <?php
     if($a == 0)
     {
        if($b==0)
        {
            $nghiem = "Phương Trình Vô số Nghiệm";
        }
        if($b<>0)
        {
            $nghiem = "Phương Trình Vô Số Nghiệm";
        }
     }
     else
     {
        $x = -($b/$a);
        $x = round($x,2);
        $nghiem = "x=$x";
        
     }
    ?>
     <table border="1">

    <form action="ptbac1.php" method="post">
        <tr>
            <td style="font-size: 18px; font-weight: bold; text-align: center;" colspan="5">Giải Phương Trình Bậc 1</td>

        </tr>
        <tr>
            <td>Phương Trình</td>
            <td><input type="text" name="a"></td>
            <td>X +</td>
            <td><input type="text" name="b"></td>
            <td>=0</td>
        </tr>
        <tr>
            <td>Nghiệm</td>
            <td colspan="4"><label><?php echo $x ?></label></td>
            
        </tr>
        <tr>
            <td style="text-align: center;"  colspan="5"><input style="width: 80px; height: '15px';" type="submit" name="submit"></td>
        </tr>
    </form>

    </table>
</body>