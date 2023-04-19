<!DOCTYPE html>
<html>
<head>
	<title>Hiển thị text từ input vào table sử dụng AJAX</title>
</head>
<body>
	<h2>Nhập text và bấm nút để hiển thị vào bảng:</h2>
	<input type="text" id="inputText">
	<button onclick="display()" name="add">Hiển thị</button>

	<table id="table"></table>
    <?php

        if(isset($_POST['add'])) {
            $input = $_POST['text'];
            // code xử lý input ở đây (ví dụ, lấy data từ database)

            // Hiển thị dữ liệu dưới dạng bảng
            echo "<tr><td>" . $input . "</td><td>heh</td></tr>";
        }
        ?>
	
</body>
</html>