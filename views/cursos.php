<?php
if(isset($_SESSION['usuario'])){
?>
    <h1>Nova matricula per <?php echo $_SESSION['usuario']; ?></h1>
    <form action="index.php?controller=Usuario&action=matricularseEnCurso" method="POST">
        <label for="cursos">Cursos disponibles</label>
        <select name="cursos" id="cursos">
            <?php
                foreach($cursos as $curso){
                    echo '<option value=' . $curso["idCurso"] . '> ' . $curso["nombre"] . '</option>';
                }
            ?>
        </select>
        <input type="submit" value="Matricularse">
    </form><br>
    <a href="index.php?controller=Usuario&action=portalUdemy">Volver</a><br><br>
    <a href="index.php?controller=Usuario&action=cerrarSesion">Sortir</a>
<?php
}else{
    echo "Debes estar logat per poder accedir a aquesta pàgina";
    echo "<meta http-equiv='refresh' content='3; URL=index.php?controller=Usuario&action=mostrarLogin'/>";
}
?>