<?php

class updateApprovedN
{
    private $id_novedad;
    private $id_aprobacionN;
    private $estado;
    private $conexion;

    public function __construct($id_novedad, $id_aprobacionN, $estado, $conexion)
    {
        $this->id_novedad = $id_novedad;
        $this->id_aprobacionN = $id_aprobacionN;
        $this->estado = $estado;
        $this->conexion = $conexion->conMysql();
    }

    public function actualizar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['id_novedad']) && isset($_POST['id_aprobacionN'])) {
                $id_novedad = $_POST['id_novedad'];
                $id_aprobacionN = $_POST['id_aprobacionN'];
                $estado = $_POST['estado'];

                if ($id_aprobacionN == 2) {
                    $id_aprobacionN = 1;
                }

                // $estado = 1;
                if ($estado === "1") {
                    $estado = 2;
                } else if ($estado === "2") {
                    $estado = 3;
                } else if ($estado === "3") {
                    $estado = 3;
                }
                $conexion = new Conexion();
                $mysqli = $conexion->conMysql();
                // -------------------------------------------------------------------------------------------------------

                // -------------------------------------------------------------------------------------------------------
                $query = 'UPDATE novedades_nomina SET id_aprobacionN = ?, id_estado = ? WHERE id = ?';
                if ($stmt = $mysqli->prepare($query)) {
                    // Ligamos los parámetros de la sentencia preparada
                    $stmt->bind_param('iii', $id_aprobacionN, $estado, $id_novedad);
                    // Ejecutamos la sentencia
                    if ($stmt->execute()) {
                    } else {
                        echo 'Error al actualizar el estado en la base de datos: ' . $mysqli->error;
                    }

                    // Cerramos la sentencia
                    $stmt->close();
                } else {
                    echo 'Error al preparar la consulta: ' . $mysqli->error;
                }
            } else {
                echo 'Error: Parámetros no válidos.';
            }
        } else {
            echo 'Error: Método no permitido.';
        }
    }
}
