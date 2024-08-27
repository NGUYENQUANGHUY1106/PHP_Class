<?php
  $a = $_POST['a'];
  $b = $_POST['b'];
  $c = $_POST['c'];
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
   function pt_bac1 ($a,$b)
   {
    if($a==0)
    {
        if($b==0)
        {
            $nghiem = "Phương Trình có vô số nghiệm";
        }
        if($b<>0)
        {
          $nghiem = "Phương tình vô nghiệm";
        }
    }
    else
    {
        $nghiem = "x= round(-($b/$a),2)";
    }
    return $nghiem;
   }

   function pt_bac2($a,$b,$c)
   {
     if($a==0)
     {
      $nghiem = pt_bac1($b,$c);
     }
     if($a<>0)
     {
      $denlta = pow($b,2)-4*$a*$c;
      if($denlta<0)
      {
        $nghiem ="Phương Trình Vô Nghiệm";
      }
      if($denlta==0)
      {
        $nghiem = "Phương Trình Có Nghiệm Kép x1=x1".-($b/(2*$a));
      }
      else
      {
        $can=sqrt($denlta);
        $x1=(-$b+$can)/(2*$a);
        $x2=(-$b-$can)/(2*$a);
        $nghiem="Phương trình có 2 nghiệm phân biệt 
        x1=".round($x1,2).",
        x2=".round($x2,2);

      }
     }
     return $nghiem;
   }
   if(isset($a)&&isset($b)&& isset($c))
   {
    $nghiem = pt_bac2($a,$b,$c);
   }
  ?>
    <table border="1">
        <form action="PT_Bac2.php" method="post">
          <tr>
            <td style="background-color: red; color: white; text-align: center; font-size: 18px ; font-weight: bold;" colspan="4">Giải Phương Trình Bậc 2</td>
          </tr>
          <tr>
            <td>Phương Trình</td>
            <td><input type="text" name="a">X^2 + </td>
            <td><input type="text" name="b">X + </td>
            <td><input type="text" name="c">=0</td>
          </tr>

          <tr>
            <td>Nghiệm</td>
            <td colspan="3"><label style="text-wrap: nowrap;" for=""><?php if(isset($nghiem)) echo $nghiem  ?></label></td>
          </tr>

          <tr>
            <td style="text-align: center;" colspan="5"><input type="submit" name="submit" id=""></td>
          </tr>

        </form>
    </table>
</body>