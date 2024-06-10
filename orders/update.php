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
        require_once 'order.php';
        $id = $_GET['id'];
        if($id != 0){
            $order = new Order();
            $order = $order->read($id);
        }
    ?>

<h1>Update Order</h1>
    <form action="update_order.php" method="post">
        <input type="hidden" name="id" value="<?php echo $order['id']; ?>">
        <label for="product">ID Товара:</label>
        <input type="number" name="id_product" id="id_provider" value="<?php echo $order['id_product']; ?>" required><br>
        <label for="provider">ID Поставщика:</label>
        <input type="number" name="id_provider" id="id_provider" value="<?php echo $order['id_provider']; ?>" required><br>
        <label for="amount">Количество:</label>
        <input type="text" name="amount" id="amount" value="<?php echo $order['amount']; ?>" required><br>
        <label for="order_date">Дата заказа:</label>
        <input type="date" name="order_date" id="order_date" value="<?php echo $order['order_date']; ?>" required><br>
        <label for="date_of_receiving">Дата получения:</label>
        <input type="date" name="date_of_receiving" id="date_of_receiving" value="<?php echo $order['date_of_receiving']; ?>" required><br>
        <label for="status">Статус:</label>
        <select name="status" id="status" required>
            <option value="pending" <?php if ($order['status'] == 'pending') echo 'selected'; ?>>В ожидании</option>
            <option value="delivered" <?php if ($order['status'] == 'delivered') echo 'selected'; ?>>Доставлен</option>
            <option value="canceled" <?php if ($order['status'] == 'canceled') echo 'selected'; ?>>Отменен</option>
        </select><br>
        <input type="submit" value="Update Order">
    </form>
</body>
</html>