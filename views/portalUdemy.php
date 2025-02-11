<?php
if(isset($_SESSION['usuario'])) {
?>
<h1>Benvingut al portal de Udemy: <?php echo $_SESSION['usuario'];?></h1>
<a href="index.php?controller=Curso&action=mostrarCursos">Nova matricula</a><br>

<h3>Cursos matriculats</h3>

<p><?php print_r($cursosUsuario); ?></p>

<table>
    <tr>
        <td>Nom</td>
        <td>Hores</td>
        <td>Preu</td>
        <td>Borrar-se</td>
    </tr>
    <?php
        $totalHoras = 0;
        $totalPrecio = 0;
        foreach($cursosUsuario as $curso){
            echo '<tr>';
            echo '<td>' . $curso["nombre"] . '</td>';
            echo '<td>' . $curso["horas"] . '</td>';
            echo '<td>' . $curso["precio"] . '€</td>';
            echo '<td><a href="index.php?controller=Usuario&action=eliminarMatricula&idCurso=' . $curso['idCurso'] . '">Eliminar</a></td>';
            echo '</tr>';
            $totalHoras += $curso["horas"];
            $totalPrecio += $curso["precio"];
        }
        echo '<tr>';
        echo '<td></td>';
        echo "<td>Total horas {$totalHoras}h</td>";
        echo "<td>Total horas {$totalPrecio}€</td>";
        echo '</tr>';

    ?>
</table><br><br>
<a href="index.php?controller=Usuario&action=verWord">Word</a><br><br>
<a href="index.php?controller=Usuario&action=cerrarSesion">Sortir</a>
<?php
}else{
    echo "Debes estar logat per poder accedir a aquesta pàgina";
    echo "<meta http-equiv='refresh' content='3; URL=index.php?controller=Usuario&action=mostrarLogin'/>";
}
?>