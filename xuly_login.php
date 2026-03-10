<?php
session_start();
require_once "db.php";

//lay du lieu tu form
$username = $_POST['username'];
$password = $_POST['password'];

//cau lenh sql
$sql = "SELECT * FROM WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);

//kiem tra dang nhap
if(mysqli_num_rows($result) > 0){
    $_SESSION['username'] = $username;
    echo "Dang nhap thanh cong!";
    header("Location: index.php");

}
else{
    echo "Sai username hoac password";
}