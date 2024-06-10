<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        form {
            background-color: #2c3e50;
            color: #fff;
            padding: 20px;
            border-radius: 5px;
            margin: 20px auto;
            max-width: 600px;
        }

        form label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
        }

        form input[type=text], form input[type=number], form input[type=date] {
        width: 95%;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 3px;
        border: none;
        background-color: #fff;
        color: #2c3e50;
        font-size: 16px;
        }

        form input[type=submit] {
        background-color: #2980b9;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        font-size: 16px;
        }

        form input[type=submit]:hover {
        background-color: #3498db;
        }
    </style>
    <title>Document</title>
</head>
<body>
    
<?php 
        require_once 'report.php';
        $id = $_GET['id'];
        if($id != 0){
            $report = new report();
            $report = $report->read($id);
        }
    ?>

<form action="update_report.php" method="POST">
<input type="hidden" name="id" value="<?php echo $report['id']; ?>">
  <label for="name">Название:</label>
  <input type="text" value="<?php echo $report['name']; ?>" name="name" id="name" required>

  <label for="date_start">Дата начала:</label>
  <input type="date" value="<?php echo $report['date_start']; ?>" name="date_start" id="date_start" required>

  <label for="date_end">Дата конца:</label>
  <input type="date" value="<?php echo $report['date_end']; ?>" name="date_end" id="date_end" required>

  <label for="type">Тип отчета:</label>
  <input type="text" value="<?php echo $report['type']; ?>" name="type" id="type" required>

  <label for="data">Данные:</label>
  <textarea name="data" id="data"   required><?php echo $report['data']; ?></textarea>

  <label for="author">Автор:</label>
  <input type="text" value="<?php echo $report['author']; ?>" name="author" id="author" required>

  <input type="submit" value="Обновить отчет">
</form>

</body>
</html>