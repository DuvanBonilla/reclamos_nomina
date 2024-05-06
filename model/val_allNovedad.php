<?php
require_once("conexion.php");
require_once("../model/val_aggNovedad.php");

try {
    // consulta de la tabla de novedades
    $conexion = new Conexion();
    $conMysql = $conexion->conMysql();
    $sql = "SELECT N.*, E.estado AS estado, A.area, EC.estado AS estado_aprobado, EN.estado AS estado_aprobado_area, z.zona as zona
        FROM novedades_nomina AS N
        LEFT JOIN estado AS E ON N.id_estado = E.id_estado
        LEFT JOIN aprobacion_costos_nomina AS A ON N.id_aprobacionC = A.id
        LEFT JOIN estado_aprobado_area AS EC ON A.id = EC.id_aprobacion
        LEFT JOIN estado_aprobado_area AS EN ON N.id_aprobacionN = EN.id_aprobacion
        LEFT JOIN zona as z ON N.id_zona = z.id_zona";

    $resultado = $conMysql->query($sql);
    // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------

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
                echo "<td>" . $fila['zona'] . "</td>";
                // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
                // boton costos
                // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
                // desactivar el boton de costos si el rol es 4 (nomina)
                $disabledCostosIfNomina = $_SESSION['rol'];
                $disablednomina = ($disabledCostosIfNomina == 4) ? 'disabled' : '';

                $disabledCostos = $_SESSION['estado'] = $fila["id_estado"];
                $disabledC = ($disabledCostos == 2) ? 'disabled' : '';
                // cambiar colores dependiendo del estado de $id_aprobacionC
                if ($fila["id_aprobacionC"] == "1") {
                    echo "<td><button class='popup-button update-approvedC-button' data-estado='" . $fila['estado'] . "' data-id_aprobacionC='" . $fila['id_aprobacionC'] . "' data-id='" . $fila['id'] . "' $disabledC $disablednomina style='background-color: #00a135;'><strong>" . $fila['estado_aprobado'] . "</strong></button></td>";
                } else if ($fila["id_aprobacionC"] == "2") {
                    echo "<td><button class='popup-button update-approvedC-button' data-estado='" . $fila['estado'] . "' data-id_aprobacionC='" . $fila['id_aprobacionC'] . "' data-id='" . $fila['id'] . "' $disabledC $disablednomina style='background-color: red;'><strong>" . $fila['estado_aprobado'] . "</strong></button></td>";
                }
                // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
                // boton nomina
                // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
                // deshabilitar el boton de costos si el rol es 3 (costos)
                $disabledNominaIfcostos = $_SESSION['rol'];
                $disabledCostos = ($disabledCostosIfNomina == 3) ? 'disabled' : '';
                // si el estado de costos esta pendiente se desactiva el poder pasar a aprobado nomina
                $disabled = $_SESSION['id_aprobacionC'] = $fila["id_aprobacionC"];
                $disabledN = ($disabled == 2) ? 'disabled' : '';
                // cambiar colores dependiendo del estado de $id_aprobacionN
                if ($fila["id_aprobacionN"] == "1") {
                    echo "<td><button class='popup-button update-approvedN-button' data-estado='" . $fila['estado'] . "' data-id_aprobacionN='" . $fila['id_aprobacionN'] . "' data-id='" . $fila['id'] . "' $disabledN $disabledCostos style='background-color: #00a135;'><strong>" . $fila['estado_aprobado_area'] . "</strong></button></td>";
                } else if ($fila["id_aprobacionN"] == "2") {
                    echo "<td><button class='popup-button update-approvedN-button' data-estado='" . $fila['estado'] . "' data-id_aprobacionN='" . $fila['id_aprobacionN'] . "' data-id='" . $fila['id'] . "' $disabledN $disabledCostos style='background-color: red;'><strong>" . $fila['estado_aprobado_area'] . "</strong></button></td>";
                }
                // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
                // gestion del estado de la novedad
                if ($fila["estado"] == "pendiente") {
                    echo "<td><button class='popup-button update-novedadNumber-button ' data-novedad='" . $fila['id'] . "'  style='background-color: #FF0000;' > <i class='fa solid fa-xmark fa-beat'></i></button></td>";
                } else if ($fila["estado"] == "proceso") {
                    echo "<td><button class='popup-button update-novedadNumber-button ' data-novedad='" . $fila['id'] . "'  style='background-color: #ffdf00;'><i class='fas fa-spinner fa-spin'></i></button></td>";
                } else if ($fila["estado"] == "terminado") {
                    echo "<td><button class='popup-button update-novedadNumber-button ' data-novedad='" . $fila['id'] . "'  style='background-color: #00a135;'><i class='fas fa-check fa-beat'></i></button></td>";
                }
                // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
                // descargar archivo de novedad
                // ---------------------------------------------------------- ---------------------------------------------------------- ------------------------------------------------------------------------------------------------------------
                //    id de la novedad
                $id = $fila['id'];

                $archivoSql = "SELECT archivo FROM archivos WHERE id = $id";
                $resultadoArchivo = $conMysql->query($archivoSql);

                if ($resultadoArchivo && $resultadoArchivo->num_rows > 0) {
                    $fila2 = $resultadoArchivo->fetch_assoc();
                    $archivo = $fila2['archivo'];

                    echo "<td><a href='../model/descargar_archivos.php?archivo=" . $archivo . "' class='popup-button update-delete-button' style='background-color: #2194bc;' download><i class='fas fa-file-download'></i></a></td>";
                } else {
                    echo "<td><a ' class='popup-button ' style='background-color: #FF0000;' download><i class='fa solid fa-xmark fa-beat'></i></a></td>";
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
