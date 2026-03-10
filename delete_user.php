<?php
require_once "db.php";

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