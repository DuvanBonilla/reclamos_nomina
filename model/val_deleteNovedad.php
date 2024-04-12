<?php

class updateState
{
    private $id_novedad;
    private $conexion;

    public function __construct($id_novedad, $conexion)
    {
        $this->id_novedad = $id_novedad;
        $this->conexion = $conexion->conMysql();
    }

    public function deleteNovedad()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['id_novedad'])) {
                $id_novedad = $_POST['id_novedad'];

                $conexion = new Conexion();
                $mysqli = $conexion->conMysql();
                // -------------------------------------------------------------------------------------------------------

                // -------------------------------------------------------------------------------------------------------
                $query = 'DELETE FROM novedades_nomina WHERE id = ?';
                if ($stmt = $mysqli->prepare($query)) {
                    // Ligamos los parámetros de la sentencia preparada
                    $stmt->bind_param('i', $id_novedad);
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
