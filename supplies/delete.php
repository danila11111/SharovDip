<?php
require_once 'supplie.php';
    $supplie = new Supplie();
    $id = $_GET['id'];
    $supplie->delete($id);
    header('Location: index.php');