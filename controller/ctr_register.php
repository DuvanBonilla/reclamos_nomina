<?php
require_once("../model/conexion.php");
require_once("../model/val_register.php");
// --------------------------------------------------------------------
$codigo = $_POST['codigo'];
$rol = $_POST["rol"];
$zona = $_POST["zona"];
// --------------------------------------------------------------------
$conexion = new Conexion();
// --------------------------------------------------------------------
$register = new valRegister($codigo, $conexion, $rol, $zona);
$register->registrarCodigo();
// --------------------------------------------------------------------
