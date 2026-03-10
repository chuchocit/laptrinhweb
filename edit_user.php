<?php
require_once "csrf.php";
require_once "db.php";
?>

<form action="update_user.php" method="POST">

<input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">

<input type="hidden" name="id" value="<?php echo $user['id']; ?>">

Username:<br>
<input type="text" name="username" value="<?php echo $user['username']; ?>"><br><br>

Email:<br>
<input type="text" name="email" value="<?php echo $user['email']; ?>"><br><br>

<button type="submit">Cập nhật</button>

</form>