<?php

class updateApprovedN
{
    private $id_novedad;
    private $id_aprobacionN;
    private $conexion;

    public function __construct($id_novedad, $id_aprobacionN, $conexion)
    {
        $this->id_novedad = $id_novedad;
        $this->id_aprobacionN = $id_aprobacionN;
        $this->conexion = $conexion->conMysql();
    }

    public function actualizar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['id_novedad']) && isset($_POST['id_aprobacionN'])) {
                $id_novedad = $_POST['id_novedad'];
                $id_aprobacionN = $_POST['id_aprobacionN'];
                if ($id_aprobacionN == 2) {
                    $id_aprobacionN = 1;
                }
                var_dump("el id_aprobacion esss: $id_aprobacionN");
                $conexion = new Conexion();
                $mysqli = $conexion->conMysql();
                // -------------------------------------------------------------------------------------------------------

                // -------------------------------------------------------------------------------------------------------
                $query = 'UPDATE novedades_nomina SET id_aprobacionN = ? WHERE id = ?';
                if ($stmt = $mysqli->prepare($query)) {
                    // Ligamos los parámetros de la sentencia preparada
                    $stmt->bind_param('ii', $id_aprobacionN, $id_novedad);
                    // Ejecutamos la sentencia
                    if ($stmt->execute()) {
                    } else {
                        echo 'Error al actualizar el estado en la base de datos: ' . $mysqli->error;
                    }

                    // Cerramos la sentencia
                    $stmt->close();
                } else {
                }
            } else {
                echo 'Error: Parámetros no válidos.';
            }
        } else {
            echo 'Error: Método no permitido.';
        }
    }
}
