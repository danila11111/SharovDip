<?php
require_once 'employee.php';
$id = $_POST['id'];
$surname = $_POST['surname'];
$name = $_POST['name'];
$patronymic = $_POST['patronymic'];
$date_of_birth = $_POST['date_of_birth'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$post = $_POST['post'];
$date_of_receipt = $_POST['date_of_receipt'];
$date_of_dismissal = $_POST['date_of_dismissal'];



if(!$id){
    $employee = new Employee();
    if($employee->create($surname, $name, $patronymic, $date_of_birth, $gender, $address, $phone_number, $email, $post, $date_of_receipt)){
    echo 'create';
    }
    else{
        echo 'no create';
    }
}
else{
    $employee = new Employee();
    if($employee->update($id, $surname, $name, $patronymic, $date_of_birth, $gender, $address, $phone_number, $email, $post, $date_of_receipt)){
        echo 'Изменения успешно сохранены';
    }
    else {
        echo 'Ошибка обновления данных';
    }
}

?>