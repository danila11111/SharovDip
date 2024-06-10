<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        form {
            background-color: #2c3e50;
            color: #fff;
            padding: 20px;
            border-radius: 5px;
            margin: 20px auto;
            max-width: 600px;
        }

        form label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
        }

        form input[type=text], form input[type=number], form input[type=date] {
        width: 95%;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 3px;
        border: none;
        background-color: #fff;
        color: #2c3e50;
        font-size: 16px;
        }

        form input[type=submit] {
        background-color: #2980b9;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        font-size: 16px;
        }

        form input[type=submit]:hover {
        background-color: #3498db;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <?php 
        require_once 'client.php';
        $id = $_GET['id'];
        if($id != 0){
            $client = new Client();
            $client = $client->read($id);
        }
    ?>
<form action="update_client.php" method="POST">
  <label for="fio">ФИО:</label>
  <input type="text" name="fio" id="fio" value="<?php echo $client['FIO']; ?>" required>

  <label for="address">Адрес:</label>
  <input type="text" name="address" id="address" value="<?php echo $client['address']; ?>" required>

  <label for="phone_number">Номер телефона:</label>
  <input type="text" name="phone_number" id="phone_number" value="<?php echo $client['phone_number']; ?>" required>

  <label for="email">Email:</label>
  <input type="text" name="email" id="email" value="<?php echo $client['email']; ?>" required>

  <label for="organization">Организация:</label>
  <input type="text" name="organization" id="organization" value="<?php echo $client['organization']; ?>">

  <label for="date_of_birth">Дата рождения:</label>
  <input type="date" name="date_of_birth" id="date_of_birth" value="<?php echo $client['date_of_birth']; ?>" required>

  <input type="hidden" name="id" value="<?php echo $client['id']; ?>">

  <input type="submit" value="Сохранить изменения">
</form>
</body>
</html>