<?php
require_once 'supplie.php';
$id_product = $_POST['id_product'];
$id_provider = $_POST['id_provider'];
$amount = $_POST['amount'];
$price = $_POST['price'];
$date_of_delivery = $_POST['date_of_delivery'];
$id = $_POST['id'];


if(!$id){
    $supplie = new Supplie();
    if($supplie->create($id_provider, $id_product, $amount, $price, $date_of_delivery)){
    echo 'create';
    }
    else{
        echo 'no create';
    }
}
else{
    $supplie = new Supplie();
    if($supplie->update($id, $id_provider, $id_product, $amount, $price, $date_of_delivery)){
        echo 'Изменения успешно сохранены';
    }
    else {
        echo 'Ошибка обновления данных';
    }
}

?>