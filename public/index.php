<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang PHP & HTML Đơn Giản với Docker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: auto;
        }
        h1 {
            color: #0056b3;
        }
        .date-time {
            font-size: 0.9em;
            color: #666;
            margin-top: 20px;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }
        .greeting {
            font-weight: bold;
            color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Chào mừng bạn đến với trang PHP & HTML với Docker!</h1>

        <?php
        $name = "Độc giả";

        if (isset($_GET['name']) && !empty($_GET['name'])) {
            $name = htmlspecialchars($_GET['name']);
        }

        echo "<p class='greeting'>Xin chào, " . $name . "!</p>";
        echo "<p>Đây là một ví dụ về cách PHP có thể nhúng vào HTML để tạo nội dung động, được <strong>đóng gói bởi Docker</strong>.</p>";

        $currentDateTime = date("H:i:s, d/m/Y");
        ?>

        <p>Bạn có thể thay đổi tên bằng cách thêm <code>?name=TênCủaBạn</code> vào cuối URL.</p>

        <div class="date-time">
            <p>Thời gian hiện tại trên máy chủ Docker là: **<?php echo $currentDateTime; ?>**</p>
        </div>

        <p>Chúc một ngày tốt lành!</p>
    </div>
</body>
</html>