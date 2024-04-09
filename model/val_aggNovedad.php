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
    private $conexion;

    public function __construct($fechaRegistro, $fechaNovedad, $coordinador, $novedad, $trabajador, $descripcion, $idServicio, $cliente, $idUsuario, $estado, $id_zona, $conexion)
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
        $this->conexion = $conexion->conMysql();
    }

    public function validarNovedad()
    {
        // Realizar una consulta para obtener los códigos de usuario disponibles
        $sql = "SELECT nombre_coordinador FROM novedades_nomina";
        $resultado = $this->conexion->query($sql);

        if ($resultado->num_rows > 0) {
            // Iterar sobre los resultados y mostrar los códigos de usuario
            while ($fila = $resultado->fetch_assoc()) {
                echo "Código de coordiandor: " . $fila["nombre_coordinador"] . "<br>";
            }
        } else {
            echo "No se encontraron usuarios.";
        }
    }

    public function registrarNovedad()
    {
        if (!empty($_POST['fechaRegistro'] && $_POST['fechaNovedad'] && $_POST['novedad'] && $_POST['cliente'] && $_POST['coordinador'] && $_POST['idServicio'] && $_POST['descripcion'])) {
            // $query = "INSERT INTO novedades_nomina(fecha_registro,fecha_novedad,nombre_coordinador,tipo_novedad,trabajador,descripcion,id_servicio,cliente) 
            // VALUES ('$this->fechaRegistro', '$this->fechaNovedad','$this->novedad','$this->cliente','$this->coordinador','$this->trabajador','$this->idServicio','$this->descripcion') ";


            $query = "INSERT INTO novedades_nomina(fecha_registro,fecha_novedad,nombre_coordinador,tipo_novedad,trabajador,descripcion,id_servicio,cliente,id_usuario,id_estado, id_zona) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ";

            if ($stmt = $this->conexion->prepare($query)) {
                $stmt->bind_param('ssssssssssi', $this->fechaRegistro, $this->fechaNovedad, $this->coordinador, $this->novedad, $this->trabajador, $this->descripcion, $this->idServicio, $this->cliente, $this->idUsuario, $this->estado, $this->id_zona);

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
                    // echo "
                    // <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    // <script language='JavaScript'>
                    // document.addEventListener('DOMContentLoaded', function() {
                    //     Swal.fire({
                    //         icon: 'error',
                    //         title: 'La novedad no se ha podido registrar',
                    //         showCancelButton: false,
                    //         confirmButtonColor: '#3085d6',
                    //         confirmButtonText: 'OK',
                    //         timer: 5000
                    //     }).then(() => {
                    //         location.assign('../view/main.php');
                    //     });
                    // });
                    // </script>";
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
