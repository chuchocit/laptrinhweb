<?php
require_once "csrf.php";
require_once "db.php";

$db = new Database();

$id = $_GET['id'] ?? 0;

$sql = "SELECT * FROM users WHERE id = ?";
$result = $db->select($sql,"i",[$id]);

if(count($result)==0){
    echo "User không tồn tại";
    exit;
}

$user = $result[0];
?>

<h2>Sửa User</h2>

<form action="update_user.php" method="POST">
<input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">

<input type="hidden" name="id" value="<?php echo $user['id']; ?>">

Username:<br>
<input type="text" name="username" value="<?php echo $user['username']; ?>"><br><br>

Email:<br>
<input type="text" name="email" value="<?php echo $user['email']; ?>"><br><br>

<button type="submit">Cập nhật</button>

</form>