<?php
require_once 'provider.php';
    $provider = new Provider();
    $id = $_GET['id'];
    $provider->delete($id);
    header('Location: index.php');