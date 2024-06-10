<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Отчеты</title>
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
      require_once 'report.php';
      $report = new Report();
      $reports = $report->readAll();

  ?>
  <div class="content">
  <h1>Список отчетов</h1>
  <table>
    <thead>
      <tr>
        <th>Название</th>
        <th>Дата начала</th>
        <th>Дата конца</th>
        <th>тип</th>
        <th>данные</th>
        <th>Автор</th>
        <th>Дата создания</th>
        <th>Действия</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($reports as $report): ?>
        <tr>
          <td><?= $report['name'] ?></td>
          <td><?= $report['date_start'] ?></td>
          <td><?= $report['date_end'] ?></td>
          <td><?= $report['type'] ?></td>
          <td><?= $report['data'] ?></td>
          <td><?= $report['author'] ?></td>
          <td><?= $report['date_creating'] ?></td>
          <td>
            <a href="update.php?id=<?= $report['id'] ?>">Редактировать</a>
            <a href="delete.php?id=<?= $report['id'] ?>" onclick="return confirm('Вы уверены?')">Удалить</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <a href="update.php?id=0">Добавить отчет</a>

  </div>

  <footer class="footer">
    <p>&copy; 2023 Все права защищены.</p>
  </footer>
</body>
</html>