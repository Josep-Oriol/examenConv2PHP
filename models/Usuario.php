<?php
require 'models/Database.php';
class Usuario extends Database {
    public function comprobarUsuario($user, $password){
        $sql = "SELECT email, pass FROM usuarios WHERE email = '$user' AND pass = '$password'";

        try{
            $db = $this->conectar();
            $query = $db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);

        }catch(PDOException $e){
            echo "Error al validar el usuario: " . $e->getMessage();
        }
    }

    public function matricularse($idCurso, $usuario){
        $sql = "INSERT INTO matricula (idCurso, email, fecha) VALUES ('$idCurso', '$usuario', NOW())";

        try{
            $db = $this->conectar();
            $query = $db->prepare($sql);
            return $query->execute();

        }catch(PDOException $e){
            echo "Error al matricularse: " . $e->getMessage();
        }
    }
}