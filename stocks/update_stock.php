<?php
require_once 'stock.php';
$id_product = $_POST['id_product'];
$amount = $_POST['amount'];
$price = $_POST['price'];
$location = $_POST['location'];
$receipt_date = $_POST['receipt_date'];
$id = $_POST['id'];


if(!$id){
    $stock = new Stock();
    if($stock->create($id_product, $amount, $price, $location, $receipt_date)){
    echo 'create';
    }
    else{
        echo 'no create';
    }
}
else{
    $stock = new Stock();
    if($stock->update($id, $id_product, $amount, $price, $location, $receipt_date)){
        echo 'Изменения успешно сохранены';
    }
    else {
        echo 'Ошибка обновления данных';
    }
}

?>