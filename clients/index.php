<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Клиенты</title>
</head>
<body>
  <header class="header">
    <a href="" class="header__logo"><img src="img.png" alt=""></a>
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
      require_once 'client.php';
      $client = new Client();
      $clients = $client->readAll();

  ?>
  <div class="content">
  <h1>Список клиентов</h1>
  <table>
    <thead>
      <tr>
        <th>ФИО</th>
        <th>Адрес</th>
        <th>Телефон</th>
        <th>Email</th>
        <th>Организация</th>
        <th>Дата рождения</th>
        <th>Дата регистрации</th>
        <th>Дата обновления</th>
        <th>Действия</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($clients as $client): ?>
        <tr>
          <td><?= $client['FIO'] ?></td>
          <td><?= $client['address'] ?></td>
          <td><?= $client['phone_number'] ?></td>
          <td><?= $client['email'] ?></td>
          <td><?= $client['organization'] ?></td>
          <td><?= $client['date_of_birth'] ?></td>
          <td><?= $client['registration_date'] ?></td>
          <td><?= $client['update_date'] ?></td>
          <td>
            <a href="update.php?id=<?= $client['id'] ?>">Редактировать</a>
            <a href="delete.php?id=<?= $client['id'] ?>" onclick="return confirm('Вы уверены?')">Удалить</a>
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