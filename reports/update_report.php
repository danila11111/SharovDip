<?php

require_once 'report.php';
$id = $_POST['id'];
$name = $_POST['name'];
$date_start = $_POST['date_start'];
$date_end = $_POST['date_end'];
$type = $_POST['type'];
$data = $_POST['data'];
$author = $_POST['author'];

if($id == 0){
    $report = new Report();
    if($report->create($name, $date_start, $date_end, $type, $data, $author)){
    echo 'create';
    }
    else{
        echo 'no create';
    }
}
else{
    $report = new Report();
    if($report->update($id, $name, $date_start, $date_end, $type, $data, $author)){
        echo 'Изменения успешно сохранены';
    }
    else {
        echo 'Ошибка обновления данных';
    }
}

?>