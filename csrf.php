<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

// tạo token nếu chưa có
if(empty($_SESSION['csrf_token'])){
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// hàm lấy token
function csrf_token(){
    return $_SESSION['csrf_token'];
}

// hàm kiểm tra token
function verify_csrf($token){
    return isset($_SESSION['csrf_token']) &&
           hash_equals($_SESSION['csrf_token'], $token);
}
?>