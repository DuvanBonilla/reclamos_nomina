<?php
require_once("conexion.php");
require_once("../model/val_aggNovedad.php");

try {
    $conexion = new Conexion();
    $conMysql = $conexion->conMysql();
    $sql = "SELECT N.*, E.estado AS estado, A.area, EC.estado AS estado_aprobado, EN.estado AS estado_aprobado_area
        FROM novedades_nomina AS N
        LEFT JOIN estado AS E ON N.id_estado = E.id_estado
        LEFT JOIN aprobacion_costos_nomina AS A ON N.id_aprobacionC = A.id
        LEFT JOIN estado_aprobado_area AS EC ON A.id = EC.id_aprobacion
        LEFT JOIN estado_aprobado_area AS EN ON N.id_aprobacionN = EN.id_aprobacion";

    // echo "<script>console.log('zona: " . $zona . "');</script>";
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
                // ---------------------------------------------------------- ---------------------------------------------------------- ---------------------------------------------------------- 
                $disabled = $_SESSION['id_aprobacionC'] = $fila["id_aprobacionC"];
                $disabledCostos = $_SESSION['estado'] = $fila["id_estado"];
                // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
                // estado costos
                $disabledCostos = $_SESSION['estado'];
                // Determinar si el botón debe estar desactivado
                $disabledC = ($disabledCostos == 2) ? 'disabled' : '';
                echo "<td><button class='popup-button update-approvedC-button' data-estado='" . $fila['estado'] . "' data-id_aprobacionC='" . $fila['id_aprobacionC'] . "' data-id='" . $fila['id'] . "' $disabledC>" . $fila['estado_aprobado'] . "</button></td>";
                // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
                // estado nomina
                $disabled = $_SESSION['id_aprobacionC'];
                // Determinar si el botón debe estar desactivado
                $disabledN = ($disabled == 2) ? 'disabled' : '';
                echo "<td><button class='popup-button update-approvedN-button' data-estado='" . $fila['estado'] . "' data-id_aprobacionN='" . $fila['id_aprobacionN'] . "' data-id='" . $fila['id'] . "' $disabledN>" . $fila['estado_aprobado_area'] . "</button></td>";
                // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
                echo "<td><button class='popup-button ' >" . $fila['estado'] . "</button></td>";
                // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
                // eliminar novedad
                echo "<td><button class='popup-button update-delete-button' data-id='" . $fila['id'] . "'><i class='fas fa-trash-alt'></i></button></td>";
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
