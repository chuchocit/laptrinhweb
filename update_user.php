<?php
require_once "db.php";

$db = new Database();

$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];

$sql = "UPDATE users SET username = ?, email = ? WHERE id = ?";

$result = $db->execute($sql,"ssi",[$username,$email,$id]);

if($result){
    header("Location: user_list.php");
}else{
    echo "Cập nhật thất bại";
}
?>