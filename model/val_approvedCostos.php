<?php

class updateApprovedC
{
    private $id_novedad;
    private $id_aprobacionC;
    private $conexion;

    public function __construct($id_novedad, $id_aprobacionC, $conexion)
    {
        $this->id_novedad = $id_novedad;
        $this->id_aprobacionC = $id_aprobacionC;
        $this->conexion = $conexion->conMysql();
    }

    public function actualizar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['id_novedad']) && isset($_POST['id_aprobacionC'])) {
                $id_novedad = $_POST['id_novedad'];
                $id_aprobacionC = $_POST['id_aprobacionC'];
                if ($id_aprobacionC === "2") {
                    $id_aprobacionC = 1;
                }

                $conexion = new Conexion();
                $mysqli = $conexion->conMysql();
                // -------------------------------------------------------------------------------------------------------

                // -------------------------------------------------------------------------------------------------------
                $query = 'UPDATE novedades_nomina SET id_aprobacionC = ? WHERE id = ?';
                if ($stmt = $mysqli->prepare($query)) {
                    // Ligamos los parámetros de la sentencia preparada
                    $stmt->bind_param('ii', $id_aprobacionC, $id_novedad);
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
