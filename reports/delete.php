<?php
require_once 'report.php';
    $report = new Report();
    $id = $_GET['id'];
    $report->delete($id);
    header('Location: index.php');