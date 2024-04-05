<?php
require_once("../model/conexion.php");
require_once("../model/val_login.php");

$codigo = $_POST["codigo"];
$conexion = new Conexion();
$conMysql = $conexion->conMysql();
$valLogin = new valLogin($codigo, $conexion);
$valLogin->validarLogin();
