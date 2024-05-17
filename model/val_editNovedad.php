<?php

class updateNovedad
{
    private $idServicio;
    private $descripcion;
    private $conexion;



    public function __construct($idServicio, $descripcion, $conexion)
    {
        $this->idServicio = $idServicio;
        $this->descripcion = $descripcion;
        $this->conexion = $conexion->conMysql();
    }

    public function verificarNovedad()
    {
        if (!empty(($_POST["idServicio"] && $_POST["descripcion"]))) {
            $verificar_codigo = $this->conexion->query("SELECT * FROM novedades_nomina WHERE id_servicio = '$this->idServicio'");

            if ($verificar_codigo->num_rows < 1) {
                echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'No se encuentra registro',
                            showCancelButton: false,
                            confirmButtonColor: '#FF0000',
                            confirmButtonText: 'OK',
                            timer: 6000
                        }).then(() => {
                            location.assign('../view/allNovedades.php');
                        });
                    });
                    </script>";
                exit();
            }
        }
    }
    public function updateNovedad()
    {
        if (!empty($_POST['idServicio']) && !empty($_POST['descripcion'])) {
            $query = "UPDATE novedades_nomina SET descripcion = ? WHERE id_servicio = ?";

            if ($stmt = $this->conexion->prepare($query)) {
                $stmt->bind_param('si', $this->descripcion, $this->idServicio);

                if ($stmt->execute()) {
                    echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Novedad actualizado con éxito',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK',
                            timer: 5000
                        }).then(() => {
                            location.assign('../view/allNovedades.php');
                        });
                    });
                    </script>";
                } else {
                    echo "Error al ejecutar la consulta: " . $stmt->error;
                }
            } else {
                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error al preparar la consulta',
                        showCancelButton: false,
                        confirmButtonColor: '#FF5733',
                        confirmButtonText: 'OK',
                        timer: 5000
                    }).then(() => {
                        location.assign('../view/allNovedades.php');
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
                    title: 'Uno o más campos están vacíos',
                    showCancelButton: false,
                    confirmButtonColor: '#FF5733',
                    confirmButtonText: 'OK',
                    timer: 5000
                }).then(() => {
                    location.assign('../view/allNovedades.php');
                });
            });
            </script>";
        }
    }
}
