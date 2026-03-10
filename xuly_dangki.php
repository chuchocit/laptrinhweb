<?php
require_once "db.php";

$db = new Database();

$username = $_POST['username'] ?? "";
$password = $_POST['password'] ?? "";
$email = $_POST['email'] ?? "";

/* kiểm tra username đã tồn tại chưa */
$sqlCheck = "SELECT COUNT(*) FROM users WHERE username = ?";
$count = $db->count($sqlCheck, "s", [$username]);

if($count > 0){
    echo "Username đã tồn tại!";
    exit;
}

/* thêm user mới */
$sqlInsert = "INSERT INTO users(username,password,email) VALUES(?,?,?)";

$result = $db->execute($sqlInsert,"sss",[$username,$password,$email]);

if($result){
    echo "Đăng ký thành công";
    header("Location: login.php");
}else{
    echo "Đăng ký thất bại";
}
?>