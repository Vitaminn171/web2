<?php
if(isset($_POST['text'])) {
    $input = $_POST['text'];
    // code xử lý input ở đây (ví dụ, lấy data từ database)

    // Hiển thị dữ liệu dưới dạng bảng
    echo "<tr><td>" . $input . "</td><td>heh</td></tr>";
}
?>