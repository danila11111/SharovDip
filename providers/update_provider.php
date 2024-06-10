<?php
require_once 'provider.php';
$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$description = $_POST['description'];

if($id == 0){
    $provider = new Provider();
    if($provider->create($name, $address, $phone_number, $email, $description)){
    echo 'create';
    }
    else{
        echo 'no create';
    }
}
else{
    $provider = new Provider();
    if($provider->update($id, $name, $address, $phone_number, $email, $description)){
        echo 'Изменения успешно сохранены';
    }
    else {
        echo 'Ошибка обновления данных';
    }
}

?>