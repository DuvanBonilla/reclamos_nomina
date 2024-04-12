<?php

class updateApprovedC
{
    private $id_novedad;
    private $id_aprobacionC;
    private $estado;
    private $conexion;

    public function __construct($id_novedad, $id_aprobacionC, $estado, $conexion)
    {
        $this->id_novedad = $id_novedad;
        $this->id_aprobacionC = $id_aprobacionC;
        $this->estado = $estado;
        $this->conexion = $conexion->conMysql();
    }

    public function actualizar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['id_novedad']) && isset($_POST['id_aprobacionC'])) {
                $id_novedad = $_POST['id_novedad'];
                $id_aprobacionC = $_POST['id_aprobacionC'];
                $estado = $_POST['estado'];

                if ($id_aprobacionC === "2") {
                    $id_aprobacionC = 1;
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
                // $query = 'UPDATE novedades_nomina SET id_aprobacionC = ? WHERE id = ?';
                $query = 'UPDATE novedades_nomina SET id_aprobacionC = ?, id_estado = ? WHERE id = ?';

                if ($stmt = $mysqli->prepare($query)) {
                    // Ligamos los parámetros de la sentencia preparada
                    $stmt->bind_param('iii', $id_aprobacionC, $estado, $id_novedad);
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
