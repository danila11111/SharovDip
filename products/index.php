<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Товары</title>
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
      require_once 'product.php';
      $product = new Product();
      $products = $product->readAll();

  ?>
  <div class="content">
  <h1>Список товаров</h1>
  <table>
    <thead>
      <tr>
        <th>Название</th>
        <th>Описание</th>
        <th>Категория</th>
        <th>Модель</th>
        <th>Цена</th>
        <th>Количество</th>
        <th>Дата добавления</th>
        <th>Дата обновления</th>
        <th>Действия</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($products as $product): ?>
        <tr>
          <td><?= $product['name'] ?></td>
          <td><?= $product['description'] ?></td>
          <td><?= $product['category'] ?></td>
          <td><?= $product['model'] ?></td>
          <td><?= $product['price'] ?></td>
          <td><?= $product['amount'] ?></td>
          <td><?= $product['date_added'] ?></td>
          <td><?= $product['update_date'] ?></td>
          <td>
            <a href="update.php?id=<?= $product['id'] ?>">Редактировать</a>
            <a href="delete.php?id=<?= $product['id'] ?>" onclick="return confirm('Вы уверены?')">Удалить</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <a href="update.php?id=0">Добавить клиента</a>

  </div>

  <footer class="footer">
    <p>&copy; 2023 Все права защищены.</p>
  </footer>
</body>
</html>