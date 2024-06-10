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
        require_once 'product.php';
        $id = $_GET['id'];
        if($id != 0){
            $product = new Product();
            $row = $product->read($id);
        }
    ?>

<h1>Update Product</h1>
    <form method="post" action="update_product.php?id=<?php echo $id ?>">
      <label for="name">Name:</label>
      <input type="text" name="name" value="<?php echo $row['name'] ?>" required><br>

      <label for="description">Description:</label>
      <textarea name="description" required><?php echo $row['description'] ?></textarea><br>

      <label for="category">Category:</label>
      <input type="text" name="category" value="<?php echo $row['category'] ?>"><br>

      <label for="model">Model:</label>
      <input type="text" name="model" value="<?php echo $row['model'] ?>"><br>

      <label for="price">Price:</label>
      <input type="number" name="price" min="0" step="0.01" value="<?php echo $row['price'] ?>" required><br>

      <label for="amount">Amount:</label>
      <input type="number" name="amount" min="0" value="<?php echo $row['amount'] ?>" required><br>
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      <input type="submit" name="submit" value="Update">
    </form>
    
</body>
</html>