<?php
session_start();
require_once "db.php";

$db = new Database();

$username = $_POST['username'] ?? "";
$password = $_POST['password'] ?? "";

// câu lệnh SQL
$sql = "SELECT * FROM users WHERE username = ? AND password = ?";

// gọi hàm select trong class
$result = $db->select($sql, "ss", [$username, $password]);

if(count($result) > 0){

    // lưu session
    $_SESSION['username'] = $result[0]['username'];
    $_SESSION['user_id'] = $result[0]['id'];

    // chuyển trang
    header("Location: index.php");
    exit;

}else{
    echo "Sai tài khoản hoặc mật khẩu";
}
?>