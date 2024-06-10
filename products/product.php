<?php

require_once '../core/db.php';
require_once '../core/config.php';

class Product
{
    private $conn;

    public function __construct()
    {
        $db = new DB('localhost', 'root', '', 'optBase');
        $this->conn = $db->connect();
    }

    // create new client record
    public function create($name, $description, $category, $model, $price, $amount)
    {
        $name = $this->conn->real_escape_string($name);
        $description = $this->conn->real_escape_string($description);
        $category = $this->conn->real_escape_string($category);
        $model = $this->conn->real_escape_string($model);
        $price = $this->conn->real_escape_string($price);
        $amount = $this->conn->real_escape_string($amount);

        // Prepare INSERT statement
        $sql = "INSERT INTO products (name, description, category, model, price, amount)
                VALUES ('$name', '$description', '$category', '$model', '$price', '$amount')";

        if ($this->conn->query($sql) === TRUE) {
            echo "New product added successfully";
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }
       
    }

    // read single client record
    public function read($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // read all client records
    public function readAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM products");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // update client record
    public function update($id, $name, $description, $category, $model, $price, $amount)
    {
        $stmt = $this->conn->prepare("UPDATE products SET name=?, description=?, category=?, model=?, price=?, amount=?, update_date=CURRENT_TIMESTAMP WHERE id=?");
        $stmt->bind_param("ssssdii", $name, $description, $category, $model, $price, $amount, $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // delete client record
    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}