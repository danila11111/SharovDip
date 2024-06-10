<?php

require_once '../core/db.php';
require_once '../core/config.php';

class Report
{
    private $conn;

    public function __construct()
    {
        $db = new DB('localhost', 'root', '', 'optBase');
        $this->conn = $db->connect();
    }

    // create new client record
    public function create($name, $date_start, $date_end, $type, $data, $author)
    {
        $name = $this->conn->real_escape_string($name);
        $date_start = $this->conn->real_escape_string($date_start);
        $date_end = $this->conn->real_escape_string($date_end);
        $type = $this->conn->real_escape_string($type);
        $data = $this->conn->real_escape_string($data);
        $author = $this->conn->real_escape_string($author);

        // Prepare INSERT statement
        $sql = "INSERT INTO reports (name, date_start, date_end, type, data, author)
                VALUES ('$name', '$date_start', '$date_end', '$type', '$data', '$author')";

        if ($this->conn->query($sql) === TRUE) {
            echo "New report added successfully";
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }
       
    }

    // read single client record
    public function read($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM reports WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // read all client records
    public function readAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM reports");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // update client record
    public function update($id, $name, $date_start, $date_end, $type, $data, $author)
    {
        $stmt = $this->conn->prepare("UPDATE reports SET name=?, date_start=?, date_end=?, type=?, data=?, author=? WHERE id=?");
        $stmt->bind_param("ssssssi", $name, $date_start, $date_end, $type, $data, $author, $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // delete client record
    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM reports WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}