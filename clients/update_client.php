<?php
require_once 'client.php';
$id = $_POST['id'];
$FIO = $_POST['fio'];
$address = $_POST['address'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$organization = $_POST['organization'];
$date_of_birth = $_POST['date_of_birth'];

if(!$id){
    $client = new Client();
    if($client->create($FIO, $address, $phone_number, $email, $organization, $date_of_birth)){
    echo 'create';
    }
    else{
        echo 'no create';
    }
}
else{
    $client = new Client();
    if($client->update($id, $FIO, $address, $phone_number, $email, $organization, $date_of_birth)){
        echo 'Изменения успешно сохранены';
    }
    else {
        echo 'Ошибка обновления данных';
    }
}

?>