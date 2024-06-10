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
        require_once 'employee.php';
        $id = $_GET['id'];
        if($id != 0){
            $employee = new Employee();
            $employee = $employee->read($id);
        }
    ?>

    <form action="update_employee.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">
        <label for="surname">Фамилия:</label>
        <input type="text" value="<?php echo $employee['surname']; ?>" name="surname" id="surname" required>

        <label for="name">Имя:</label>
        <input type="text" value="<?php echo $employee['name']; ?>" name="name" id="name" required>

        <label for="patronymic">Отчество:</label>
        <input type="text" value="<?php echo $employee['patronymic']; ?>" name="patronymic" id="patronymic">

        <label for="date_of_birth">Дата рождения:</label>
        <input type="date" name="date_of_birth" value="<?php echo $employee['date_of_birth']; ?>" id="date_of_birth" required>

        <label for="gender">Пол:</label>
        <select name="gender" id="gender" required>
            <option value="мужской">Мужской</option>
            <option value="женский">Женский</option>
        </select>

        <label for="address">Адрес:</label>
        <input type="text" value="<?php echo $employee['address']; ?>" name="address" id="address" required>

        <label for="phone_number">Номер телефона:</label>
        <input type="text" value="<?php echo $employee['phone_number']; ?>" name="phone_number" id="phone_number" required>

        <label for="email">Электронная почта:</label>
        <input type="email" value="<?php echo $employee['email']; ?>" name="email" id="email" required>

        <label for="post">Должность:</label>
        <input type="text" name="post" value="<?php echo $employee['post']; ?>" id="post" required>

        <label for="date_of_receipt">Дата приема на работу:</label>
        <input type="date" name="date_of_receipt" value="<?php echo $employee['date_of_receipt']; ?>" id="date_of_receipt" required>

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <input type="submit" value="Обновить">
    </form>    

</body>
</html>