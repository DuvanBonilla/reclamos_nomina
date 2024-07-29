<?php

class updateNovedad
{
    private $id;
    private $novedad;
    private $trabajador;
    private $idservicio;
    private $zonaespecifica;
    private $descripcion;
    private $conexion;

    public function __construct($id, $novedad, $trabajador, $idservicio, $zonaespecifica, $descripcion, $conexion)
    {
        $this->id = $id;
        $this->novedad = $novedad;
        $this->trabajador = $trabajador;
        $this->idservicio = $idservicio;
        $this->zonaespecifica = $zonaespecifica;
        $this->descripcion = $descripcion;
        $this->conexion = $conexion->conMysql();
    }

    public function verificarNovedad()
    {
        if (!empty(($_POST["id"] ))) {
            $verificar_codigo = $this->conexion->query("SELECT * FROM novedades_nomina WHERE id = '$this->id'");

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
        if (!empty($_POST['id']) && !empty($_POST['descripcion'])) {
            $query = "UPDATE novedades_nomina SET tipo_novedad = ?, trabajador = ?, id_servicio = ?, id_zona_especifica = ?,descripcion = ? WHERE id = ?";

            if ($stmt = $this->conexion->prepare($query)) {
                $stmt->bind_param('ssissi', $this->novedad,$this->trabajador,$this->idservicio,$this->zonaespecifica,$this->descripcion,$this->id);

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
