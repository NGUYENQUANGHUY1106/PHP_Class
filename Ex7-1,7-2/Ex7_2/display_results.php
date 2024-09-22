<?php
    // lấy dữ liệu từ biểu mẫu
    $investment = $_POST['investment'];
    $interest_rate = $_POST['interest_rate'];
    $years = $_POST['years'];

    // validate years entry (vì investment và interest_rate đã được kiểm tra khi chọn từ drop-down)
    if (empty($years)) {
        $error_message = 'Years is a required field.'; 
    } else if (!is_numeric($years) || $years <= 0)  {
        $error_message = 'Years must be a valid number greater than zero.';
    } else {
        $error_message = '';
    }

    // nếu có lỗi, quay lại trang index
    if ($error_message != '') {
        include('index.php');
        exit();
    }

    // tính giá trị tương lai
    $future_value = $investment;
    for ($i = 1; $i <= $years; $i++) {
        $future_value = $future_value + ($future_value * $interest_rate * 0.01);
    }

    // định dạng kết quả
    $investment_f = '$'.number_format($investment, 2);
    $yearly_rate_f = $interest_rate.'%';
    $future_value_f = '$'.number_format($future_value, 2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
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
    </div>
</body>
</html>
