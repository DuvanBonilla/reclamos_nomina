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
                // area de costos
                // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
                // desactivar el boton de costos si el rol es 4(nomina)
                $disabledCostos = $_SESSION['rol'];
                $disabledC = ($disabledCostos == 4) ? 'disabled' : '';
                // cambio de color si el estado de costos es 1 o 2
                if ($fila["id_aprobacionC"] == "1") {
                    echo "<td><button class='popup-button update-approvedC-button' data-estado='" . $fila['estado'] . "' data-id_aprobacionC='" . $fila['id_aprobacionC'] . "' data-id='" . $fila['id'] . "' $disabledC style='background-color: #00a135;'><strong>" . $fila['estado_aprobado'] . "</strong></button></td>";
                } else if ($fila["id_aprobacionC"] == "2") {
                    echo "<td><button class='popup-button update-approvedC-button' data-estado='" . $fila['estado'] . "' data-id_aprobacionC='" . $fila['id_aprobacionC'] . "' data-id='" . $fila['id'] . "' $disabledC style='background-color: #FF0000;'><strong>" . $fila['estado_aprobado'] . "</strong></button></td>";
                }
                // -------------------------------------------------------------------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
                // area de nomina
                // -------------------------------------------------------------------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
                // desactivar el boton de costos si el rol es 3(costos)
                // $disabled = $_SESSION['rol'];
                // $costosDisable = ($disabledCostos == 3) ? 'disabled' : '';
                // se desactiva el boton de nomina hasta que el de costos sea 1 o aprobado
                $disabledNomina = $_SESSION['id_aprobacionC'] = $fila["id_aprobacionC"];
                $disabledN = ($disabledNomina == 2) ? 'disabled' : '';
                // cambio de color si el estado de nomina es 1 o 2
                if ($fila["id_aprobacionN"] == "1") {
                    echo "<td><button class='popup-button update-approvedN-button' data-estado='" . $fila['estado'] . "' data-id_aprobacionN='" . $fila['id_aprobacionN'] . "' data-id='" . $fila['id'] . "' $disabledN  style='background-color: #00a135;'><strong>" . $fila['estado_aprobado_area'] . "</strong></button></td>";
                } else if ($fila["id_aprobacionN"] == "2") {
                    echo "<td><button class='popup-button update-approvedN-button' data-estado='" . $fila['estado'] . "' data-id_aprobacionN='" . $fila['id_aprobacionN'] . "' data-id='" . $fila['id'] . "' $disabledN  style='background-color: #FF0000;'><strong>" . $fila['estado_aprobado_area'] . "</strong></button></td>";
                }
                // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
                // icons dependiendo del estado
                if ($fila["estado"] == "pendiente") {
                    echo "<td><button class='popup-button update-novedadNumber-button ' data-novedad='" . $fila['id'] . "'  style='background-color: #FF0000;' ><i class='fa solid fa-xmark fa-beat'></i></button></td>";
                } else if ($fila["estado"] == "proceso") {
                    echo "<td><button class='popup-button update-novedadNumber-button ' data-novedad='" . $fila['id'] . "'  style='background-color: #ffdf00;'><i class='fas fa-spinner fa-spin'></i></button></td>";
                } else if ($fila["estado"] == "terminado") {
                    echo "<td><button class='popup-button update-novedadNumber-button ' data-novedad='" . $fila['id'] . "'  style='background-color: #00a135;'><i class='fas fa-check fa-beat'></i></button></td>";
                }
                // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
                // eliminar novedad
                echo "<td><button class='popup-button update-delete-button' data-id='" . $fila['id'] . "' style='background-color: red;'><i class='fas fa-trash-alt fa-shake'></i> </button></td>";
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
