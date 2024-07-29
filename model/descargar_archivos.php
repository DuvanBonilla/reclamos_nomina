<?php

require './../vendor/autoload.php';

require_once('./../controller/ctr_aws_s3.php');


if (isset($_GET['archivo'])) {
    $ruta_archivo =  $_GET['archivo'];
    $result = getFile($ruta_archivo);
    
    // Nombre fijo sin la extensión
    $nombre_fijo = 'Certificado';
    
    // Configura las cabeceras para la descarga
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    
    // Establece el nombre fijo sin la extensión
    header('Content-Disposition: attachment; filename="' . $nombre_fijo . '.' . pathinfo($ruta_archivo, PATHINFO_EXTENSION) . '"');
    
    header('Content-Length: ' . $result['ContentLength']);
    
    // Imprime el contenido del objeto directamente
    echo $result['Body'];
} else {
    echo "Archivo no especificado.";
}