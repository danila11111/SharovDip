<?php
require_once 'product.php';
$id = $_GET['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$category = $_POST['category'];
$model = $_POST['model'];
$price = $_POST['price'];
$amount = $_POST['amount'];

if($id == 0){
    $product = new Product();
    if($product->create($name, $description, $category, $model, $price, $amount)){
    echo 'create';
    }
    else{
        echo 'no create';
    }
}
else{
    $product = new Product();
    if($product->update($id, $name, $description, $category, $model, $price, $amount)){
        echo 'Изменения успешно сохранены';
    }
    else {
        echo 'Ошибка обновления данных';
    }
}

?>