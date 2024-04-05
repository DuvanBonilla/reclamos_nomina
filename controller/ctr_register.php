<?php
require_once("../model/conexion.php");
require_once("../model/val_register.php");

$codigo = $_POST['codigo'];
$rol = $_POST["rol"];
$zona = $_POST["zona"];
$conexion = new Conexion();
$conMysql = $conexion->conMysql();
$register = new register($codigo, $conexion, $rol, $zona);
$register->registrarCodigo();
