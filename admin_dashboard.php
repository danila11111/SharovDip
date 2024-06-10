<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php'); // Перенаправляем на страницу входа для администратора
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Админ-панель</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header class="header">
    <div class="header__logo"><img src="imag" alt=""></div>
    <nav class="header__nav">
      <ul>
        <li><a href="/admin_dashboard.php">Главная</a></li>
        <li><a href="orders/">Заказы</a></li>
        <li><a href="clients/">Клиенты</a></li>
        <li><a href="products/">Товары</a></li>
        <li><a href="providers/">Поставщики</a></li>
        <li><a href="reports/">Отчеты</a></li>
        <li><a href="emoloyees/">Сотрудники</a></li>
        <li><a href="stocks/">Склады</a></li>
        <li><a href="supplies/">запас</a></li>
      </ul>
    </nav>
    <div class="header__user-info">
      <span>Имя пользователя</span>
      <a href="logout.php">Выйти</a>
    </div>
  </header>

  <div class="content">
    <h1>Главная страница</h1>
    <h2>Добро пожаловать в админ-панель Информационной системы оптового склада!</h2>
    <h2>Здесь вы сможете управлять всеми таблицами базы данных</h2>
  </div>

  <footer class="footer">
    <p>&copy; 2023 Все права защищены.</p>
  </footer>
</body>
</html>