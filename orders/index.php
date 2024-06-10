<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Заказы</title>
</head>
<body>
  <header class="header">
    <div class="header__logo">Логотип</div>
    <nav class="header__nav">
      <ul>
        <li><a href="../admin_dashboard.php">Главная</a></li>
        <li><a href="../orders/">Заказы</a></li>
        <li><a href="../clients/">Клиенты</a></li>
        <li><a href="../products/">Товары</a></li>
        <li><a href="../providers/">Поставщики</a></li>
        <li><a href="../reports/">Отчеты</a></li>
        <li><a href="../emoloyees/">Сотрудники</a></li>
        <li><a href="../supplies/">запас</a></li>
        <li><a href="../stocks/">Склады</a></li>
      </ul>
    </nav>
    <div class="header__user-info">
      <span>Имя пользователя</span>
      <a href="../logout.php">Выйти</a>
    </div>
  </header>

  <?php
      require_once 'order.php';
      $order = new Order();
      $orders = $order->readAll();
  ?>
  <div class="content">
  <h1>Список заказов</h1>
  <table>
    <thead>
      <tr>
        <th>ID продукта</th>
        <th>ID поставщика</th>
        <th>Количество</th>
        <th>Дата заказа</th>
        <th>Дата получения</th>
        <th>Статус</th>
        <th>Дата обновления</th>
        <th>Действия</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($orders as $or): ?>
        <tr>
          <td><?= $or['id_product'] ?></td>
          <td><?= $or['id_provider'] ?></td>
          <td><?= $or['amount'] ?></td>
          <td><?= $or['order_date'] ?></td>
          <td><?= $or['date_of_receiving'] ?></td>
          <td><?= $or['status'] ?></td>
          <td><?= $or['update_date'] ?></td>
          <td>
            <a href="update.php?id=<?= $or['id'] ?>">Редактировать</a>
            <a href="delete.php?id=<?= $or['id'] ?>" onclick="return confirm('Вы уверены?')">Удалить</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <a href="update.php?id=0">Добавить заказ</a>
   
  </div>

  <footer class="footer">
    <p>&copy; 2023 Все права защищены.</p>
  </footer>
</body>
</html>