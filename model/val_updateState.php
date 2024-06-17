<?php

class updateState
{
    private $estado;
    private $id_novedad;
    private $conexion;

    public function __construct($estado, $id_novedad, $conexion)
    {
        $this->estado = $estado;
        $this->id_novedad = $id_novedad;
        $this->conexion = $conexion->conMysql();
    }

    public function actualizar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['estado']) && isset($_POST['id_novedad'])) {
                $estado = $_POST['estado'];
                $id_novedad = $_POST['id_novedad'];
                // $estado = 1;

                if ($estado === "1") {
                    $estado = 2;
                } else if ($estado === "2") {
                    $estado = 3;
                } else if ($estado === "3") {
                }
                $conexion = new Conexion();
                $mysqli = $conexion->conMysql();
                // -------------------------------------------------------------------------------------------------------
                $query = 'UPDATE novedades_nomina SET id_estado = ? WHERE id = ?';
                if ($stmt = $mysqli->prepare($query)) {
                    // Ligamos los parámetros de la sentencia preparada
                    $stmt->bind_param('ii', $estado, $id_novedad);
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
