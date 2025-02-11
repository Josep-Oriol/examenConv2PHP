<?php

class Database{
    protected $db;
    
    public function conectar(){
        $host = "localhost";
        $dbname = "udemy";
        $user = "root";
        $passwd = "";

        try{
            $this->db = new PDO("mysql:host=$host;dbname=$dbname", $user, $passwd);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->db;
        }catch (PDOException $e) {
            echo "Error en la conexión: " . $e->getMessage();
        }
    }
}