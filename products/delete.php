<?php
require_once 'product.php';
    $product = new Product();
    $id = $_GET['id'];
    $product->delete($id);
    header('Location: index.php');