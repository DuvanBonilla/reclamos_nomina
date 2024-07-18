<?php

use  Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable('./../');
$dotenv->load();

class Conexion
{
    private $host;
    private $user;
    private $password;
    private $database;

    public function __construct()
    {
        $this->host = $_ENV['DBHOST'];
        $this->user = $_ENV['DBUSER'];
        $this->password = $_ENV['DBPASS'];
        $this->database = $_ENV['DBNAME'];
    }

    public function conMysql()
    {
        $conexion = new mysqli($this->host, $this->user, $this->password, $this->database);

        if ($conexion->connect_error) {
            die('conexion a la base de datos fallida' . $conexion->connect_error);
        }
        return $conexion;
    }
}
