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
        require_once 'supplie.php';
        $id = $_GET['id'];
        if($id != 0){
            $supplie = new Supplie();
            $supplie = $supplie->read($id);
        }
    ?>

<form action="update_supplie.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $supplie['id']; ?>">
    <div>
        <label for="id_provider">ID поставщика:</label>
        <input type="text" name="id_provider" id="id_provider" value="<?php echo $supplie['id_provider']; ?>">
    </div>
    <div>
        <label for="id_product">ID продукта:</label>
        <input type="text" name="id_product" id="id_product" value="<?php echo $supplie['id_product']; ?>">
    </div>
    <div>
        <label for="amount">Количество:</label>
        <input type="text" name="amount" id="amount" value="<?php echo $supplie['amount']; ?>">
    </div>
    <div>
        <label for="price">Цена:</label>
        <input type="text" name="price" id="price" value="<?php echo $supplie['price']; ?>">
    </div>
    <div>
        <label for="date_of_delivery">Дата поставки:</label>
        <input type="date" name="date_of_delivery" id="date_of_delivery" value="<?php echo $supplie['date_of_delivery']; ?>">
    </div>
    <div>
        <input type="submit" value="Обновить">
    </div>
</form>

</body>
</html>