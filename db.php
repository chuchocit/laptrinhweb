<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password ="";
    private $dbname = "demo_github";
    private $conn;

    public function __construct(){
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        if($this->conn->connect_error){
            die ("Ket noi that bai".$this->conn->connect_error);
        }
        $this->conn->set_charset("utf8");
    }
    public function select($sql, $types="", $params=[]){
        $stmt = $this->conn->prepare($sql);
        if(!empty($types)){
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $data;
    }
    public function count($sql, $types="", $params=[]){
        $stmt = $this->conn->prepare($sql);
        if(!empty($params)){
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        $stmt->bind_result($total);
        $stmt->fetch();

        $stmt->close();
        return $total ?? 0;
    }

    public function execute($sql, $types = "", $params = []){
        $stmt = $this->conn->prepare($sql);
        if(!empty($types)){
            $stmt->bind_param($types, ...$params);
        }
        return $stmt->execute();
    }
    public function close(){
        $this->conn->close();
    }
}
