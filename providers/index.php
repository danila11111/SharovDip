<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Поставщики</title>
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
      require_once 'provider.php';
      $provider = new Provider();
      $providers = $provider->readAll();

  ?>
  <div class="content">
  <h1>Список поставщиков</h1>
  <table>
    <thead>
      <tr>
        <th>Название</th>
        <th>Адрес</th>
        <th>Номер</th>
        <th>Меил</th>
        <th>Описание</th>
        <th>Дата добавления</th>
        <th>Дата обновления</th>
        <th>Действия</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($providers as $provider): ?>
        <tr>
          <td><?= $provider['name'] ?></td>
          <td><?= $provider['address'] ?></td>
          <td><?= $provider['phone_number'] ?></td>
          <td><?= $provider['email'] ?></td>
          <td><?= $provider['description'] ?></td>
          <td><?= $provider['date_added'] ?></td>
          <td><?= $provider['update_date'] ?></td>
          <td>
            <a href="update.php?id=<?= $provider['id'] ?>">Редактировать</a>
            <a href="delete.php?id=<?= $provider['id'] ?>" onclick="return confirm('Вы уверены?')">Удалить</a>
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