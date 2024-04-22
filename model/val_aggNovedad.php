<?php

class valNovedad
{
    private $fechaRegistro;
    private $fechaNovedad;
    private $coordinador;
    private $novedad;
    private $trabajador;
    private $descripcion;
    private $idServicio;
    private $cliente;
    private $idUsuario;
    private $estado;
    private $id_zona;
    private $id_aprobacionC;
    private $id_aprobacionN;
    private $conexion;

    public function __construct($fechaRegistro, $fechaNovedad, $coordinador, $novedad, $trabajador, $descripcion, $idServicio, $cliente, $idUsuario, $estado, $id_zona, $id_aprobacionC, $id_aprobacionN, $conexion)
    {
        $this->fechaRegistro = $fechaRegistro;
        $this->fechaNovedad = $fechaNovedad;
        $this->coordinador = $coordinador;
        $this->novedad = $novedad;
        $this->trabajador = $trabajador;
        $this->descripcion = $descripcion;
        $this->idServicio = $idServicio;
        $this->cliente = $cliente;
        $this->idUsuario = $idUsuario;
        $this->estado = $estado;
        $this->id_zona = $id_zona;
        $this->id_aprobacionC = $id_aprobacionC;
        $this->id_aprobacionN = $id_aprobacionN;
        $this->conexion = $conexion->conMysql();
    }


    public function registrarNovedad()
    {
        if (!empty($_POST['fechaRegistro'] && $_POST['fechaNovedad'] && $_POST['novedad'] && $_POST['cliente'] && $_POST['coordinador'] && $_POST['idServicio'] && $_POST['descripcion'])) {
            $query = "INSERT INTO novedades_nomina(fecha_registro,fecha_novedad,nombre_coordinador,tipo_novedad,trabajador,descripcion,id_servicio,cliente,id_usuario,id_estado, id_zona, id_aprobacionC, id_aprobacionN) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ";

            if ($stmt = $this->conexion->prepare($query)) {
                $stmt->bind_param('ssssssssssiii', $this->fechaRegistro, $this->fechaNovedad, $this->coordinador, $this->novedad, $this->trabajador, $this->descripcion, $this->idServicio, $this->cliente, $this->idUsuario, $this->estado, $this->id_zona, $this->id_aprobacionC, $this->id_aprobacionN);

                if ($stmt->execute()) {
                    echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Usuario Almacenado Exitosamente',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK',
                            timer: 5000
                        }).then(() => {
                            location.assign('../view/main.php');
                        });
                    });
                    </script>";
                } else {
                    echo "Error al preparar la consulta: " . $this->conexion->error;
                }
            } else {
                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'no entro al stmt',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 5000
                    }).then(() => {
                        location.assign('../view/main.php');
                    });
                });
                </script>";
            }
        } else {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'esta vacido',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 5000
                }).then(() => {
                    location.assign('../view/main.php');
                });
            });
            </script>";
        }
    }
}
