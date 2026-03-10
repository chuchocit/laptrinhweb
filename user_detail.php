<?php
require_once "db.php";

$db = new Database();

// lấy id từ URL
$id = $_GET['id'] ?? 0;

// câu lệnh SQL
$sql = "SELECT * FROM users WHERE id = ?";

// lấy dữ liệu
$result = $db->select($sql, "i", [$id]);

// kiểm tra user tồn tại
if(count($result) == 0){
    echo "User không tồn tại";
    exit;
}

$user = $result[0];
?>

<h2>Chi tiết User</h2>

<p><b>ID:</b> <?php echo $user['id']; ?></p>
<p><b>Username:</b> <?php echo $user['username']; ?></p>
<p><b>Email:</b> <?php echo $user['email']; ?></p>

<a href="user_list.php">Quay lại danh sách</a>