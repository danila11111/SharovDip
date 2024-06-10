<?php
session_start();
require_once 'core/db.php';
$login = $_POST['login'];
$password = $_POST['password'];

$db = new DB($HOST, $USER, $PASSWORD,$DB_NAME);
$connection = $db->connect();

$query = "SELECT * FROM admins WHERE username = '$login' AND password = '$password'";
$result = $db->query($query);

// Если администратор найден, сохраняем данные в сессии
if (mysqli_num_rows($result) == 1) {
    $admin = mysqli_fetch_assoc($result);
    $_SESSION['admin_id'] = $admin['id'];
    $_SESSION['admin_username'] = $admin['username'];
    header('Location: admin_dashboard.php'); // Перенаправляем на страницу администратора
    exit;
} else {
    $error_message = "Неправильное имя пользователя или пароль";
}

?>