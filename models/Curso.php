<?php
require 'models/Database.php';
class Curso extends Database {
    public function obtenerCursos(){
        $sql = "SELECT * FROM cursos";

        try{
            $db = $this->conectar();
            $query = $db->prepare($sql);
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "Error al validar el usuario: " . $e->getMessage();
        }
    }

    public function obtenerIDCurso($nombre){
        $sql = "SELECT idCurso FROM cursos WHERE nombre = '$nombre'";

        try{
            $db = $this->conectar();
            $query = $db->prepare($sql);
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "Error al validar el usuario: " . $e->getMessage();
        }
    }

    public function obtenerCursosUsuario($usuario){
        $sql = "SELECT m.idCurso, c.nombre, c.horas, c.precio FROM matricula m INNER JOIN cursos c WHERE m.email = '$usuario' AND c.idCurso = m.idCurso";

        try{
            $db = $this->conectar();
            $query = $db->prepare($sql);
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "Error al validar el usuario: " . $e->getMessage();
        }
    }

    public function eliminarseMatricula($idCurso, $usuario){
        $sql = "DELETE FROM matricula WHERE idCurso = '$idCurso' AND email = '$usuario'";

        try{
            $db = $this->conectar();
            $query = $db->prepare($sql);

            return $query->execute();
        }catch(PDOException $e){
            echo "Error al validar el usuario: " . $e->getMessage();
        }
    }
}