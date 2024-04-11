<?php
require_once("conexion.php");

try {
    $conexion = new Conexion();
    $conMysql = $conexion->conMysql();
    $zona =  $_SESSION['zona'];

    // $sql = "SELECT N.*, E.estado AS estado   
    // FROM novedades_nomina AS N
    // INNER JOIN estado AS E ON N.id_estado = E.id_estado
    // INNER JOIN zona AS Z ON N.id_zona = Z.id_zona
    // WHERE Z.id_zona = $zona";

    // consulta buena que trae tambien el id aprobacion
    // $sql = "SELECT N.*, E.estado AS estado, A.area
    //     FROM novedades_nomina AS N
    //     INNER JOIN estado AS E ON N.id_estado = E.id_estado
    //     INNER JOIN zona AS Z ON N.id_zona = Z.id_zona
    //     INNER JOIN aprobacion_costos_nomina AS A ON N.id_aprobacion = A.id
    //     WHERE Z.id_zona = $zona";
    // INNER JOIN estado_aprobado_area AS EA ON A.id = EA.id_aprobacion


    // prueba para hacer dos consultas, aqui saco el area
    // $area = "SELECT 
    // SELECT 
    // FROM novedades_nomina AS N
    // INNER JOIN aprobacion_costos_nomina AS A on N.id_aprobacion = A.id
    // INNER JOIN estado_aprobado_area AS EA on A.id_aprobacion = EA.id_aprobacion
    // where id_aprobacion = $id_aprobacion;
    // ";
    // $resultadoarea = $conMysql->query($area);

    echo "<script>console.log('zona: " . $zona . "');</script>";
    $sql = "SELECT N.*, E.estado AS estado, A.area, EA.estado AS estado_aprobado
    FROM novedades_nomina AS N
    INNER JOIN estado AS E ON N.id_estado = E.id_estado
    INNER JOIN zona AS Z ON N.id_zona = Z.id_zona
    INNER JOIN aprobacion_costos_nomina AS A ON N.id_aprobacion = A.id
    INNER JOIN estado_aprobado_area AS EA ON A.id = EA.id_aprobacion
    WHERE Z.id_zona = $zona";

    $resultado = $conMysql->query($sql);

    if ($resultado !== false) {
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<tr>";
                echo "<td>" . $fila['fecha_registro'] . "</td>";
                echo "<td>" . $fila['fecha_novedad'] . "</td>";
                echo "<td>" . $fila['nombre_coordinador'] . "</td>";
                echo "<td>" . $fila['tipo_novedad'] . "</td>";
                echo "<td>" . $fila['trabajador'] . "</td>";
                echo "<td>" . $fila['descripcion'] . "</td>";
                echo "<td>" . $fila['id_servicio'] . "</td>";
                echo "<td>" . $fila['cliente'] . "</td>";
                echo "<td>" . $fila['area'] . "</td>";

                // Otros campos aquí...
                echo "<td><button class='popup-button update-state-button' onclick=\"showConfirmation('" . $fila['estado_aprobado'] . "')\">" . $fila['estado_aprobado'] . "</button></td>";
            }
        } else {
            echo "<tr><td colspan='9'>No se encontraron resultados</td></tr>";
        }
    } else {
        throw new Exception("Error en la consulta: " . $conMysql->error);
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
