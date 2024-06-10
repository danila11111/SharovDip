<?php

require_once '../core/db.php';
require_once '../core/config.php';

class Supplie
{
    private $conn;

    public function __construct()
    {
        $db = new DB('localhost', 'root', '', 'optBase');
        $this->conn = $db->connect();
    }

    // create new client record
    public function create($id_provider, $id_product, $amount, $price, $date_of_delivery)
    {
        $id_provider = $this->conn->real_escape_string($id_provider);
        $id_product = $this->conn->real_escape_string($id_product);
        $amount = $this->conn->real_escape_string($amount);
        $price = $this->conn->real_escape_string($price);
        $date_of_delivery= $this->conn->real_escape_string($date_of_delivery);

        // Prepare INSERT statement
        $sql = "INSERT INTO supplies (id_provider, id_product, amount, price, date_of_delivery)
                VALUES ('$id_product', '$id_provider', '$amount', '$price', '$date_of_delivery')";

        if ($this->conn->query($sql) === TRUE) {
            echo "New supplie added successfully";
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }
       
    }

    // read single client record
    public function read($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM supplies WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // read all client records
    public function readAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM supplies");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // update client record
    public function update($id, $id_provider, $id_product, $amount, $price, $date_of_delivery )
    {
        $stmt = $this->conn->prepare("UPDATE supplies SET id_provider=?, id_product=?, amount=?, price=?, date_of_delivery=?, update_date=CURRENT_TIMESTAMP WHERE id=?");
        $stmt->bind_param("iiissi", $id_provider, $id_product, $amount, $price, $date_of_delivery, $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // delete client record
    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM supplies WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}