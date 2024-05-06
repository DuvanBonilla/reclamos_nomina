<?php
session_start();
include_once '../model/conexion.php';

$id_novedad = $_POST['novedad'];
// -------------------------------------------------------------------------------------------------------
try {
    $conexion = new Conexion();
    $conMysql = $conexion->conMysql();

    $sql = "SELECT N.*, E.estado AS estado, A.area, EC.estado AS estado_aprobado, EN.estado AS estado_aprobado_area
        FROM novedades_nomina AS N
        LEFT JOIN estado AS E ON N.id_estado = E.id_estado
        LEFT JOIN aprobacion_costos_nomina AS A ON N.id_aprobacionC = A.id
        LEFT JOIN estado_aprobado_area AS EC ON A.id = EC.id_aprobacion
        LEFT JOIN estado_aprobado_area AS EN ON N.id_aprobacionN = EN.id_aprobacion
        WHERE N.id = $id_novedad
    ";
    // -------------------------------------------------------------------------------------------------------

    $resultado = $conMysql->query($sql);

    if ($resultado !== false) {
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td><strong>Registro</strong>: " . $fila['fecha_registro'] . "</td>";
                echo "<hr/ class='custom-hr'>";
                // -------------------------------------------------------------------------------------------------------
                echo "<br/>";
                echo "<td><strong>Novedad: </strong>" . $fila['fecha_novedad'] . "</td>";
                echo "<hr/ class='custom-hr'>";
                // -------------------------------------------------------------------------------------------------------
                echo "<br/>";
                echo "<td><strong>Coordinador:</strong> " . $fila['nombre_coordinador'] . "</td>";
                echo "<hr/ class='custom-hr'>";
                // -------------------------------------------------------------------------------------------------------
                echo "<br/>";
                echo "<td><strong>Codigo servicio: </strong>" . $fila['id_servicio'] . "</td>";
                echo "<hr/ class='custom-hr'>";
                echo "<br/>";
                echo "<td><strong>Novedad: </strong>" . $fila['tipo_novedad'] . "</td>";
                echo "<hr/ class='custom-hr'>";
                // -------------------------------------------------------------------------------------------------------
                echo "<br/>";
                echo "<td><strong>Trabajador: </strong>" . $fila['trabajador'] . "</td>";
                echo "<hr/ class='custom-hr'>";
                // -------------------------------------------------------------------------------------------------------
                echo "<br/>";
                echo "<td><strong>Cliente: </strong>" . $fila['cliente'] . "</td>";
                echo "<hr/ class='custom-hr'>";
                // -------------------------------------------------------------------------------------------------------
                echo "<br/>";
                echo "<td><strong>Descripcion: </strong>" . $fila['descripcion'] . "</td>";
                echo "<hr/ class='custom-hr'>";
                echo "<br/>";

                // ---------------------------------------------------------- ---------------------------------------------------------- ---------------------------------------------------------- 
                $disabled = $_SESSION['id_aprobacionC'] = $fila["id_aprobacionC"];
                $disabledCostos = $_SESSION['estado'] = $fila["id_estado"];
                // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
                // estado costos
                $disabledCostos = $_SESSION['estado'];
                // Determinar si el botón debe estar desactivado
                $disabledC = ($disabledCostos == 2) ? 'disabled' : '';
                if ($fila["id_aprobacionC"] == "1") {
                    echo "<td> <strong>Costos: </strong> <button class='popup-button update-approvedC-button' data-estado='" . $fila['estado'] . "' data-id_aprobacionC='" . $fila['id_aprobacionC'] . "' data-id='" . $fila['id'] . "' $disabledC style='background-color: #00a135;'>  <strong>" . $fila['estado_aprobado'] . "</strong></button></td>";
                    echo "<hr/ class='custom-hr'>";
                    echo "<br/>";
                    // -------------------------------------------------------------------------------------------------------

                } else if ($fila["id_aprobacionC"] == "2") {
                    echo "<td> <strong>Costos: </strong> <button class='popup-button update-approvedC-button' data-estado='" . $fila['estado'] . "' data-id_aprobacionC='" . $fila['id_aprobacionC'] . "' data-id='" . $fila['id'] . "' $disabledC style='background-color: red;'><strong>" . $fila['estado_aprobado'] . "</strong></button></td>";
                    echo "<hr/ class='custom-hr'>";
                    echo "<br/>";
                    // -------------------------------------------------------------------------------------------------------

                }
                // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
                // estado nomina
                $disabled = $_SESSION['id_aprobacionC'];
                // Determinar si el botón debe estar desactivado
                $disabledN = ($disabled == 2) ? 'disabled' : '';
                if ($fila["id_aprobacionN"] == "1") {
                    echo "<td> <strong>Nomina: </strong> <button class='popup-button update-approvedN-button' data-estado='" . $fila['estado'] . "' data-id_aprobacionN='" . $fila['id_aprobacionN'] . "' data-id='" . $fila['id'] . "' $disabledN style='background-color: #00a135;'><strong>" . $fila['estado_aprobado_area'] . "</strong></button></td>";
                    echo "<hr/ class='custom-hr'>";
                    echo "<br/>";
                } else if ($fila["id_aprobacionN"] == "2") {
                    echo "<td> <strong>Nomina: </strong> <button class='popup-button update-approvedN-button' data-estado='" . $fila['estado'] . "' data-id_aprobacionN='" . $fila['id_aprobacionN'] . "' data-id='" . $fila['id'] . "' $disabledN style='background-color: red;'><strong>" . $fila['estado_aprobado_area'] . "</strong></button></td>";
                    echo "<hr/ class='custom-hr'>";
                }
                // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
                // cambiar los colores del boton dependiendo el estado
                if ($fila["estado"] == "pendiente") {
                    echo "<br/>";
                    echo "<td><strong>Estado: </strong><button class='popup-button update-idNovedad-button ' data-id='" . $fila['id'] . "' style='background-color: #FF0000;' ><i class='fa solid fa-xmark fa-beat'></i></button></td>";
                    echo "<hr/ class='custom-hr'>";
                    echo "<br/>";
                } else if ($fila["estado"] == "proceso") {
                    echo "<br/>";
                    echo "<td><strong>Estado: </strong><button class='popup-button update-idNovedad-button ' data-id='" . $fila['id'] . "' style='background-color: #ffdf00;'> <i class='fas fa-spinner fa-spin'></i></button></td>";
                    echo "<hr/ class='custom-hr'>";
                    echo "<br/>";
                } else if ($fila["estado"] == "terminado") {
                    echo "<td><strong>Estado: </strong><button class='popup-button update-idNovedad-button ' data-id='" . $fila['id'] . "' style='background-color: #00a135;'> <i class='fas fa-check fa-beat'></i></button></td>";
                    echo "<hr/ class='custom-hr'>";
                    echo "<br/>";
                }
                // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
                // eliminar novedad
                // validacion para quitar el eliminar dependiendo del rol
                if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 3 || $_SESSION['rol'] == 4) {
                    echo "<td><strong>Eliminar: </strong><button class='popup-button update-delete-button' data-id='" . $fila['id'] . "' style='background-color: red;'><i class='fas fa-trash-alt fa-shake'></i> </button></td>";
                } else {
                }
                echo "<hr/ class='custom-hr'>";
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
