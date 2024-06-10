<?php
    require_once 'client.php';
    $client = new Client();
    $id = $_GET['id'];
    $client->delete($id);
    header('Location: index.php')
?>