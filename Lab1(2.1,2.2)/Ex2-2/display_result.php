<?php
    $investment = $_POST['investment'];
    $interest_rate = $_POST['interest_rate'];
    $years = $_POST['years'];

    // kiểm tra xác định mục nhập đầu tư 
    if(empty($investment))
    {
        $error_massage = 'Investment is a required field.';
        // kiểu tra giá trị nhập vào có rổng k 
    }
    else if ( !is_numeric($investment) )  {
        $error_message = 'Investment must be a valid number.'; }
        // kiểm tra xem giá trị nhập vào có phải số k 
    else if ( $investment <= 0 ) {
        $error_message = 'Investment must be greater than zero.'; }
        // ktra giá trị nhập vào lớn hơn 0 hay k ;


    // kiểm tra mục nhập lãi suất
    else if ( empty($interest_rate) ) {
        $error_message = 'Interest rate is a required field.'; }
    else if ( !is_numeric($interest_rate) )  {
        $error_message = 'Interest rate must be a valid number.'; }
    else if ( $interest_rate <= 0 OR $interest_rate > 15 ) {
        $error_message = 'Interest rate must be greater than zero and less than or equal to 15.'; }
        // ktra xem giá trị nhập vào có nhỏ hơn 0 hoặc lơn hơn 15 hay k
    
        // kiêm tra xác định năm 

        // validate years entry
    else if ( empty($years) ) {
        $error_message = 'Years is a required field.'; }
    else if ( !is_numeric($years) )  {
        $error_message = 'Years must be a valid number.'; }
    else if ( $years <= 0 OR $years > 50 ) {
        $error_message = 'Years be greater than zero and less than or equal to 50.'; }
        // như trên
    else {
        $error_message = ''; }

    // nếu cs thông báo lỗi điều hướng đến trang index.php
    if ($error_message != '') {
        include('index.php');
         exit();
            }

    // tính giá trị tương lai

     // calculate the future value
     $future_value = $investment;
     for ($i = 1; $i <= $years; $i++) {
         $future_value = ($future_value + ($future_value * $interest_rate *.01));
     }
     // apply currency and percent formatting
     $investment_f = '$'.number_format($investment, 2);
     $yearly_rate_f = $interest_rate.'%';
     $future_value_f = '$'.number_format($future_value, 2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="/main.css"/>
</head>
<body>
    <div id="content">
        <h1>Future Value Calculator</h1>

        <label>Investment Amount:</label>
        <span><?php echo $investment_f; ?></span><br />

        <label>Yearly Interest Rate:</label>
        <span><?php echo $yearly_rate_f; ?></span><br />

        <label>Number of Years:</label>
        <span><?php echo $years; ?></span><br />

        <label>Future Value:</label>
        <span><?php echo $future_value_f; ?></span><br />
        <p>This calculation was done on <?php echo date('m/d/y'); ?> </p>
    </div>
</body>
</html>