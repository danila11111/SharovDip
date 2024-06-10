<?php

require_once '../core/db.php';
require_once '../core/config.php';

class Stock
{
    private $conn;

    public function __construct()
    {
        $db = new DB('localhost', 'root', '', 'optBase');
        $this->conn = $db->connect();
    }

    // create new client record
    public function create($id_product, $amount, $price, $location, $receipt_date)
    {
        $id_product = $this->conn->real_escape_string($id_product);
        $amount = $this->conn->real_escape_string($amount);
        $price = $this->conn->real_escape_string($price);
        $receipt_date= $this->conn->real_escape_string($receipt_date);
        $location= $this->conn->real_escape_string($location);
        // Prepare INSERT statement
        $sql = "INSERT INTO stocks (id_product, amount, price, location, receipt_date)
                VALUES ('$id_product', '$amount', '$price', '$location', '$receipt_date')";

        if ($this->conn->query($sql) === TRUE) {
            echo "New stock added successfully";
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }
       
    }

    // read single client record
    public function read($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM stocks WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // read all client records
    public function readAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM stocks");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // update client record
    public function update($id, $id_product, $amount, $price, $location, $receipt_date)
    {
        $stmt = $this->conn->prepare("UPDATE stocks SET id_product=?, amount=?, price=?, location=?, receipt_date=?, update_date=CURRENT_TIMESTAMP WHERE id=?");
        $stmt->bind_param("iidssi", $id_product, $amount, $price, $location, $receipt_date, $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // delete client record
    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM stocks WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}