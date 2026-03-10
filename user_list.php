<?php
require_once "db.php";

$db = new Database();

// câu lệnh lấy danh sách user
$sql = "SELECT * FROM users";

$users = $db->select($sql);
?>

<h2>Danh sách User</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
    </tr>

<?php foreach($users as $user): ?>
    <tr>
        <td><?php echo $user['id']; ?></td>
        <td><?php echo $user['username']; ?></td>
        <td><?php echo $user['email']; ?></td>
    </tr>
<?php endforeach; ?>

</table>