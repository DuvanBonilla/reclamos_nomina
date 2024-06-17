<?php

require_once('../model/conexion.php');
require_once('../model/val_editNovedad.php');

$idServicio = $_POST['idServicio'];
$descripcion = $_POST['descripcion'];

$conexion = new Conexion();


$updateNovedad = new updateNovedad($idServicio, $descripcion, $conexion);
$updateNovedad->verificarNovedad();
$updateNovedad->updateNovedad();
