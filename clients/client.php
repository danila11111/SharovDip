<?php

require_once '../core/db.php';
require_once '../core/config.php';

class Client
{
    private $conn;

    public function __construct()
    {
        $db = new DB('localhost', 'root', '', 'optBase');
        $this->conn = $db->connect();
    }

    // create new client record
    public function create($fio, $address, $phone_number, $email, $organization, $date_of_birth)
    {
        $fio = $this->conn->real_escape_string($fio);
        $address = $this->conn->real_escape_string($address);
        $phone_number = $this->conn->real_escape_string($phone_number);
        $email = $this->conn->real_escape_string($email);
        $organization = $this->conn->real_escape_string($organization);
        $date_of_birth = $this->conn->real_escape_string($date_of_birth);

        // Prepare INSERT statement
        $sql = "INSERT INTO clients (FIO, address, phone_number, email, organization, date_of_birth)
                VALUES ('$fio', '$address', '$phone_number', '$email', '$organization', '$date_of_birth')";

        if ($this->conn->query($sql) === TRUE) {
            echo "New client added successfully";
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }
       
    }

    // read single client record
    public function read($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM clients WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // read all client records
    public function readAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM clients");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // update client record
    public function update($id, $fio, $address, $phone_number, $email, $organization, $date_of_birth)
    {
        $stmt = $this->conn->prepare("UPDATE clients SET fio=?, address=?, phone_number=?, email=?, organization=?, date_of_birth=?, update_date=CURRENT_TIMESTAMP WHERE id=?");
        $stmt->bind_param("ssssssi", $fio, $address, $phone_number, $email, $organization, $date_of_birth, $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // delete client record
    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM clients WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}