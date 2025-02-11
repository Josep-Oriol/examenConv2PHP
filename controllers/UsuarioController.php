<?php

class UsuarioController{
    public function mostrarLogin(){
        require 'views/login.php';
    }

    public function validaruser(){
        if(isset($_POST['user'])){
            $user = $_POST['user'];
            $password = $_POST['password'];

            require 'models/Usuario.php';
            $usuarioModelo = new Usuario();
            $resultado = $usuarioModelo->comprobarUsuario($user, $password);

            if($resultado){
                $_SESSION['usuario'] = $user;
                $_SESSION['password'] = $password;

                echo "<meta http-equiv='refresh' content='0; URL=index.php?controller=Usuario&action=portalUdemy'/>";
            }else{
                echo 'no existe el usuario';
                echo "<meta http-equiv='refresh' content='3; URL=index.php?controller=Usuario&action=mostrarLogin'/>";
            }
        }
    }

    public function portalUdemy(){
        $usuario = $_SESSION['usuario'];

        require 'models/Curso.php';
        $cursoModelo = new Curso();
        $cursosUsuario = $cursoModelo->obtenerCursosUsuario($usuario);
        require 'views/portalUdemy.php';
    }

    public function matricularseEnCurso(){
        if(isset($_POST['cursos'])){
            $idCurso = $_POST['cursos'];
            $usuario = $_SESSION['usuario'];


            require 'models/Usuario.php';
            $usuarioModelo = new Usuario();
            $resultado = $usuarioModelo->matricularse($idCurso, $usuario);

            if($resultado){
                echo "<meta http-equiv='refresh' content='0; URL=index.php?controller=Usuario&action=portalUdemy'/>";
            }else{
                echo 'error al matricularse en el curso';
                echo "<meta http-equiv='refresh' content='3; URL=index.php?controller=Usuario&action=mostrarLogin'/>";
            }
        }else{
            echo 'error';
        }
    }

    public function eliminarMatricula(){
        $idCurso = $_GET['idCurso'];
        $usuario = $_SESSION['usuario'];

        require 'models/Curso.php';
        $cursoModelo = new Curso();
        $resultado = $cursoModelo->eliminarseMatricula($idCurso, $usuario);

        if($resultado){
            echo 'desmatriculado correctamente';
            echo "<meta http-equiv='refresh' content='2; URL=index.php?controller=Usuario&action=portalUdemy'/>";
        }
    }

    public function verWord(){
        $usuario = $_SESSION['usuario'];

        require 'models/Curso.php';
        $cursoModelo = new Curso();
        $cursosUsuario = $cursoModelo->obtenerCursosUsuario($usuario);
        require 'views/word.php';
    }

    public function cerrarSesion(){
        session_destroy();
        echo "<meta http-equiv='refresh' content='0; URL=index.php'/>";
    }
}