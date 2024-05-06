<?php
require_once '../model/conexion.php';
require_once '../model/val_updateUsers.php';

// -------------------------------------------------------------------------------------------------------
// se cambia el tipo de dato
$codigo_user = $_POST['codigo'];
$rol = $_POST['rol'];
$zona = $_POST['zona'];
// -------------------------------------------------------------------------------------------------------
// var_dump("epaaaaaaaaaaaaaaa: $codigo_user");
// -------------------------------------------------------------------------------------------------------
$conexion = new Conexion();
// -------------------------------------------------------------------------------------------------------
$updateUsers = new updateUser($codigo_user, $rol, $zona, $conexion);
$updateUsers->changeUsers();
