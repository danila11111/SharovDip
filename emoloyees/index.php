<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Сотрудники</title>
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
      require_once 'employee.php';
      $employee = new Employee();
      $employees = $employee->readAll();

  ?>
  <div class="content">
  <h1>Список сотрудников</h1>
  <table>
    <thead>
      <tr>
        <th>Фамилия</th>
        <th>Имя</th>
        <th>Отчество</th>
        <th>Дата рождения</th>
        <th>Пол</th>
        <th>Адрес</th>
        <th>Телефон</th>
        <th>Email</th>
        <th>Пост</th>
        <th>Дата приема на работу</th>
        <th>Дата увольнения</th>
        <th>Действия</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($employees as $employee): ?>
        <tr>
          <td><?= $employee['surname'] ?></td>
          <td><?= $employee['name'] ?></td>
          <td><?= $employee['patronymic'] ?></td>
          <td><?= $employee['date_of_birth'] ?></td>
          <td><?= $employee['gender'] ?></td>
          <td><?= $employee['address'] ?></td>
          <td><?= $employee['phone_number'] ?></td>
          <td><?= $employee['email'] ?></td>
          <td><?= $employee['post'] ?></td>
          <td><?= $employee['date_of_receipt'] ?></td>
          <td><?= $employee['date_of_dismissal'] ?></td>
          <td>
            <a href="update.php?id=<?= $employee['id'] ?>">Редактировать</a>
            <a href="delete.php?id=<?= $employee['id'] ?>" onclick="return confirm('Вы уверены?')">Удалить</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <a href="update.php?id=0">Добавить сотрудника</a>
   
  </div>

  <footer class="footer">
    <p>&copy; 2023 Все права защищены.</p>
  </footer>
</body>
</html>