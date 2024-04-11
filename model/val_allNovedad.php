<?php
require_once("conexion.php");
require_once("../model/val_aggNovedad.php");
try {
    $conexion = new Conexion();
    $conMysql = $conexion->conMysql();
    $zona =  $_SESSION['zona'];
    $sql = "SELECT N.*, E.estado AS estado, A.area, EC.estado AS estado_aprobado, EN.estado AS estado_aprobado_area
    FROM novedades_nomina AS N
    INNER JOIN estado AS E ON N.id_estado = E.id_estado
    INNER JOIN zona AS Z ON N.id_zona = Z.id_zona
    -- estado costos
    INNER JOIN aprobacion_costos_nomina AS A ON N.id_aprobacionC = A.id
    INNER JOIN estado_aprobado_area AS EC ON A.id = EC.id_aprobacion
    -- estado nomina
    INNER JOIN estado_aprobado_area AS EN ON N.id_aprobacionN = EN.id_aprobacion 
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
                $disabled = $_SESSION['id_aprobacionC'] = $fila["id_aprobacionC"];
                // ---------------------------------------------------------- ---------------------------------------------------------- ---------------------------------------------------------- 
                echo "<td><button class='popup-button update-state-button' data-id='" . $fila['id'] . "' data-estado='" . $fila['estado'] . "'>" . $fila['estado'] . "</button></td>";
                // estado pendiente,proceso,terminado
                // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
                echo "<td><button class='popup-button update-approvedC-button' data-id_aprobacionC='" . $fila['id_aprobacionC'] . "' data-id='" . $fila['id'] . "'>" . $fila['estado_aprobado'] . "</button></td>";
                // estado costos
                // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
                $disabled = $_SESSION['id_aprobacionC'];
                // Determinar si el botón debe estar desactivado
                $disabledN = ($disabled == 2) ? 'disabled' : '';
                echo "<td><button class='popup-button update-approvedN-button' data-id_aprobacionN='" . $fila['id_aprobacionN'] . "' data-id='" . $fila['id'] . "' $disabledN>" . $fila['estado_aprobado_area'] . "</button></td>";
                // estado nomina
                // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
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
