<?php
require_once 'order.php';
    $order = new Order();
    $id = $_GET['id'];
    $order->delete($id);
    header('Location: index.php');