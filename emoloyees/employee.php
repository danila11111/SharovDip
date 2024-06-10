<?php

require_once '../core/db.php';
require_once '../core/config.php';

class Employee
{
    private $conn;

    public function __construct()
    {
        $db = new DB('localhost', 'root', '', 'optBase');
        $this->conn = $db->connect();
    }

    // create new client record
    public function create($surname, $name, $patronymic, $date_of_birth, $gender, $address, $phone_number, $email, $post, $date_of_receipt)
    {
        $surname = $this->conn->real_escape_string($surname);
        $name = $this->conn->real_escape_string($name);
        $patronymic = $this->conn->real_escape_string($patronymic);
        $date_of_birth = $this->conn->real_escape_string($date_of_birth);
        $gender = $this->conn->real_escape_string($gender);
        $address = $this->conn->real_escape_string($address);
        $phone_number = $this->conn->real_escape_string($phone_number);
        $email = $this->conn->real_escape_string($email);
        $post = $this->conn->real_escape_string($post);

        // Prepare INSERT statement
        $sql = "INSERT INTO employees (surname, name, patronymic, date_of_birth, gender, address, phone_number, email, post, date_of_receipt)
                VALUES ('$surname', '$name', '$patronymic', '$date_of_birth', '$gender', '$address' , '$phone_number' , '$email' , '$post' , '$date_of_receipt')";

        if ($this->conn->query($sql) === TRUE) {
            echo "New employee added successfully";
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }
       
    }

    // read single client record
    public function read($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM employees WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // read all client records
    public function readAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM employees");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // update client record
    public function update($id, $surname, $name, $patronymic, $date_of_birth, $gender, $address, $phone_number, $email, $post)
    {
        $stmt = $this->conn->prepare("UPDATE employees SET surname=?, name=?, patronymic=?, date_of_birth=?, gender=?, address=?, phone_number=?, email=?, post=? WHERE id=?");
        $stmt->bind_param("sssssssssi", $surname, $name, $patronymic, $date_of_birth, $gender, $address, $phone_number, $email, $post,  $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // delete client record
    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM employees WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}