<?php
require_once("conexion.php");

try {
    $conexion = new Conexion();
    $conMysql = $conexion->conMysql();
    $zona =  $_SESSION['zona'];
    $sql = "SELECT N.*, E.estado AS estado, A.area, EC.estado AS estado_aprobado, EN.estado AS estado_aprobado_area, Z.zona AS zona
    FROM novedades_nomina AS N
    INNER JOIN estado AS E ON N.id_estado = E.id_estado
    INNER JOIN zona AS Z ON N.id_zona = Z.id_zona
    -- estado costos
    INNER JOIN aprobacion_costos_nomina AS A ON N.id_aprobacionC = A.id
    INNER JOIN estado_aprobado_area AS EC ON A.id = EC.id_aprobacion
    -- INNER JOIN estado_aprobado_area AS EC ON N.id_aprobacionC = EC.id_aprobacion 
    -- estado nomina
    INNER JOIN estado_aprobado_area AS EN ON N.id_aprobacionN = EN.id_aprobacion 
    WHERE Z.id_zona = $zona";
    $resultado = $conMysql->query($sql);
    // -------------------------------------------------------------------------------------------------------

    if ($resultado !== false) {
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $fila['fecha_novedad'] . "</td>";
                echo "<td>" . $fila['nombre_coordinador'] . "</td>";
                echo "<td>" . $fila['tipo_novedad'] . "</td>";
                echo "<td>" . $fila['trabajador'] . "</td>";
                echo "<td>" . $fila['descripcion'] . "</td>";
                echo "<td>" . $fila['id_servicio'] . "</td>";
                echo "<td>" . $fila['zona'] . "</td>";

                // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
                // colores costos, rol coordinador
                if ($fila['estado_aprobado'] == 'pendiente') {
                    echo "<td><button class='popup-button ' style='background-color: #ff0000 ;'>" . $fila['estado_aprobado'] . "</button></td>";
                } else if ($fila['estado_aprobado'] == 'aprobado') {
                    echo "<td><button class='popup-button ' style='background-color: #00a135;'>" . $fila['estado_aprobado'] . "</button></td>";
                }
                // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
                // colores nomina, rol coordinador
                if ($fila['estado_aprobado_area'] == 'pendiente') {
                    echo "<td><button class='popup-button ' style='background-color: #ff0000 ;'>" . $fila['estado_aprobado_area'] . "</button></td>";
                } else if ($fila['estado_aprobado_area'] == 'aprobado') {
                    echo "<td><button class='popup-button 'style='background-color: #00a135;' >" . $fila['estado_aprobado_area'] . "</button></td>";
                }
                // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
                // gestion del estado de la novedad
                if ($fila["estado"] == "pendiente") {
                    echo "<td><button class='popup-button update-novedadNumber-button' data-novedad='" . $fila['id'] . "' style='background-color: #FF0000;'> <i class='fa solid fa-xmark fa-beat'></i></button> </button></td>";
                } else if ($fila["estado"] == "proceso") {
                    echo "<td><button class='popup-button update-novedadNumber-button' data-novedad='" . $fila['id'] . "' style='background-color: #ffdf00;'> <i class='fas fa-spinner fa-spin'></i> </button></td>";
                } else if ($fila["estado"] == "terminado") {
                    echo "<td><button class='popup-button update-novedadNumber-button' data-novedad='" . $fila['id'] . "' style='background-color: #00a135;'> <i class='fas fa-check fa-beat'></i> </button></td>";
                }
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
