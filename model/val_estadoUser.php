<?php

class deleteUser
{
    private $codigo_user;
    private $estado;
    private $conexion;


    public function __construct($codigo_user, $estado, $conexion)
    {
        $this->codigo_user = $codigo_user;
        $this->estado = $estado;
        $this->conexion = $conexion->conMysql();
    }

    public function updateEstadoUser()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['codigo'])) {
                $codigo_user = $_POST['codigo'];
                $estado = $_POST['estado'];
                if ($estado == 1) {
                    $estado = 2;
                } else {
                    $estado = 1;
                }
                $conexion = new Conexion();
                $mysqli = $conexion->conMysql();
                // -------------------------------------------------------------------------------------------------------
                $query = 'UPDATE usuarios SET estado = ? WHERE codigo = ?';

                if ($stmt = $mysqli->prepare($query)) {
                    // Ligamos los parámetros de la sentencia preparada
                    $stmt->bind_param('ii', $estado, $codigo_user);
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
