<?php

class valNovedad
{
    private $fechaRegistro;
    private $fechaNovedad;
    private $novedad;
    private $cliente;
    private $coordinador;
    private $trabajador;
    private $idServicio;
    private $descripcion;
    private $estado;
    private $idUsuario;
    private $conexion;

    public function __construct($fechaRegistro, $fechaNovedad, $novedad, $cliente, $coordinador, $trabajador, $idServicio, $descripcion, $estado, $idUsuario, $conexion)
    {
        $this->fechaRegistro = $fechaRegistro;
        $this->fechaNovedad = $fechaNovedad;
        $this->novedad = $novedad;
        $this->cliente = $cliente;
        $this->coordinador = $coordinador;
        $this->trabajador = $trabajador;
        $this->idServicio = $idServicio;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
        $this->idUsuario = $idUsuario;
        $this->conexion = $conexion->conMysql();
    }

    public function validarNovedad()
    {
        // Realizar una consulta para obtener los códigos de usuario disponibles
        $sql = "SELECT codigo FROM usuarios";
        $resultado = $this->conexion->query($sql);

        if ($resultado->num_rows > 0) {
            // Iterar sobre los resultados y mostrar los códigos de usuario
            while ($fila = $resultado->fetch_assoc()) {
                echo "Código de usuario: " . $fila["codigo"] . "<br>";
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


            $query = "INSERT INTO novedades_nomina(fecha_registro,fecha_novedad,nombre_coordinador,tipo_novedad,trabajador,descripcion,id_servicio,cliente,id_usuario,id_estado) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ";

            if ($stmt = $this->conexion->prepare($query)) {
                $stmt->bind_param('ssssssssss', $this->fechaRegistro, $this->fechaNovedad, $this->novedad, $this->cliente, $this->coordinador, $this->trabajador, $this->idServicio, $this->descripcion, $this->estado, $this->idUsuario);

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
