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
        require_once 'stock.php';
        $id = $_GET['id'];
        if($id != 0){
            $stock = new Stock();
            $stock = $stock->read($id);
        }
    ?>

<form action="update_stock.php" method="post">
    
    <div>
        <input type="hidden" name="id" value="<?php echo $stock['id']; ?>">
        <label for="product_id">ID продукта:</label>
        <input type="text" name="id_product" id="id_product" value="<?php echo $stock['id_product']; ?>">
    </div>
    <div>
        <label for="amount">Количество:</label>
        <input type="text" name="amount" id="amount" value="<?php echo $stock['amount']; ?>">
    </div>
    <div>
        <label for="price">Цена:</label>
        <input type="text" name="price" id="price" value="<?php echo $stock['price']; ?>">
    </div>
    <div>
        <label for="location">Местонахождение:</label>
        <input type="text" name="location" id="location" value="<?php echo $stock['location']; ?>">
    </div>
    <div>
        <label for="receipt_date">Дата поступления:</label>
        <input type="date" name="receipt_date" id="receipt_date" value="<?php echo $stock['receipt_date']; ?>">
    </div>
    <input type="submit" value="Обновить">
</form>

</body>
</html>