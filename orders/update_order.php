<?php
require_once 'order.php';
$id_product = $_POST['id_product'];
$id_provider = $_POST['id_provider'];
$amount = $_POST['amount'];
$order_date = $_POST['order_date'];
$date_of_receiving = $_POST['date_of_receiving'];
$status = $_POST['status'];
$id = $_POST['id'];


if(!$id){
    $order = new Order();
    if($order->create($id_product, $id_provider, $amount, $order_date, $date_of_receiving, $status)){
    echo 'create';
    }
    else{
        echo 'no create';
    }
}
else{
    $order = new Order();
    if($order->update($id, $id_product, $id_provider, $amount, $order_date, $date_of_receiving, $status)){
        echo 'Изменения успешно сохранены';
    }
    else {
        echo 'Ошибка обновления данных';
    }
}

?>