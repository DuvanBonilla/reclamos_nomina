<?php
class Conexion
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "reclamos_nomina";

    public function conMysql()
    {
        $conexion = new mysqli($this->host, $this->user, $this->password, $this->database);

        if ($conexion->connect_error) {
            die('conexion a la base de datos fallida' . $conexion->connect_error);
        }

        return $conexion;
    }

    public function cerrarConexion($conexion)
    {
        $conexion->close();
    }
}
