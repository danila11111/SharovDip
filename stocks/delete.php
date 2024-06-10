<?php
require_once 'stock.php';
    $stock = new Stock();
    $id = $_GET['id'];
    $stock->delete($id);
    header('Location: index.php');