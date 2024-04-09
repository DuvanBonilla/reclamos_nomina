<?php
require_once("conexion.php");

try {
    $conexion = new Conexion();
    $conMysql = $conexion->conMysql();
    $zona =  $_SESSION['zona'];

    // $sql = "SELECT N.*, E.estado AS estado   
    //         FROM novedades_nomina AS N
    //         INNER JOIN estado AS E 
    //         ON N.id_estado = E.id_estado";

    $sql = "SELECT N.*, E.estado AS estado   
    FROM novedades_nomina AS N
    INNER JOIN estado AS E ON N.id_estado = E.id_estado
    INNER JOIN zona AS Z ON N.id_zona = Z.id_zona
    WHERE Z.id_zona = $zona";

    echo "<script>console.log('zona: " . $zona . "');</script>";
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
                echo "<td><button class='popup-button update-state-button'>" . $fila['estado'] . "</button></td>";
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
