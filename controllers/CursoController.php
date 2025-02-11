<?php

class CursoController{
    public function mostrarCursos(){
        require 'models/Curso.php';
        $cursoModelo = new Curso();
        $cursos = $cursoModelo->obtenerCursos();
        require 'views/cursos.php';
    }
}