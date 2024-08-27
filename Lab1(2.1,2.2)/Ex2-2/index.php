<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/main.css">
</head>
<body>
    <div class="div">
        <h1>
            FUTURE VALUE CALCULATOR 
        </h1>
      <?php if(!empty($error_massage)) { ?>
        <p class= "error"><?php echo $error_massage; ?> </p>
      <?php } ?>
      
    <form action="display_result.php" method="post">
      
      <div class="center">
            <label >Investment Amount:</label>
            <input type="text" name="investment" 
             value="<?php echo $investment; ?>"/><br /> 
           

            <label >Yearly Interest Rate:</label>
            <input type="text" name="interest_rate"
             value="<?php echo $interest_rate; ?>"/><br />

            <label >Number of Years:</label>
            <input type="text" name="years" 
             value="<?php echo $years; ?>"/><br />
      </div>

      <div class="button">
        <input type="submit" value="Calculator">
      </div>


    </form>
  </div>
</body>
</html>