<?php
// Класс подключения к БД
class DB{
    private $host;
    private $username;
    private $password;
    private $db_name ;
    private $conn;
    
    public function __construct($host, $username, $password, $db_name) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->db_name = $db_name;
      }
    
      public function connect() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        if ($this->conn->connect_error) {
          die("Connection failed: " . $this->conn->connect_error);
        }
        return $this->conn;
      }
      
      public function query($sql) {
        return $this->conn->query($sql);
      }
    
      public function close() {
        $this->conn->close();
      }
}
require_once('config.php');

?>