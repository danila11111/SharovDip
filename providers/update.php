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
        require_once 'provider.php';
        $id = $_GET['id'];
        if($id != 0){
            $provider = new Provider();
            $provider = $provider->read($id);
        }
    ?>

<form action="update_provider.php" method="post">
  <input type="hidden" name="id" value="<?php echo $provider['id']; ?>">
  <label for="name">Название:</label>
  <input type="text" id="name" name="name" value="<?php echo $provider['name']; ?>" required>

  <label for="address">Адрес:</label>
  <input type="text" id="address" name="address" value="<?php echo $provider['address']; ?>" required>

  <label for="phone_number">Номер телефона:</label>
  <input type="text" id="phone_number" name="phone_number" value="<?php echo $provider['phone_number']; ?>" required>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" value="<?php echo $provider['email']; ?>" required>

  <label for="description">Описание:</label>
  <textarea id="description" name="description"><?php echo $provider['description']; ?></textarea>

  <input type="submit" value="Сохранить изменения">
</form>

</body>
</html>