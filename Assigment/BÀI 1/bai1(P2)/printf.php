<?php
 $name = $_POST['name'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Chào các bạn</title>
 </head>
 <body>

 <?php
  if(isset($name))
  {
    $printf_name = "Chào bạn ".$name;
  }
 ?>

<form action="printf.php" method="post">
      <table border="1">
        <tr>
            <td style="text-align: center; font-size: 18px; font-weight: bold; background-color: blue;" colspan="2">In Lời Xin Chào</td>
        </tr>
        <tr>
            <td>Họ Và Tên Của Bạn</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td style="width: 100%; height: 15px; text-align: center;" colspan="2"><label><?php echo $printf_name ?></label></td>        
        </tr>
        <tr>
            <td style="text-align: center;" colspan="2"><input type="submit" name="submit" value="Xuất"></td>
        </tr>

      </table>

    </form>
 </body>