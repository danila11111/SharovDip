<?php

require_once '../core/db.php';
require_once '../core/config.php';

class Provider
{
    private $conn;

    public function __construct()
    {
        $db = new DB('localhost', 'root', '', 'optBase');
        $this->conn = $db->connect();
    }

    // create new client record
    public function create($name, $address, $phone_number, $email, $description)
    {
        $name = $this->conn->real_escape_string($name);
        $address = $this->conn->real_escape_string($address);
        $phone_number = $this->conn->real_escape_string($phone_number);
        $email = $this->conn->real_escape_string($email);
        $description = $this->conn->real_escape_string($description);

        // Prepare INSERT statement
        $sql = "INSERT INTO providers (name, address, phone_number, email, description)
                VALUES ('$name', '$address', '$phone_number', '$email', '$description')";

        if ($this->conn->query($sql) === TRUE) {
            echo "New provider added successfully";
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }
       
    }

    // read single client record
    public function read($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM providers WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // read all client records
    public function readAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM providers");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // update client record
    public function update($id, $name, $address, $phone_number, $email, $description)
    {
        $stmt = $this->conn->prepare("UPDATE providers SET name=?, address=?, phone_number=?, email=?, description=?, update_date=CURRENT_TIMESTAMP WHERE id=?");
        $stmt->bind_param("sssssi", $name, $address, $phone_number, $email, $description, $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // delete client record
    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM providers WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}