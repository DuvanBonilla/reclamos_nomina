<?php
require_once("conexion.php");

try {
    $conexion = new Conexion();
    $conMysql = $conexion->conMysql();

    $sql = "SELECT N.*, E.estado AS estado   
            FROM novedades_nomina AS N
            INNER JOIN estado AS E 
            ON N.id_estado = E.id_estado";

    $resultado = $conMysql->query($sql);

    if ($resultado !== false) {
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $fila['fecha_registro'] . "</td>";
                echo "<td>" . $fila['fecha_novedad'] . "</td>";
                echo "<td>" . $fila['nombre_coordinador'] . "</td>";
                echo "<td>" . $fila['tipo_novedad'] . "</td>";
                echo "<td>" . $fila['trabajador'] . "</td>";
                echo "<td>" . $fila['descripcion'] . "</td>";
                echo "<td>" . $fila['id_servicio'] . "</td>";
                echo "<td>" . $fila['cliente'] . "</td>";
                echo "<td><button class='popup-button' onclick=\"showConfirmation('" . $fila['estado'] . "')\">" . $fila['estado'] . "</button></td>";

                // echo "<td>" . $fila['estado'] . "</td>";





                // echo '<td>
                //         <a href="../controller/ctr_eliminarCertificado.php?nregistro=' . $fila['nregistro'] . '" class="fa-solid fa-trash icono-eliminar"
                //         onclick="return confirm(\'¿Estás seguro de eliminar este artículo?\')">
                //         </a>    
                //     </td>';
                // echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No se encontraron resultados</td></tr>";
        }
    } else {
        throw new Exception("Error en la consulta: " . $conMysql->error);
    }

    // Cerrar la conexión a la base de datos
    $conMysql->close();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
