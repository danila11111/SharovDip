<?php

require_once '../core/db.php';
require_once '../core/config.php';

class Order
{
    private $conn;

    public function __construct()
    {
        $db = new DB('localhost', 'root', '', 'optBase');
        $this->conn = $db->connect();
    }

    // create new client record
    public function create($id_product, $id_provider, $amount, $order_date, $date_of_receiving, $status)
    {
        $id_product = $this->conn->real_escape_string($id_product);
        $id_provider = $this->conn->real_escape_string($id_provider);
        $amount = $this->conn->real_escape_string($amount);
        $order_date = $this->conn->real_escape_string($order_date);
        $date_of_receiving = $this->conn->real_escape_string($date_of_receiving);
        $status = $this->conn->real_escape_string($status);

        // Prepare INSERT statement
        $sql = "INSERT INTO orders (id_product, id_provider, amount, order_date, date_of_receiving, status)
                VALUES ('$id_product', '$id_provider', '$amount', '$order_date', '$date_of_receiving', '$status')";

        if ($this->conn->query($sql) === TRUE) {
            echo "New order added successfully";
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }
       
    }

    // read single client record
    public function read($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM orders WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // read all client records
    public function readAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM orders");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // update client record
    public function update($id, $id_product, $id_provider, $amount, $order_date, $date_of_receiving, $status)
    {
        $stmt = $this->conn->prepare("UPDATE orders SET id_product=?, id_provider=?, amount=?, order_date=?, date_of_receiving=?, status=?, update_date=CURRENT_TIMESTAMP WHERE id=?");
        $stmt->bind_param("iiisssi", $id_product, $id_provider, $amount, $order_date, $date_of_receiving, $status, $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // delete client record
    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM orders WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}