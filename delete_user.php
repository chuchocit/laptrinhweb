<?php
require_once "csrf.php";
require_once "db.php";
if(!verify_csrf($_POST['csrf_token'] ?? '')){
    die("CSRF token không hợp lệ!");
}
$db = new Database();

$id = $_GET['id'] ?? 0;

$sql = "DELETE FROM users WHERE id = ?";

$result = $db->execute($sql,"i",[$id]);

if($result){
    header("Location: users.php");
}else{
    echo "Xóa thất bại";
}
?>