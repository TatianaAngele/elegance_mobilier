<?php 

class BaseDeDonnees 
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";

    public function getConnection() {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=gestion_stock", $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn; 
          } catch(PDOException $e) {
            return null; 
          }
    }
}