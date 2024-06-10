<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>склад</title>
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
      require_once 'stock.php';
      $stock = new Stock();
      $stocks = $stock->readAll();
  ?>
  <div class="content">
  <h1>Список складов</h1>
  <table>
    <thead>
      <tr>
        <th>ID продукта</th>
        <th>Количество</th>
        <th>Цена</th>
        <th>Адрес</th>
        <th>Дата квитанции</th>
        <th>Дата обновления</th>
        <th>Действия</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($stocks as $stock): ?>
        <tr>
          <td><?= $stock['id_product'] ?></td>
          <td><?= $stock['amount'] ?></td>
          <td><?= $stock['price'] ?></td>
          <td><?= $stock['location'] ?></td>
          <td><?= $stock['receipt_date'] ?></td>
          <td><?= $stock['update_date'] ?></td>
          <td>
            <a href="update.php?id=<?= $stock['id'] ?>">Редактировать</a>
            <a href="delete.php?id=<?= $stock['id'] ?>" onclick="return confirm('Вы уверены?')">Удалить</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <a href="update.php?id=0">Добавить склад</a>
   
  </div>


  <footer class="footer">
    <p>&copy; 2023 Все права защищены.</p>
  </footer>
</body>
</html>