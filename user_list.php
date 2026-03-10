<?php
require_once "db.php";
require_once "csrf.php";

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
        <th>Action</th>
        <th>Chi tiết</th>
    </tr>

    <?php foreach ($users as $user): ?>
        <tr>

            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['email']; ?></td>

            <td>

                <a href="edit_user.php?id=<?php echo $user['id']; ?>">Sửa</a>

                <form action="delete_user.php" method="POST" style="display:inline;">

                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

                    <input type="hidden" name="csrf_token"
                        value="<?php echo csrf_token(); ?>">

                    <button onclick="return confirm('Bạn có chắc muốn xóa?')">
                        Xóa
                    </button>

                </form>

            </td>

            <td>
                <a href="user_detail.php?id=<?php echo $user['id']; ?>">
                    Chi tiết
                </a>
            </td>

        </tr>
    <?php endforeach; ?>

</table>